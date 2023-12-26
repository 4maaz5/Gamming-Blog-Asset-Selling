<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $postCount = count($posts);
        $user = User::all();
        $userCount = count($user);
        $categories = Category::all();
        $categoryCount = count($categories);
        $numberOfRecords = 100;

       $topSellingProducts = cart::withCount('post')
    ->orderBy('post_id', 'desc')
    ->take($numberOfRecords)
    ->get();
    // dd($topSellingProducts);
        return view('admin.dashboard', compact('postCount', 'userCount', 'categoryCount','topSellingProducts'));
    }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }
    public function AdminProfileChange(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required'
        ]);
        if (Auth::user()->role_as == '1') {
            $id = Auth::user()->id;
            $update = User::find($id);
            $update->name = $request->username;
            $update->email = $request->email;
            $update->save();
            return redirect()->back()->with('message', 'Name and Email updated Successfully!');
        } else {
            return redirect()->back()->with('message', 'Something wrong!');
        }
    }
    public function AdminPasswordChange(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_password_change', compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return redirect()->back()->with('message', 'Old Password does not match!');
        }
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return back()->with('message', 'Password updated successfully!');
    }

}
