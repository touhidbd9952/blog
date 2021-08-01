<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FontendController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin panel
Route::get('admin/profile','AdminController@profile')->name('admin.profile');

Route::group(['middleware'=>['auth','admin']], function(){
    //Category in Admin panel
    Route::get('category/view',[CategoryController::class,'view'])->name('category.view');
    Route::get('category/addform', [CategoryController::class,'add_form'])->name('category.add_form');
    Route::post('category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');

    //User in Admin panel
    Route::get('user/view',[UserController::class,'view'])->name('user.view');
    Route::get('user/addform', [UserController::class,'add_form'])->name('user.add_form');
    Route::post('user/store', [UserController::class,'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('user/delete/{id}', [UserController::class,'delete'])->name('user.delete');
});

Route::group(['middleware'=>['auth','user']], function(){
    //Post in user panel
    Route::get('post/view',[PostController::class,'view'])->name('post.view');
    Route::get('post/addform', [PostController::class,'add_form'])->name('post.add_form');
    Route::post('post/store', [PostController::class,'store'])->name('post.store');
    Route::get('post/edit/{id}', [PostController::class,'edit'])->name('post.edit');
    Route::post('post/update/{id}', [PostController::class,'update'])->name('post.update');
    Route::get('post/delete/{id}', [PostController::class,'delete'])->name('post.delete');

    //Comment on post in user panel
    Route::get('comment/view',[CommentController::class,'view'])->name('comment.view');
    Route::get('comment/addform', [CommentController::class,'add_form'])->name('comment.add_form');
    Route::post('comment/store', [CommentController::class,'store'])->name('comment.store');
    Route::get('comment/edit/{id}', [CommentController::class,'edit'])->name('comment.edit');
    Route::post('comment/update/{id}', [CommentController::class,'update'])->name('comment.update');
    Route::get('comment/delete/{id}', [CommentController::class,'delete'])->name('comment.delete');
});


//fontend post view section
Route::get('postcategory/view/{id}', [FontendController::class,'viewpostbycategory'])->name('postcategory.view');
Route::get('postdetails/view/{id}', [FontendController::class,'postdetails_view'])->name('postdetails.view');
Route::post('commenterlogin/{id}', [FontendController::class,'commenterlogin'])->name('commenterlogin');
Route::post('search', [FontendController::class,'search'])->name('search');

