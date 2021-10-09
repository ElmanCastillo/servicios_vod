<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tipopago\BulkDestroyTipopago;
use App\Http\Requests\Admin\Tipopago\DestroyTipopago;
use App\Http\Requests\Admin\Tipopago\IndexTipopago;
use App\Http\Requests\Admin\Tipopago\StoreTipopago;
use App\Http\Requests\Admin\Tipopago\UpdateTipopago;
use App\Models\Tipopago;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TipopagosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipopago $request
     * @return array|Factory|View
     */
    public function index(IndexTipopago $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tipopago::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tipopago.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipopago.create');

        return view('admin.tipopago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipopago $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipopago $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tipopago
        $tipopago = Tipopago::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipopagos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipopagos');
    }

    /**
     * Display the specified resource.
     *
     * @param Tipopago $tipopago
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tipopago $tipopago)
    {
        $this->authorize('admin.tipopago.show', $tipopago);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tipopago $tipopago
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tipopago $tipopago)
    {
        $this->authorize('admin.tipopago.edit', $tipopago);


        return view('admin.tipopago.edit', [
            'tipopago' => $tipopago,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipopago $request
     * @param Tipopago $tipopago
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipopago $request, Tipopago $tipopago)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tipopago
        $tipopago->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipopagos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipopagos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipopago $request
     * @param Tipopago $tipopago
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipopago $request, Tipopago $tipopago)
    {
        $tipopago->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipopago $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipopago $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Tipopago::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
