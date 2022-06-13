<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return int|Redirector|RedirectResponse|Application
     */
    public function index(): int|Redirector|RedirectResponse|Application
    {
        return match (Auth::user()->role) {
            "admin", "production" => redirect('/dashboard'),
            "driver" => redirect('/driver_dashboard'),
            default => 403,
        };
    }
}
