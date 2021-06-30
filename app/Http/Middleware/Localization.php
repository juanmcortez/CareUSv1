<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {
            session()->put('locale', Auth::user()->persona->language);
            App::setLocale(session()->get('locale'));
        } else {
            if (session()->has('locale')) {
                App::setLocale(session()->get('locale'));
            } else {
                session()->put('locale', config('app.locale'));
                App::setLocale(session()->get('locale'));
            }
        }
        return $next($request);
    }
}
