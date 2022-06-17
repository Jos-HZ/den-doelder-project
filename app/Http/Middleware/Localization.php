<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next )
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));

            DB::table('users')
                ->where("id", '=', Auth::user()->id )
                ->update(['language'=> Session::get('locale')]);

        }

        return $next($request);

    }
}
