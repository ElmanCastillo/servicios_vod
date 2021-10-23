<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rol\BulkDestroyRol;
use App\Http\Requests\Admin\Rol\DestroyRol;
use App\Http\Requests\Admin\Rol\IndexRol;
use App\Http\Requests\Admin\Rol\StoreRol;
use App\Http\Requests\Admin\Rol\UpdateRol;
use App\Models\Rol;
use Spatie\Permission\Models\Role;
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
use Spatie\Permission\Models\Permission;

class RolsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRol $request
     * @return array|Factory|View
     */
    public function index(IndexRol $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Rol::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'guard_name'],

            // set columns to searchIn
            ['id', 'name', 'guard_name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.rol.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.rol.create');

        return view('admin.rol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRol $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRol $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Rol
        $rol = Rol::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/rols'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/rols');
    }

    /**
     * Display the specified resource.
     *
     * @param Rol $rol
     * @throws AuthorizationException
     * @return void
     */
    public function show(Rol $rol)
    {
        $this->authorize('admin.rol.show', $rol);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rol $rol
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Rol $rol)
    {
        $this->authorize('admin.rol.edit', $rol);

        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $rol)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.rol.edit', compact('rol', 'permission', 'rolePermissions'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRol $request
     * @param Rol $rol
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRol $request, Rol $rol)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Rol
        $rol->update($sanitized);
        // But we do have a roles, so we need to attach the roles to the adminUser
        if ($request->input('permission')) {
            $rol1 = Role::find($rol);
            $rol1->syncPermissions($request->input('permission'));
            //Role::find($rol)->syncPermissions(collect($request->input('permission', []))->map->id->toArray());
        }

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/rols'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/rols');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRol $request
     * @param Rol $rol
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRol $request, Rol $rol)
    {
        $rol->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRol $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRol $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Rol::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
