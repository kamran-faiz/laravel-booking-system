<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        return view ('admin.dashboard');

    }
    public function users(){
        $users = User::all();

        return view('admin.users',['users' => $users]);
    }
    public function delete($id){
        $users=User::find($id);
        $users->delete();
        return redirect('/admin/users');
    }
    public function updateRole($id ,Request $request){
        $user=User::find($id);
        $user->role=$request->role;
        $user->save();
        return redirect('/admin/users');
    }
}
