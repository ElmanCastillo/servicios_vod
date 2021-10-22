<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Suscriptore\BulkDestroySuscriptore;
use App\Http\Requests\Admin\Suscriptore\DestroySuscriptore;
use App\Http\Requests\Admin\Suscriptore\IndexSuscriptore;
use App\Http\Requests\Admin\Suscriptore\StoreSuscriptore;
use App\Http\Requests\Admin\Suscriptore\UpdateSuscriptore;
use App\Models\Suscriptore;
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

class SuscriptoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSuscriptore $request
     * @return array|Factory|View
     */
    public function index(IndexSuscriptore $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Suscriptore::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'estado', 'users_id'],

            // set columns to searchIn
            ['id', 'estado']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.suscriptore.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.suscriptore.create');

        return view('admin.suscriptore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSuscriptore $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSuscriptore $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Suscriptore
        $suscriptore = Suscriptore::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/suscriptores'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/suscriptores');
    }

    /**
     * Display the specified resource.
     *
     * @param Suscriptore $suscriptore
     * @throws AuthorizationException
     * @return void
     */
    public function show(Suscriptore $suscriptore)
    {
        $this->authorize('admin.suscriptore.show', $suscriptore);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Suscriptore $suscriptore
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Suscriptore $suscriptore)
    {
        $this->authorize('admin.suscriptore.edit', $suscriptore);


        return view('admin.suscriptore.edit', [
            'suscriptore' => $suscriptore,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSuscriptore $request
     * @param Suscriptore $suscriptore
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSuscriptore $request, Suscriptore $suscriptore)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Suscriptore
        $suscriptore->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/suscriptores'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/suscriptores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySuscriptore $request
     * @param Suscriptore $suscriptore
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySuscriptore $request, Suscriptore $suscriptore)
    {
        $suscriptore->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySuscriptore $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySuscriptore $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Suscriptore::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
