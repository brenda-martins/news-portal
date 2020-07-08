<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        // dd($request);
        if (!$request->expectsJson()) {

            if ($request->getPathInfo() == '/admin') {
                return route('admin.login');
            }

            if ($request->getPathInfo() == '/autor') {
                return route('autor.login');
            }
            // return route('login');
        }
    }
}
