<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role) {
            case "admin":
            case "production":
                return redirect('/dashboard');
                break;
            case "driver":
                return redirect('/driver_dashboard');
                break;
            default:
                return 403;
        }
    }
}
