<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\PermissionGroup;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionGroup = PermissionGroup::pluck('name','id');
        $permissions = Permission::with('group')->paginate(10);
        return view('backend.permission.index', compact('permissions','permissionGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $name = $request->name;
        $guard_name = $request->guard_name;
        $group = $request->permission_group;

        $permission = new Permission();
        $permission->name = $name;
        $permission->guard_name = $guard_name;
        $permission->permission_group_id = $group;

        $permission->save();
        return redirect(route('permissions.index'))->with('success', 'Permission added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest $request
     * @param  \App\Models\permission                     $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, permission $permission)
    {
        $name = $request->name;
        $guard_name = $request->guard_name;
        $group = $request->permission_group;

        $permission->name = $name;
        $permission->guard_name = $guard_name;
        $permission->permission_group_id = $group;

        $permission->save();
        return redirect(route('permissions.index'))->with('info', 'Permissions Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(permission $permission)
    {
        $permission->delete();
        return 'true';
    }
}
