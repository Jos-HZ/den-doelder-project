@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Control list</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Order details</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">Quality control</p>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-8">
                    <article class="tile is-child box has-background-success">
                        <div class="notesTitle">
                            <p class="title">Notes</p>
                            @if(true)
                                @if (Request::query('field') === 'notes')
                                    <input type="submit" form="notes" value="floppy disk svg"/>
                                    <div class="content">
                                        <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <textarea type="text" id="notes" name="notes">{{ $order->notes }}</textarea>
                                        </form>
                                    </div>
                                @else
                                    <div class="notesButton">
                                        <a href="{{ Request::url() }}/edit?field=notes"><img src="/img/svg/{{ (isset($order->notes) ? 'edit' : 'create') }}.svg"></a>
                                    </div>
                                    {{--                        TODO add here the note dynamic--}}
                                    <div class="content">
                                        <p>{{ $order->notes }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </article>
                </div>
                <div class="tile is-parent">
                    <a href="{{ route('error.create', ['ordernumber' => $order->ordernumber ])}}">
                        <article class="tile is-child box has-background-danger">
                            <p class="title text-lg-center">Error</p>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
