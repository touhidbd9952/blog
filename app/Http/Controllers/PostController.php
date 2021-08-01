<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //All Post View
    public function view()
    {
        //get all data from blogs table
        $posts = Post::latest()->orderBy('cat_id','asc')->paginate(5);  
        return view('backenduser.post.view', compact('posts'));
    }

    //Post add form
    public function add_form()
    {
        return view('backenduser.post.add_form');
    }
    //Post Store
    public function store(Request $request)
    {
       
        //validation  
        $request->validate([
            'catid' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',    
        ]);
        //dd(Auth::user()->id);
        Post::insert([
            'user_id' => Auth::user()->id,
            'cat_id' => $request->catid,
            'title'=>$request->title,
            'description'=>$request->description,
            'poststatus' =>$request->poststatus,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Saved Successfully');
        
    }

    //Post edit
    public function edit($id)
    {
        $post = Post::find($id);
        return view('backenduser.post.edit', compact('post'));
    }

    //Post update
    public function update(Request $request, $id)
    {   
        //validation  
        $request->validate([
            'catid' => 'required',
            'title' => 'required|max:255',
            'description' => 'required', 
            
        ]);
        
        Post::find($id)->update([
            'user_id' => Auth::user()->id,
            'cat_id' => $request->catid,
            'title'=>$request->title,
            'description'=>$request->description,
            'poststatus' =>$request->poststatus,
            'updated_at'=>Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Post updated');
    }

    //Post delete
    public function delete($id)
    {
        $comments = Comment::where('blog_id',$id)->get(); 
        if(count($comments)==0)
        {
            Post::find($id)->delete();
            return Redirect()->back()->with('success','Post Deleted');
        }
        else{
            foreach($comments as $com)
            {
                Comment::find($com->id)->delete();
            }
            Post::find($id)->delete();
            return Redirect()->back()->with('success','Post Deleted');
        } 
    }



}
