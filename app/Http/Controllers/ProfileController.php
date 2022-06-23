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
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $request->file('file')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
        }
    }

    public function upload(Request $request): RedirectResponse
    {
        $uniqueFileName = uniqid() . $request->get('upload_file')->getClientOriginalName() . '.' . $request->get('upload_file')->getClientOriginalExtension();

        $request->get('upload_file')->move(public_path('files') . $uniqueFileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
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
