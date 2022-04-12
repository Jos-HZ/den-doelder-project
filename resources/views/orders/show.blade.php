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
                <div class="tile is-parent is-8">
                    <article class="tile is-child box has-background-success">
                        <p class="title">Notes</p>
{{--                        TODO add here the note dynamic--}}
                        <div class="content">
{{--                            TODO: add faker notes --}}
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent">
                    <a href="{{ route('error.create', $order)}}">
                        <article class="tile is-child box has-background-danger">
                            <p class="title text-lg-center">Error</p>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
