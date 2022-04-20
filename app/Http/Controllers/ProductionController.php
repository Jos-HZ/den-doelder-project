<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
