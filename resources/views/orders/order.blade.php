@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Control list</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Order details</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Quality control</p>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                @yield('notes')
                <div class="tile is-parent">
                    <article class="tile is-child box has-background-danger">
                        <p class="title text-lg-center">Error</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
