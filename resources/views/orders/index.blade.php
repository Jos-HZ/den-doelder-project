@extends('layout.master')

@section('content')
    {{--            TODO make dynamic --}}
    <section class="section">
        <div class="container">

            <!-- Nav tabs -->
            <div class="tabs is-centered" role="tabpanel">
                <ul role="tablist">
                    @if($productions)
                        @foreach($productions as $production)
                            <li role="presentation" class="active">
                                <a href="#{{ $production -> production_line }}"
                                   aria-controls="{{ $production->production_line }}"
                                   id="{{ $production->production_line }}"
                                   role="tab"
                                   data-toggle="tab">{{ $production -> production_line }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    @if($orders)
                        @foreach($orders as $order)
                            <div role="tabpanel" class="tab-pane active" id="{{ $production->production_line }}">
                            <a href="{{ route('orders.show', $order) }}">
                                <article class="tile is-child notification has-background-grey-lighter">
                                    <p class="title text-bold">Order: {{ $order->ordernumber }}</p>
                                    <p class="subtitle has text-success">{{ $order->notes }}</p>
                                </article>
                            </a>
                            </div>
                        @endforeach
                    @endif

                </div>

        </div>
    </section>
@endsection
