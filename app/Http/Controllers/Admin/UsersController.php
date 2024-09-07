<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $heading = 'Create a new user';
        $sub_heading = 'You can now create a new user';
        return view('admin.users.add', compact('heading', 'sub_heading'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->back()->with('message', 'user created successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        if($user) {
            if($user->is_admin == 0){
                $var = 'admin';
                $user->is_admin = 1;
            }else{
                $var = 'not admin';
                $user->is_admin = 0;
            }
        }
        $user->save();
        return redirect()->back()->with('message', 'now user is ' . $var);
    }
    public function verifyUser($id)
    {
        $user = User::find($id);
        if($user) {
            $user->email_verified_at = time();
            $user->save();
        }
        $user->save();
        return redirect()->back()->with('message', 'now user is verified ');
    }
}
