<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function dashboard()
    {
        return view('driver_dashboard');
    }
}
