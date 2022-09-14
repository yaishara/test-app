<?php

namespace App\Http\Controllers\backend;



use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\PermissionGroup;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionGroups = PermissionGroup::with('permissions')->get();
        $permisions = Permission::pluck('name', 'id');
        return view('backend.role.create', compact('permisions', 'permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        DB::transaction(
            function () use ($request) {
                $permission = $request->permission;
                $rolename = $request->name;

                $role = new Role();
                $role->name = $rolename;
                $role->guard_name = 'web';

                $role->save();
                $role->givePermissionTo($permission);
            }
        );

        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissionGroups = PermissionGroup::with('permissions')->get();
        $permisions = Permission::pluck('name', 'id');
        return view('backend.role.edit', compact('permisions', 'role', 'permissionGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest $request
     * @param  \App\Models\Role                     $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::transaction(
            function () use ($request,$role) {
                $permission = $request->permission;
                $rolename = $request->name;

                $role->name = $rolename;
                $role->save();

                $role->syncPermissions($permission);
            }
        );

        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return 'true';
    }
}

