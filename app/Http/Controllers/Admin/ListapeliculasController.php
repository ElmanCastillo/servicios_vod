<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Listapelicula\BulkDestroyListapelicula;
use App\Http\Requests\Admin\Listapelicula\DestroyListapelicula;
use App\Http\Requests\Admin\Listapelicula\IndexListapelicula;
use App\Http\Requests\Admin\Listapelicula\StoreListapelicula;
use App\Http\Requests\Admin\Listapelicula\UpdateListapelicula;
use App\Models\Listapelicula;
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

class ListapeliculasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexListapelicula $request
     * @return array|Factory|View
     */
    public function index(IndexListapelicula $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Listapelicula::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pelicula_id', 'venta_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.listapelicula.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.listapelicula.create');

        return view('admin.listapelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreListapelicula $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreListapelicula $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Listapelicula
        $listapelicula = Listapelicula::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/listapeliculas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/listapeliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param Listapelicula $listapelicula
     * @throws AuthorizationException
     * @return void
     */
    public function show(Listapelicula $listapelicula)
    {
        $this->authorize('admin.listapelicula.show', $listapelicula);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Listapelicula $listapelicula
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Listapelicula $listapelicula)
    {
        $this->authorize('admin.listapelicula.edit', $listapelicula);


        return view('admin.listapelicula.edit', [
            'listapelicula' => $listapelicula,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateListapelicula $request
     * @param Listapelicula $listapelicula
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateListapelicula $request, Listapelicula $listapelicula)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Listapelicula
        $listapelicula->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/listapeliculas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/listapeliculas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyListapelicula $request
     * @param Listapelicula $listapelicula
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyListapelicula $request, Listapelicula $listapelicula)
    {
        $listapelicula->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyListapelicula $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyListapelicula $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Listapelicula::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
