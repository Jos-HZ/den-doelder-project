@extends('layouts.master')
@section('content')
    @foreach($users as $user)
        @can('is_admin')
            @if($user->role === 'admin')
            <h1>Admin account</h1>
            <a>{{ $user->name }}</a>
            @endif
        @elsecan('is_production')
            @if($user->role === 'production')
            <h1>Production account</h1>
            <a>{{ $user->name }}</a>
            @endif
        @elsecan('is_driver')
            @if($user->role === 'driver')
            <h1>Driver account</h1>
            <a>{{ $user->name }}</a>
            @endif
        @endcan
    @endforeach


@endsection
