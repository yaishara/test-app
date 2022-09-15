<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\PermissionGroup;
use App\Repository\RoleRepository;
use DB;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllRole();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param \App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleRequest $request, RoleRepository $roleRepository)
    {dd("ss");
        try {
            $this->roleRepository->createRole($request);
            $message = ['success' => 'Role added Successfully'];
        } catch (\Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('role.index'))->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param \App\Http\Requests\UpdateRoleRequest $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {
            $this->roleRepository->updateRole($request, $role);
            $message = ['success' => 'Role updated Successfully'];
        } catch (\Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('role.index'))->with($message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return string
     */
    public function destroy(Role $role)
    {
        $this->roleRepository->deleteRole($role);
        return 'true';
    }
}

