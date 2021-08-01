<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FontendController extends Controller
{
    //view post by category id
    public function viewpostbycategory($catid)
    {
        $posts = Post::where('cat_id',$catid)->get(); 
        return view('welcome', compact('posts'));
    }
    //post details view
    public function postdetails_view($postid)
    {   
        //$user = User::where('email',$request->email)->where('password',$request->password)->get(); 
        
        $post = Post::where('id',$postid)->get(); 
        $postcomments = Comment::where('post_id',$postid)->get();
        return view('postdetails', compact('post','postcomments'));
    }
    //check commenterlogin for comment on post
    public function commenterlogin(Request $request, $postid)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = "";
        $user = User::where('email', '=', $request->email)->first(); 
        
        if($user != "")
        {
            if(Hash::check($request->password, $user->password))
            { 
                Comment::insert([
                    'user_id' => $user->id,
                    'post_id' => $postid,
                    'comment'=>$request->comment,
                    'commentstatus'=>'publish',
                    'created_at'=>Carbon::now(),
                ]);
                return Redirect()->route('postdetails.view',[$postid])->with('success',"comment saved");
            }
            else{
                return Redirect()->back()->with('error',"email or password not match");
            }
        }
        else{
            return Redirect()->back()->with('error',"email or password not match");
        }
        
        
    }

    public function search(Request $request)
    {
        $posts = array();
        $category = Category::where('name',"LIKE", "%".$request->searchword."%")->first(); 
        if(!empty($category))
        {
            $posts = Post::where('cat_id','=',$category->id)->get();   
        }
        if(empty($posts))
        {
            
            $posts = Post::where('title',"LIKE", "%".$request->searchword."%")->get();
            
        }
        if(empty($posts))
        {
            $user = User::where('name',"LIKE", "%".$request->searchword."%")->first(); 
            if(!empty($user))
            {
                $posts = Post::where('user_id','=',$user->id)->get();   
            }
        }

        
        return view('welcome', compact('posts'));
    }

}
