@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            @can('is_admin')
                @include('partials/language_switcher')
                <h1>{{__('Welcome Back!')}}</h1>
                <h1>Je bent ingelogd als admin</h1>
                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('orders.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Orders</p>
                            </article>
                        </a>
                    </div>
                </div>

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('backlog.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Backlog</p>
                            </article>
                        </a>
                    </div>
                </div>

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('qualityControl.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Qualitycontrol</p>
                            </article>
                        </a>
                    </div>
                </div>

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Register a new user</p>
                            </article>
                        </a>
                    </div>
                </div>

            @else
                <h1>Je bent ingelogd als production</h1>
                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('orders.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Orders</p>
                            </article>
                        </a>
                    </div>
                </div>
                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('qualityControl.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">Qualitycontrol</p>
                            </article>
                        </a>
                    </div>
                </div>
            @endcan
        </div>
    </section>
@endsection
