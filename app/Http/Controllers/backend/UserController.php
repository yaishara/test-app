<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::pluck('name', 'name');
        $users = User::paginate(10);
        return  view('backend.user.index', compact('roles', 'users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'image_path' => 'required',
            'email' => 'required|email|unique:users',
            ]
        );

        $role=$request->role;
        $name=$request->name;
        $email =$request->email;
        $password =$request->password;
        $confirmPassword =$request->confirm_password;

        $user = new User();
        $user->name =$name;
        $user->email=$email;
        $user->password =Hash::make($password);
        //        $user->image_path =$imageName;
        if($request->file()) {
            $fileName = "CAT_".rand(11111, 99999).'.'. $request->file('image_path')->getClientOriginalExtension();
            $filePath = $request->file('image_path')->storeAs('uploads/users', $fileName, 'public');

            $user->image_path =$fileName;
        }
        $user->save();

        $user->assignRole($role);

        return  redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role=$request->role;
        $name=$request->name;
        $email =$request->email;

        $user = User::find($id);
        $user->name =$name;
        $user->email=$email;

        if($request->file()) {
            $fileName = "CAT_".rand(11111, 99999).'.'. $request->file('image_path')->getClientOriginalExtension();
            $filePath = $request->file('image_path')->storeAs('uploads/users', $fileName, 'public');
            $user->image_path =$fileName;
        }


        $user->save();

        $user->syncRoles($role);

        return  redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return 'true';
    }

    public function changepassword(Request $request ,$id)
    {
        $hashedPassword = Auth::user()->password;
        $msgType =null;
        $msg=null;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            if (Hash::check($request->newpassword, $hashedPassword)) {
                $msgType="error";
                $msg ="new password can not be the old password!";
            }
            else{
                $users = User::find($id);
                $users->password = bcrypt($request->newpassword);
                $users->save();
                $msgType="success";
                $msg ="password updated successfully";
            }
        }
        else{
            $msgType="error";
            $msg ="old password doesnt matched";
        }

        return redirect()->back()->with($msgType, $msg);
    }

}
