<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Models\PermissionGroup;
use App\Models\Permission;
use App\Repository\PermissionRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;

        $this->middleware('permission:permission-list', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $permissionGroup = PermissionGroup::pluck('name', 'id');
        $permissions = $this->permissionRepository->getAllPermission();
        return view('backend.permission.index', compact('permissions', 'permissionGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(PermissionRequest $request, PermissionRepository $permissionRepository)
    {
        try {
            $this->permissionRepository->createPermission($request);
            $message = ['success' => 'Permission added Successfully'];
        } catch (Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('permissions.index'))->with($message);

    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @return Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return Application|RedirectResponse|Redirector
     */
    public function update(PermissionRequest $request, permission $permission, PermissionRepository $permissionRepository)
    {
        try {
            $this->permissionRepository->updatePermission($request, $permission);
            $message = ['success' => 'Permission Update Successfully'];
        } catch (Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('permissions.index'))->with($message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return string
     */
    public function destroy(permission $permission)
    {
        $this->permissionRepository->deletePermission($permission);
        return 'true';
    }
}
