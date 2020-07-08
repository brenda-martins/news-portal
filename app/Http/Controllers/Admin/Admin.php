<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web_administrators');
    }


    public function index()
    {
        return view("admin.index");
    }

   
}
