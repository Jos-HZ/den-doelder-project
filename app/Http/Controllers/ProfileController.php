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
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{

    public function profile()
    {
        return view('file-upload.index', array('user' => Auth::user()));
    }

    public function index(Request $request)
    {
        $users = User::filter($request)->get();

        return view('file-upload.index', compact('users'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required|pdf|max:2048',

        ]);

        $name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('public/files');


        $save = new File;

        $save->name = $name;
        $save->path = $path;

        return redirect('file-upload')->with('status', 'File Has been uploaded successfully');
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

        return redirect(route('file-upload.index', $user));
    }

}
