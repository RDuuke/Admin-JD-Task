<?php

namespace Task\Http\Middleware;

use Closure;
use Session;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->rol !== 'admin'){
            Session::flash('message', 'No tiene privilegios para esta accion');
            return redirect('admin');
        }

        return $next($request);
    }
}
