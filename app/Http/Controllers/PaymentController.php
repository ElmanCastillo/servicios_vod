<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use Redirect;
use URL;
use App\Models\Suscriptore;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
     private $apiContext;

    public function __construct()
    {
        $payPalConfig = \Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('3.99');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
		//dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            return redirect('/paypal/results')->with('success2', 'Lo sentimos! El pago a traves de PayPal no se pudo realizar.');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
			//dd($$result);
            $date1 = Carbon::now()->format('Y-m-d');
            $suscr = Carbon::now()->add(30, 'day')->format('Y-m-d'); //agregar 30 dias
            $userlog = Auth::user()->id ;
            $suscriptore = Suscriptore::updateOrCreate(
                ['estado' => '1', 'users_id' => $userlog],
                ['suscripcion' => $suscr]
            );
            $venta = new Venta;
            $venta->valor = '3.99';
            $venta->fecha = $date1;
            $venta->users_id = $userlog;
            $venta->estado = '1';
            $venta->tipopagos_id = 1;
            $venta->save();
            return redirect('/paypal/results')->with('success', 'Gracias! El pago a traves de PayPal se ha ralizado correctamente.');
        }

        return redirect('/paypal/results')->with('success2', 'Lo sentimos! El pago a traves de PayPal no se pudo realizar.');
    }
	
}
