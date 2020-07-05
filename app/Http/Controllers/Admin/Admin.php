<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view("admin.index");
    }

    /**
     * @return void
     */
    public function login()
    {
    }

    /**
     * @return void
     */
    public function logout()
    {
    }
}
