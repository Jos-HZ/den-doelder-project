@extends('layouts.master')
@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            @include('partials.allData')
        </div>
    </section>
@endsection
