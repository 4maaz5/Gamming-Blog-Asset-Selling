<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return view('admin.user.index',compact('user'));
    }
    public function delete($user_id){
        User::destroy($user_id);
        return redirect(route('user.index'))->with('message','User Deleted Successfully!');
    }
}
