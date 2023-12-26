<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.post.create', compact('category'));
    }
    public function store(PostFormRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        $data = $request->validated();
        $post = new Post();
        $post->category_id = $data['category_id'];
        $post->name = $data['post_name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->image = $imagePath ?? null;
        $post->price=$data['price'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect(route('post.index'))->with('message', 'Post Added Successfully!');
    }
    public function edit($post_id)
    {
        $category = Category::where('status', '0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post', 'category'))->with('message', 'Post Updated Successfully!');
    }
    public function update(PostFormRequest $request, $id)
    {
        $post = Post::find($id);
        $data = $request->validated();
        $post->category_id = $data['category_id'];
        $post->name = $data['post_name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect(route('post.index'))->with('message', 'Post Updated Successfully!');
    }
    public function delete($post_id)
    {
        Post::destroy($post_id);
        $comment=Comment::where('post_id',$post_id)->get();
        $cart=Cart::where('post_id',$post_id)->get();
        Cart::destroy($cart);
        return redirect(route('post.index'))->with('message', 'Post Deleted Successfully!');
    }
}
