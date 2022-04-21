<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        $checkrole = explode(',', $role);

        if (in_array('admin', $checkrole)) {
            return redirect('/admin_dashboard');
        }

        if (in_array('production', $checkrole)) {
            return redirect('/dashboard');
        }

        if (in_array('driver', $checkrole)) {
            return redirect('/driver_dashboard');
        }
        return 403;
    }
}
