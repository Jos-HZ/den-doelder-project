<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $users = User::filter($request)->get();

        return view('/profile.index');
    }
}
