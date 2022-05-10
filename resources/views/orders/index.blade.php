@extends('layouts.master')
@section('head')
    <script src="/js/tabs.js"></script>
@endsection

@section('content')
    @php
        $capeArray = [1, 2, 5];
    @endphp

    <container class="lists">
        <container class="tabs">
            @foreach ($capeArray as $production_id)
                <tab
                    @class(['tab', 'current' => app('request')->input('cape') == false ? $loop->first : app('request')->input('cape') == $production_id])
                    onCLick="xOnClick({{ $loop->index }}, this)"
                    data-cape="{{ $production_id }}"
                >Cape {{ $production_id }}
                </tab>
            @endforeach
        </container>
        <container class="horizontal flexContainer" dir="ltr" onscroll="xOnScroll()">
            @foreach ($capeArray as $production_line_idKey=>$production_id)
                <container class="vertical flexContainer" id="cape-{{ $production_id }}">
                    @foreach ($orders as $order)
                        @if ($order->production_line_id === $production_id)
                            <a href="{{ route('orders.show', $order) }}">
                                <card class="order">
                                    <p class="title text-bold">Order: {{ $order->ordernumber }}</p>
                                    <p class="order">{{ $order->notes }}</p>

                                    <div class="stepper-wrapper">
                                        <div class="stepper-item completed" >
                                            <div class="step-counter"></div>
                                            <div class="step-name">Admin</div>
                                        </div>
                                        <div class="stepper-item {{ $order->driver_done ? 'completed' : 'active' }}" id="driver">
                                            <div class="step-counter"></div>
                                            <div class="step-name">Driver</div>
                                        </div>
                                        <div class="stepper-item active" id="production">
                                            <div class="step-counter"></div>
                                            <div class="step-name">Production</div>
                                        </div>
                                    </div>

                                </card>
                            </a>
                        @endif
                    @endforeach
                </container>
            @endforeach
        </container>
    </container>

@endsection
