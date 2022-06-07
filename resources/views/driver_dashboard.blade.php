@extends('layouts.master')
@section('content')
    @include('partials/language_switcher')
    <h1>{{__("You are logged in as driver!")}}</h1>
@endsection
