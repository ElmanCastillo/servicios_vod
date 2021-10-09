<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reparto\BulkDestroyReparto;
use App\Http\Requests\Admin\Reparto\DestroyReparto;
use App\Http\Requests\Admin\Reparto\IndexReparto;
use App\Http\Requests\Admin\Reparto\StoreReparto;
use App\Http\Requests\Admin\Reparto\UpdateReparto;
use App\Models\Director;
use App\Models\Reparto;
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
use App\Models\Pelicula;
use App\Models\Actor;

class RepartosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReparto $request
     * @return array|Factory|View
     */
    public function index(IndexReparto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Reparto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'actors_id', 'peliculas_id'],

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

        return view('admin.reparto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.reparto.create');

        return view('admin.reparto.create',['peliculas' => Pelicula::all(),'actors' => Actor::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReparto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReparto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Reparto
        $reparto = Reparto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/repartos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/repartos');
    }

    /**
     * Display the specified resource.
     *
     * @param Reparto $reparto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Reparto $reparto)
    {
        $this->authorize('admin.reparto.show', $reparto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reparto $reparto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Reparto $reparto)
    {
        $this->authorize('admin.reparto.edit', $reparto);


        return view('admin.reparto.edit', [
            'reparto' => $reparto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReparto $request
     * @param Reparto $reparto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReparto $request, Reparto $reparto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Reparto
        $reparto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/repartos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/repartos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReparto $request
     * @param Reparto $reparto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReparto $request, Reparto $reparto)
    {
        $reparto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReparto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReparto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Reparto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
