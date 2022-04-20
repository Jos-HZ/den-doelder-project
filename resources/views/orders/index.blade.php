@extends('layouts.master')
@section('head')
    <script src="js/tabs.js"></script>
@endsection

@section('content')
    @php
        $capeArray = [1, 2, 5];
    @endphp

    <container class="lists">
        <container class="tabs">
                @foreach ($capeArray as $production_idKey=>$production_id)
                <tab @class(['tab', 'is-active' => $loop->first]) onCLick="XcrollTo({{ $production_idKey }})">Cape {{ $production_id }}</tab>
            @endforeach
        </container>
        <container class="horizontal flexContainer" dir="ltr">
            @foreach ($capeArray as $production_idKey=>$production_id)
                <container class="vertical flexContainer" id="cape-{{ $production_id }}">
                    @foreach ($orders as $order)
                        @if ($order->production_id === $production_id)
                            <a href="{{ route('orders.show', $order) }}">
                                <card class="order">
                                    <p class="title text-bold">Order: {{ $order->ordernumber }}</p>
                                    <p class="order">{{ $order->notes }}</p>
                                </card>
                            </a>
                        @endif
                    @endforeach
                </container>
            @endforeach
        </container>
    </container>
@endsection
