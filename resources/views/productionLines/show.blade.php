@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="pull-right">
            <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        </div>
            <h1 class="has-text-centered"> Cape {{ $production_line->production_line }}</h1>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
            @foreach($production_line->orders as $order)
                <a href="{{ route('orders.show', $order) }}">
                    <div class="my-2">
                            <div class="tile is-child box">
                                <p class="title">{{__("Order")}} {{ $order->ordernumber }}</p>
                                <p class="has-text-link-dark"> {{ $order->notes }} </p>
                            </div>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </section>

@endsection



