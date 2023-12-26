<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function index(){
        return view('addblog');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        // $user = $request->user();
        $post = new Post;
        $author=Auth::user()->name;
        $post->author=$author;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->select;
        $post->image = $imagePath ?? null;
        $post->save();
        // $user->Post()->save($post);
        return redirect()->route('index')->with('status', "Post Added Successfully!");
}
}
