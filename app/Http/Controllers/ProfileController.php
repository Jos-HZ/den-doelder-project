<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{


    public function index()
    {
        return view('file-upload.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|pdf|max:2048',
        ]);

        $name = $request->file('file')->getFilename();

        $path = $request->file('file')->store('public/storage/files');

        $save = new File;

        $save->name = $name;
        $save->path = $path;

        return redirect('file-upload')->with('status', 'PDF has been uploaded');

        }

    /**
     * Validates the User
     *
     * @return array
     */
    public function validatedError(): array
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

//    public function update_avatar(Request  $request){
//
//        if($request->hasFile('avatar')){
//            $user = Auth::user();
//            if(File::exists('img/profilepictures/' . $user->avatar)) {
//                File::delete('img/profilepictures/' . $user->avatar);
//            }
//            $avatar = $request->file('avatar');
//            $filename = time() . '.' . $avatar->getClientOriginalExtension();
//            Image::make($avatar)->save( public_path('img/profilepictures/' . $filename));
//
//
//            $user->avatar = $filename;
//            $user->save();
//        }
//        return view('file-upload.index', array('user' => Auth::user()));
//    }



}
