<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\UserDataTables;
use App\Http\Requests\UserRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use App\Repository\UserRepository;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private RoleRepositoryInterface $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;

        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(UserDataTables $dataTable)
    {
        $roles = $this->roleRepository->getAllRole()->pluck('name', 'name');

        return $dataTable->render('backend.user.index',compact('roles'));
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
     * @param UserRequest $request
     * @param UserRepository $userRepository
     * @return Application|RedirectResponse|Redirector
     */
    public function store(UserRequest $request, UserRepository $userRepository)
    {
        try {
            $this->userRepository->createUser($request);
            $message = ['success' => 'User added Successfully'];
        } catch (\Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('users.index'))->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UserRequest $request, $id, UserRepository $userRepository)
    {
        try {
            $this->userRepository->updateUser($request, $id);
            $message = ['success' => 'User updated Successfully'];
        } catch (\Exception $exception) {
            $message = ['error' => 'Pls try again..!'];
        }
        return redirect(route('users.index'))->with($message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return 'true';
    }

    public function changepassword(Request $request, $id)
    {
        $hashedPassword = Auth::user()->password;
        $msgType = null;
        $msg = null;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            if (Hash::check($request->newpassword, $hashedPassword)) {
                $msgType = "error";
                $msg = "new password can not be the old password!";
            } else {
                $users = User::find($id);
                $users->password = bcrypt($request->newpassword);
                $users->save();
                $msgType = "success";
                $msg = "password updated successfully";
            }
        } else {
            $msgType = "error";
            $msg = "old password doesnt matched";
        }

        return redirect()->back()->with($msgType, $msg);
    }

}
