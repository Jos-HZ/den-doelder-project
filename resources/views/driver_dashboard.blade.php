@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{__("You are logged in as driver!")}}</h1>

            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical">
                    <a href="{{ route('placements.index')  }}">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">{{__("Location log")}}</p>
                        </article>
                    </a>
                </div>
            </div>

            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical">
                    <a href="{{ route('backlog.index')  }}">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">{{__("Error log")}}</p>
                        </article>
                    </a>
                </div>
            </div>

            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical">
                    <a href="{{ route('orders.data')  }}">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">{{__("Order log")}}</p>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
