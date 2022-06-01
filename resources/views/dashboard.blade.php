@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            @can('is_admin')
                @include('partials/language_switcher')
                <h1>{{__('Welcome Back!')}}</h1>
                <h1>{{__('You are logged in as admin!')}}</h1>
                <h1>{{__('You are logged in!')}}</h1>


                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('orders.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">{{__("Orders")}}</p>
                            </article>
                        </a>
                    </div>
                </div>

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('backlog.index')  }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">{{__("Backlog")}}</p>
                            </article>
                        </a>
                    </div>
                </div>

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-vertical">
                        <a href="{{ route('users.create') }}">
                            <article class="tile is-child box">
                                <p class="title text-lg-center">{{__("Register a new user")}}</p>
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
