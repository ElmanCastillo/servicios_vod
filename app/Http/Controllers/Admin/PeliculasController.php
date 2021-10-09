<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pelicula\BulkDestroyPelicula;
use App\Http\Requests\Admin\Pelicula\DestroyPelicula;
use App\Http\Requests\Admin\Pelicula\IndexPelicula;
use App\Http\Requests\Admin\Pelicula\StorePelicula;
use App\Http\Requests\Admin\Pelicula\UpdatePelicula;
use App\Models\Director;
use App\Models\Genero;
use App\Models\Pelicula;
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

class PeliculasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPelicula $request
     * @return array|Factory|View
     */
    public function index(IndexPelicula $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Pelicula::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'descripcion', 'duracion', 'genero_id', 'director_id'],

            // set columns to searchIn
            ['id', 'nombre', 'descripcion', 'duracion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pelicula.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pelicula.create');
        $genero = Genero::all();
        $director = Director::all();
        //dd($genero);
        return view('admin.pelicula.create',['generos' => $genero],['directors' => $director]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePelicula $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePelicula $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Pelicula
        $pelicula = Pelicula::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/peliculas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param Pelicula $pelicula
     * @throws AuthorizationException
     * @return void
     */
    public function show(Pelicula $pelicula)
    {
        $this->authorize('admin.pelicula.show', $pelicula);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pelicula $pelicula
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Pelicula $pelicula)
    {
        $this->authorize('admin.pelicula.edit', $pelicula);
        $genero = Genero::all();
        $director1 = Director::all();

        return view('admin.pelicula.edit', ['pelicula' => $pelicula, 'generos' => $genero,'directors' => $director1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePelicula $request
     * @param Pelicula $pelicula
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePelicula $request, Pelicula $pelicula)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Pelicula
        $pelicula->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/peliculas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/peliculas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPelicula $request
     * @param Pelicula $pelicula
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPelicula $request, Pelicula $pelicula)
    {
        $pelicula->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPelicula $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPelicula $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Pelicula::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
