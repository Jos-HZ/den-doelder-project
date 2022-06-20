<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required:pdf|max:2048',

        ]);

        $name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('public/files');


        $save = new File;

        $save->name = $name;
        $save->path = $path;

        return redirect('file-upload')->with('status', 'File Has been uploaded successfully');

    }
}
