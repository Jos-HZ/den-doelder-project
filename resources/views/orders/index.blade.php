@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="tabs is-boxed">
                <ul>
                    <li class="is-active">
                        <a href=""><span>Cape 1</span></a>
                    </li>
                    <li>
                        <a href=""><span>Cape 2</span></a>
                    </li>
                    <li>
                        <a href=""><span>Cape 5</span></a>
                    </li>
                </ul>
            </div>
{{--            TODO make dynamic--}}
            @foreach($orders as $order)
                <a href="{{ route('order.show', $order) }}">
                    <article class="tile is-child notification has-background-grey-lighter">
                        <p class="title text-bold">{{ $order -> id }}</p>
                        <p class="subtitle has text-success"> this is the note section</p>
                    </article>
                </a>
                <br>
            @endforeach

        </div>
    </section>
@endsection
