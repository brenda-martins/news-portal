<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


trait AuthenticateUsers
{

    public function __construct()
    {
        $this->middleware("guest:$this->guard", ['except' => 'logout']);
    }


    /**
     * Manipula uma solicitação de login da aplicação
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {

        $validations = $this->validateLogin($request->all());

        if ($validations->fails()) {

            return redirect()->back()
                ->withErrors($validations->errors())
                ->withInput($request->all());
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::guard($this->guard)->attempt($credentials)) {

            throw ValidationException::withMessages([
                'message' => 'Suas credenciais não batem com nossos dados',
            ]);
        }

        return redirect()->intended($this->redirectTo);
    }



    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Facades\Validator
     * 
     */
    protected function validateLogin($request)
    {

        $rules = [
            'email' => 'required|string',
            'password' => 'required|string'
        ];

        $messages = [
            'email.required' => 'Campo email é obrigatório',
            'email.string' => 'Campo email inválido',
            'password.required' => 'Campo senha é obrigatória',
            'password.string' => 'Campo senha inválido'
        ];

        return Validator::make($request, $rules, $messages);
    }


    protected function logout()
    {        
        Auth::guard($this->guard)->logout();

        // var_dump(Auth::user());
        return redirect($this->redirectTo);
    }
}
