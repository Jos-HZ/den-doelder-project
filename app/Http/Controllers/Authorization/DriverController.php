<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('driver_dashboard', compact('user'));
    }
}
