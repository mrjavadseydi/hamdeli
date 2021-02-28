<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUserRequest;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserGroup;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user =Permission::where('name', 'user')->get();
        $users = $user[0]->users()->get();
        return view('admin.users.index',compact('users'));
    }
    public function delete(Request $request)
    {
        User::whereId($request->id)->delete();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update($id,Request $request)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        if($request->has('password')){
            $pass = Hash::make($request->password);
            $user->update([
                'password'=>$pass,

            ]);

        }
        return redirect(route('user.index'));
    }
    public function create(){
        // dd('asdasd');
        return view('admin.users.create');
    }
    public function store(CreateNewUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        DB::table('permission_user')->insert([
            'user_id' =>$user->id,
            'permission_id' =>3
        ]);
        return redirect(route('user.index'));
    }
}
