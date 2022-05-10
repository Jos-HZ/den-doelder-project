@extends('layouts.master')
@section('content')
    @can('is_admin')
        <h1>Admin account</h1>
    @else
        <h1>production</h1>
    @endcan
@endsection
