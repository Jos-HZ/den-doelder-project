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
                {{-- <a @class(['tab', 'is-active' => $loop->first]) href="#cape-{{ $production_id }}">Cape {{ $production_id }}</a> --}}
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
    {{-- <div class="cape123">
        @foreach ($capeArray as $production_id)
            <div class="tab">
                <input type="radio" id="capje-{{ $production_id }}" name="capje" {{ $loop->first ? 'checked' : '' }}>
                <label for="capje-{{ $production_id }}">capje-{{ $production_id }}</label>
                <div class="content-tab content" id="cape-{{ $production_id }}">
                    @foreach ($orders as $order)
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
            </div>
        @endforeach
     </div> --}}

     {{-- <div class="cape123">
         @foreach ($capeArray as $production_id)
             <div class="tab">
                 <input type="radio" id="capje-{{ $production_id }}" name="capje" {{ $loop->first ? 'checked' : '' }}>
                 <label for="capje-{{ $production_id }}">capje-{{ $production_id }}</label>
                 <div class="content-tab content" id="cape-{{ $production_id }}">
                     @foreach ($orders as $order)
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
             </div>
             {{-- <a @class([
                 'tab',
                 'is-active' => $loop->first
             ]) href="javascript:testFunc(this)">Cape {{ $cape }}</a> --}}
             {{-- <a href="#cape-{{ $cape }}"><li @class(['tab','is-active' => $loop->first])>CAPE {{ $cape }}</li></a> --}}
         {{-- @endforeach
      </div> --}}
               {{-- TODO make dynamic --}}
    {{-- <section class="section">
        <div class="container">
            <div class="mb-0">
                <nav class="tabs is-boxed is-fullwidth is-medium">
                    <div class="container">
                        <ul>
                            <li class="tab is-active" onclick="openTab(event,'cape-1')"><a>Cape 1</a></li>
                            <li class="tab" onclick="openTab(event,'cape-2')"><a>Cape 2</a></li>
                            <li class="tab" onclick="openTab(event,'cape-5')"><a>Cape 5</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container section">
                @foreach ($capeArray as $production_id)
                    <div id="cape-{{ $production_id }}" class="content-tab" style="{{ $production_id === 1 ? '' : 'display:none'}}">
                        @foreach ($orders as $order)
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
    </section> --}}
@endsection
