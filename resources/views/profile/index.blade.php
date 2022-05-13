@extends('layouts.master')
@section('content')
    @can('is_admin')
        <h1>Admin account</h1>
            <a>{{ $user->name }}</a>
    @elsecan('is_production')
        <h1>Production account</h1>
            <a>{{ $user->name }}</a>
    @else()
        <h1>Driver account</h1>
        <a>{{ $user->name }}</a>
    @endcan
@endsection
