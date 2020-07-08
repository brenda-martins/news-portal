<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AuthenticateUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticateUsers;


    protected $redirectTo = '/admin';
    protected $guard = 'web_administrators';

    public function showFormLogin()
    {
        return view('admin.auth.login');
    }
}
