<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request){
    if (Auth::check()) {
        $request->validate([
        'comment_body'=>'required'
        ]);
        $post=Post::where('slug',$request->post_slug)->where('status','0')->first();
    if ($post) {
        $comment=new Comment();
        $comment->post_id=$post->id;
        $comment->user_id=Auth::user()->id;
        $comment->comment_body=$request->comment_body;
        $comment->category_id=$request->category_id;
        $comment->save();
        return redirect()->back()->with('message','Comment Added Successfully!');
    }
    else{
        return redirect()->back()->with('message','No Post Found!');

    }
    }
    else{
        return redirect('login')->with('message','You have to Loged in first!');
    }
    }
    public function CommentDeleteByAdmin($comment_id){
        Comment::destroy($comment_id);
        return redirect()->back()->with('message','Comment Deleted Successfully!');
    }
    public function CommentDeleteByUser(Request $request){
        if (Auth::check()) {
          $comment=Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
          $comment->delete();
          return response()->json([
            'status'=>200,
            'message'=>'Comment deleted Successfully!'
           ]);
        }
        else{
            return response()->json([
             'status'=>401,
             'message'=>'Login to delete this Comment!'
            ]);
        }
    }
    public function edit($id){
        $edit=Comment::find($id);
        return view('Frontend.post.edit',compact('edit'));
    }
    public function CommentUpdate(Request $request,$id){
        if (Auth::check()) {
          $update=Comment::find($id);
          $update->comment_body=$request->comment_body;
          $update->save();
          return redirect()->back()->with('message','Comment Updated Successfully!');

        }
        else{
            return response()->json([
             'status'=>401,
             'message'=>'Login to delete this Comment!'
            ]);
        }
    }
}
