<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genero\BulkDestroyGenero;
use App\Http\Requests\Admin\Genero\DestroyGenero;
use App\Http\Requests\Admin\Genero\IndexGenero;
use App\Http\Requests\Admin\Genero\StoreGenero;
use App\Http\Requests\Admin\Genero\UpdateGenero;
use App\Models\Genero;
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

class GenerosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGenero $request
     * @return array|Factory|View
     */
    public function index(IndexGenero $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Genero::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'genero'],

            // set columns to searchIn
            ['id', 'genero']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.genero.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.genero.create');

        return view('admin.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGenero $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGenero $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Genero
        $genero = Genero::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/generos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/generos');
    }

    /**
     * Display the specified resource.
     *
     * @param Genero $genero
     * @throws AuthorizationException
     * @return void
     */
    public function show(Genero $genero)
    {
        $this->authorize('admin.genero.show', $genero);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Genero $genero
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Genero $genero)
    {
        $this->authorize('admin.genero.edit', $genero);


        return view('admin.genero.edit', [
            'genero' => $genero,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGenero $request
     * @param Genero $genero
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGenero $request, Genero $genero)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Genero
        $genero->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/generos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/generos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGenero $request
     * @param Genero $genero
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGenero $request, Genero $genero)
    {
        $genero->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGenero $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGenero $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Genero::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
