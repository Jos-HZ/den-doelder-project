<?php

namespace App\Http\Controllers;

use App\Models\Error;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $users = User::filter($request)->get();

        return view('profile.index', compact('users'));
    }

    public function edit(user $user)
    {
        return view('profile.edit', compact('user'));
    }

    /**
     * Validates the User
     *
     * @param Request $request
     * @return array
     */
    public function validatedError(Request $request): array
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->update($this->validatedError($request));

        return redirect(route('profile.index', $user));
    }



}
