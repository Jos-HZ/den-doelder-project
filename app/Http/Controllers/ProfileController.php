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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    public function profile()
    {
        return view('file-upload.index', array('user' => Auth::user()));
    }

    public function index()
    {
        $storage = File::allFiles(storage_path('app/public/files'));
        $files = Storage::allFiles('app/public/files');
        foreach ($storage as $file) {
            $names = $file->getFilename();
        }
        return view('file-upload.index', compact('names'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required|pdf|max:2048',

        ]);

        $name = $request->file('file')->getClientOriginalName();
// als hij geupload is, wil ik gelijk de url/name weten te koppelen aan een order en controleren of die order al een pdf gekoppeld heeft fuck dit word kut.
        $path = $request->file('file')->store('public/files');


        $save = new File;

        $save->name = $name;
        $save->path = $path;

        return redirect('file-upload')->with('status', 'File Has been uploaded successfully');
    }

    public function getName(){
        $storage = File::allFiles(storage_path('files'));

        foreach ($storage as $file) {
            echo $file->getFilename();
        }
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
