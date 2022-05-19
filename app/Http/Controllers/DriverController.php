<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('driver_dashboard', compact('user'));
    }
}
