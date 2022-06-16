@extends('layouts.master')



    <form enctype="multipart/form-data" method="POST" action="{{ route('profile.store') }}">
    <label for="upload_file">Upload File</label>

        <input class="form-control" type="file" name="upload_file" id="upload_file">
        <input type="submit" value="Submit" class="button is-link">
        <a href="{{route('profile.index')}}">
            <button type="button" class="button is-link-light">Cancel</button>
        </a>
    </form>


