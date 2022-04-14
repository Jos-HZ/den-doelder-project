@extends('layout.master')
@section('head')
    <script src="js/tabs.js"></script>
@endsection

@section('content')
    {{--            TODO make dynamic --}}
    <section class="section">
        <div class="container">

            <div class="tabs is-centered">
                <!-- Nav tabs -->
                <div role="tablist" aria-label="Cape tabs">
                    <button role="tab" aria-selected="true" aria-controls="panel-1" id="tab-1" tabindex="0">
                        Cape 1
                    </button>
                    <button role="tab" aria-selected="false" aria-controls="panel-2" id="tab-2" tabindex="-1">
                        Cape 2
                    </button>
                    <button role="tab" aria-selected="false" aria-controls="panel-3" id="tab-3" tabindex="-1">
                        Cape 5
                    </button>
                </div>

                <!-- Tab content -->
                <div id="panel-1" role="tabpanel" tabindex="0" aria-labelledby="tab-1">
                    @foreach($orders as $order)
                        @if($order->production_id === 1)
                            <a href="{{ route('order.show', $order) }}">
                                    <article class="tile is-child notification has-background-grey-lighter">
                                        <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                                        <p class="subtitle has text-success"> this is the note section</p>
                                    </article>
                            </a>
                        @endif
                    @endforeach
                </div>

                <div id="panel-2" role="tabpanel" tabindex="0" aria-labelledby="tab-2" hidden>
                    @foreach($orders as $order)
                        @if($order->production_id === 2)
                            <a href="{{ route('order.show', $order) }}">
                                <article class="tile is-child notification has-background-grey-lighter">
                                    <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                                    <p class="subtitle has text-success"> this is the note section</p>
                                </article>
                            </a>
                        @endif
                    @endforeach
                </div>

                <div id="panel-3" role="tabpanel" tabindex="0" aria-labelledby="tab-3" hidden>
                    @foreach($orders as $order)
                        @if($order->production_id === 5)
                            <a href="{{ route('order.show', $order) }}">
                                <article class="tile is-child notification has-background-grey-lighter">
                                    <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                                    <p class="subtitle has text-success"> this is the note section</p>
                                </article>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection
