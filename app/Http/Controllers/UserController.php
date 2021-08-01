<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //All User View
    public function view()
    {
        //get all data from users table
        $users = User::latest()->orderBy('name','asc')->paginate(5);  
        return view('backend.user.view', compact('users'));
    }

    //User add form
    public function add_form()
    {
        return view('backend.user.add_form');
    }
    //User Store
    public function store(Request $request)
    {
        //dd($request->all());
       
        //validation  
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        User::insert([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Saved Successfully');
    }

    //User edit
    public function edit($id)
    {
        $users = User::find($id);
        return view('backend.user.edit', compact('users'));
    }

    //User update
    public function update(Request $request, $id)
    {   
        $user = User::find($id);
        $newemail = "";
        $newemail = $request->email;
        if($newemail != $user->email)
        {
            //validation  
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        else{
            //validation  
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required'],
            ]);
        }

        

        //dd($request->all());
        $newpassword ="";
        $newpassword = $request->password;
        if($newpassword == "")
        {
            $newpassword = $user->password;
        }
        User::find($id)->update([
            'role_id' => $request->role_id ,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newpassword),
            'updated_at'=>Carbon::now(),
        ]);
        return Redirect()->back()->with('success','User updated');
    }

    //User delete
    public function delete($id)
    {
        $user = User::find($id);
        if($user->role_id ==2)
        {
            Comment::where('user_id',$id)->delete();
            Blog::where('user_id',$id)->delete();
            User::find($id)->delete();
            return Redirect()->back()->with('success','user Deleted');
        }
        return Redirect()->back()->with('error','Sorry, Admin account can not be delete');
        
    }


}
