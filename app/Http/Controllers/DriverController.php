<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function dashboard()
    {
        return view('driver_dashboard');
    }
}
