<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProductionController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
