<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;


class ProfileEdit
{


    public function handle($request, Closure $next)
    {
        dd($request->route()->parameters());
        if(Auth::id()!=$request->route()->parameters()){
            redirect('/home');
        }else if(Auth::id()==$request->route()->parameters()){
            return $next($request);
        }


    }
}
