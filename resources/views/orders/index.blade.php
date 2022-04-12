@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="tabs is-boxed" role="tab">
                <ul role="tablist">
                    @foreach($productions as $production)
                        <li class="{{ $production->id === 1 ? 'active' : '' }}">
                            <a href="#{{ $production -> production_line }}" aria-controls="{{ $production->production_line }}" id="{{ $production->production_line }}" role="tab" data-toggle="tab">{{ $production -> production_line }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

{{--            TODO make dynamic --}}
            @foreach($orders as $order)
                <a href="{{ route('order.show', $order) }}">
                    <article class="tile is-child notification has-background-grey-lighter">
                        <p class="title text-bold">order {{ $order -> ordernumber }}</p>
                        <p class="subtitle has text-success"> this is the note section</p>
                    </article>
                </a>
                <br>
            @endforeach
        </div>
    </section>
@endsection
