@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>Cape {{ $production_line->production_line }}</h1>

            @foreach($production_line->orders as $order)
                    <a href="{{ route('orders.show', $order) }}">
                        <h2>{{ $order->ordernumber }}</h2>
                    </a>
            @endforeach

        </div>
    </section>
@endsection



