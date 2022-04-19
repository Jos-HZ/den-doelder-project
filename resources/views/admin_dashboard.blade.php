@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical">
                    <a href="{{ route('order.index')  }}">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">Orders</p>
                        </article>
                    </a>

                </div>
            </div>
        </div>
    </section>
@endsection
