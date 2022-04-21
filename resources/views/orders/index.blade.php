@extends('layouts.master')
@section('head')
    <script src="public/js/tabs.js"></script>
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
                @foreach ([1, 2, 5] as $production_idKey=>$production_id)
                    <div id="cape-{{ $production_id }}" class="content-tab"
                         style="{{ $production_id === 1 ? '' : 'display:none'}}">
                        @foreach ($orders as $orderKey=>$order)
                            @if ($order->production_id === $production_id)
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
                @endforeach
            </div>
        </div>
    </section>
@endsection
