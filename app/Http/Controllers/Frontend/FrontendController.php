<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ContactFormRule;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('Frontend.front', compact('posts'));
    }
    public function viewCategoryPost(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.post.index', compact('post', 'category'));
        } else {
            return redirect(route('front.index'));
        }
    }
    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            $latest_post = Post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(10);
            return view('frontend.post.view', compact('post', 'latest_post'));
        } else {
            return redirect(route('front.index'));
        }
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function create(ContactFormRule $request)
    {
        $data = $request->validated();
        $contact = new Contact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->message = $data['message'];
        $contact->save();
        return redirect(route('user.contact'))->with('message', 'Thanks for Contacting Us. We will respond you soon!');
    }
    public function deleted($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
    public function ChangePassword()
    {
        return view('layouts.inc.changePassword');
    }
    public function UserUpdatePassword(Request $request)
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
