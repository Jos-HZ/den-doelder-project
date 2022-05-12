@extends('layouts.master')
@section('head')
    <script src="/js/tabs.js"></script>
@endsection

@section('content')
    <container class="lists">
        <container class="tabs">
            @foreach ($orders->groupBy('production_line_id')->sortKeys() as $orderGroupKey=>$orderGroup)
                <tab
                    @class(['tab', 'current' => app('request')->input('cape') == false ? $loop->first : app('request')->input('cape') == $orderGroupKey])
                    onCLick="xOnClick({{ $loop->index }}, this)"
                    data-cape="{{ $orderGroupKey }}"
                >Cape {{ $orderGroupKey }}
                </tab>
            @endforeach
        </container>
        <container class="horizontal flexContainer" dir="ltr" onscroll="xOnScroll()">
            @foreach ($orders->groupBy('production_line_id') as $orderGroupKey=>$orderGroup)
                <container class="vertical flexContainer" id="cape-{{ $orderGroup }}">
                    @foreach ($orderGroup as $order)
                        <a href="{{ route('orders.show', $order) }}">
                            <card class="order">
                                <p class="title text-bold">Order: {{ $order->ordernumber }}</p>
                                <p class="order">{{ $order->notes }}</p>

                                <div class="stepper-wrapper">
                                    <div class="stepper-item completed">
                                        <div class="step-counter"></div>
                                        <div class="step-name">Admin</div>
                                    </div>
                                    <div class="stepper-item {{ $order->driver_done ? 'completed' : 'active' }}"
                                            id="driver">
                                        <div class="step-counter"></div>
                                        <div class="step-name">Driver</div>
                                    </div>
                                    <div
                                        class="stepper-item active {{ $order->production_done ? 'completed' : 'active' }} "
                                        id="production">
                                        <div class="step-counter"></div>
                                        <div class="step-name">Production</div>
                                    </div>
                                </div>

                            </card>
                        </a>
                    @endforeach
                </container>
            @endforeach
        </container>
    </container>

@endsection
