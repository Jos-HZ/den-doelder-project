@extends('layouts.master')
@section('content')
    @foreach($users as $user)
        @can('is_admin')
            @if($user->role === 'admin')
            <h1>{{ $user->name }}</h1>
            <a href='/profile/{{$user->id}}/edit'>
                <button class="btn btn-default" type="button">Settings</button>
            </a>
            <br>
            <a>bio</a>
            @endif
        @elsecan('is_production')
            @if($user->role === 'production')
            <h1>{{ $user->name }}</h1>
            <a href="{{route('profile.edit', $user)}}">
                <button class="btn btn-default" type="button">Settings</button>
            </a>
            <br>
            <a>bio</a>
            @endif
        @elsecan('is_driver')
            @if($user->role === 'driver')
            <h1>{{ $user->name }}</h1>
            <a href="{{route('profile.edit', $user)}}">
                <button class="btn btn-default" type="button">Settings</button>
            </a>
            <br>
            <a>bio</a>
            @endif
        @endcan
    @endforeach


@endsection
