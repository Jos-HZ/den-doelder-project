<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
