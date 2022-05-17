<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
