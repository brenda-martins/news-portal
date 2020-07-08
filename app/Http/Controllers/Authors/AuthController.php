<?php


namespace App\Http\Controllers\Authors;


use App\Http\Controllers\AuthenticateUsers;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    use AuthenticateUsers;

    protected $redirectTo = '/autor';
    protected $guard = 'web_authors';


    
    public function showFormLogin(){
        return view('authors.auth.login');
    }
}
