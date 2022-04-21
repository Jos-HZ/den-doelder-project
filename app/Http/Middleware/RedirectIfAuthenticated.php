<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirects users when user is logged in. It redirects the user and admin
     * to their own dashboard
     *
     * @param Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                /**
                 * @var User $user
                 */
                $user = Auth::guard($guard);

                // to admin dashboard
                if ($user->hasRole('admin')) {
                    return redirect(route('admin'));
                }

                // to user dashboard
                if ($user->hasRole('production')) {
                    return redirect(route('dashboard'));
                }

                if ($user->hasRole('driver')) {
                    return redirect(route('driver_dashboard'));
                }
            }
        }
        return $next($request);
    }
}
