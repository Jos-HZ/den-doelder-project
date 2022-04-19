@extends('layout.master')

@section('head')
    <script src="js/tabs.js"></script>
@endsection

@section('content')
    {{--            TODO make dynamic --}}
    <section class="section">
        <div class="container">
            <div class="mb-0">
                <nav class="tabs is-boxed is-fullwidth is-medium">
                    <div class="container">
                        <ul>
                            {{--  TODO: find alternative for event  --}}
                            <li class="tab is-active" onclick="openTab(event,'cape-1')"><a>Cape 1</a></li>
                            <li class="tab" onclick="openTab(event,'cape-2')"><a>Cape 2</a></li>
                            <li class="tab" onclick="openTab(event,'cape-5')"><a>Cape 3</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container section">
                <div id="cape-1" class="content-tab">
                    @foreach($orders as $order)
                        @if($order->production_id === 1)
                            <div class="my-3">
                                <a href="{{ route('order.show', $order) }}">
                                    <article class="tile is-child notification has-background-grey-lighter">
                                        <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                                        <p class="subtitle has text-success"> this is the note section</p>
                                    </article>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div id="cape-2" class="content-tab" style="display:none">
                    @foreach($orders as $order)
                        @if($order->production_id === 2)
                            <div class="my-3">
                                <a href="{{ route('orders.show', $order) }}">
                                    <article class="tile is-child notification has-background-grey-lighter">
                                        <p class="title text-bold">Order: {{ $order->ordernumber }}</p>
                                        <p class="subtitle has text-success">{{ $order->notes }}</p>
                                    </article>
                                </a>

                            </div>
                        @endif
                    @endforeach
                </div>

                <div id="cape-5" class="content-tab" style="display:none">
                    @foreach($orders as $order)
                        @if($order->production_id === 5)
                            <div class="my-3">
                                <a href="{{ route('order.show', $order) }}">
                                    <article class="tile is-child notification has-background-grey-lighter">
                                        <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                                        <p class="subtitle has text-success"> this is the note section</p>
                                    </article>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
n
