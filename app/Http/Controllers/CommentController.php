<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //All Comment View
    public function view()
    {
        //get all data from blogs table
        $comments = Comment::latest()->where('user_id',Auth::user()->id)->orderBy('post_id','asc')->paginate(5);  
        return view('backenduser.postcomment.view', compact('comments'));
    }

    //Comment add  from
    public function add_form()
    {
        return view('backenduser.postcomment.add_form');
    }
    //Comment Store
    public function store(Request $request)
    {
       
        //validation  
        $request->validate([
            'post_id' => 'required',
            'comment' => 'required',
            'commentstatus' => 'required',    
        ]);
        
        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'comment'=>$request->comment,
            'commentstatus'=>$request->commentstatus,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Saved Successfully');
        
    }

    //Comment edit
    public function edit($id)
    {
        $comment = Comment::find($id);
        $post = Post::find($comment->post_id); 
        return view('backenduser.postcomment.edit', compact('comment','post'));
    }

    //Comment update
    public function update(Request $request, $id)
    {   
        
        //validation  
        $request->validate([
            'comment' => 'required',
            'commentstatus' => 'required', 
        ]);
        
        $post_id ="";
        $post_id = $request->post_id;
        if($post_id =="")
        {
            $post_id = $request->postold_id;
        }
        
        Comment::find($id)->update([
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
            'comment'=>$request->comment,
            'commentstatus'=>$request->commentstatus,
            'updated_at'=>Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Comment updated');
    }

    //Comment delete
    public function delete($id)
    {
        Comment::find($id)->delete();
        return Redirect()->back()->with('success','Comment Deleted');
        
    }
}
