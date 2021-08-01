<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //check user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        //
    }
}
