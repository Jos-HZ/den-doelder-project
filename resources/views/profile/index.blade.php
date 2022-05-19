@extends('layouts.master')
@section('content')
        @can('is_admin')
            @if($user->role === 'admin')
                <img src="img/profilepictures/{{$user->avatar }}" style="width: 150px; height: 150px; float:left; border-radius:50%; margin-right:25px">
                <h1>{{ $user->name }}'s Profile</h1>
                <a href='/profiles/{{$user->id}}/edit'>
                    <button class="btn btn-default" type="button">Settings</button>
                </a>
                <br>
                <a>bio</a>
            @endif
        @elsecan('is_production')
            @if($user->role === 'production')
                <h1>{{ $user->name }}'s Profile</h1>
                <a href="{{route('profiles.index', $user)}}">
                    <button class="btn btn-default" type="button">Settings</button>
                </a>
                <br>
                <a>bio</a>
            @endif
        @elsecan('is_driver')
            @if($user->role === 'driver')
                <h1>{{ $user->name }}'s Profile</h1>
                <a href="{{route('profiles.edit', $user)}}">
                    <button class="btn btn-default" type="button">Settings</button>
                </a>
                <br>
                <a>bio</a>
            @endif
        @endcan



@endsection
