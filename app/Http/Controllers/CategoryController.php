<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //All Category View
    public function view()
    {
        //get all data from categories table
        $categories = Category::latest()->orderBy('name','asc')->paginate(5);  
        return view('backend.category.view', compact('categories'));
    }

    //Category add form
    public function add_form()
    {
        return view('backend.category.add_form');
    }
    //Category Store
    public function store(Request $request)
    {
       
        //validation  
        
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            
        ],
        [
            'name.required' => 'Category Name Required',
            'name.max' => 'Maximum 255 chars',
            
        ]);
        // echo $request->category_name;die;
        Category::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Saved Successfully');
        
    }

    //Category edit
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.category.edit', compact('categories'));
    }

    //Category update
    public function update(Request $request, $id)
    {   
        //validation  
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            
        ],
        [
            'name.required' => 'Category Name Required',
            'name.max' => 'Maximum 255 chars',
            
        ]);
        //dd($request->all());
        Category::find($id)->update([
            'name'=>$request->name, 
            'updated_at'=>Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Category updated');
    }

    //Category delete
    public function delete($id)
    {
        $blogs = Post::where('cat_id',$id)->get(); 
        if(count($blogs)==0){
            Category::find($id)->delete();
            return Redirect()->back()->with('success','Category Deleted');
        }
        else{
            return Redirect()->back()->with('error-msg','This category is exist in post table');
        }
        

    }
}
