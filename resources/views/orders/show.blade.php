@extends('layouts.master')

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

                                @if (Request::query('field') === 'notes')
                                    <div class="notesButton">
                                        <a href="javascript:document.getElementById('notes').submit()"><img src="/img/svg/save.svg"></a>
                                    </div>
                                @else
                                    <div class="notesButton">
                                        <a href="{{ request()->fullUrlWithQuery(['field' => 'notes']) }}"><img src="/img/svg/{{ (isset($order->notes) ? 'edit' : 'create') }}.svg"></a>
                                    </div>
                                @endif
                        </div>
                        @if (Request::query('field') === 'notes')
                                <div class="content">
                                    <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grow-wrap">
                                            <textarea name="notes" oninput="this.parentNode.dataset.replicatedValue = this.value" class="is-focused has-background-success">{{ $order->notes }}</textarea>
                                            <script>document.querySelector('#notes > div > textarea').parentNode.dataset.replicatedValue = document.querySelector('#notes > div > textarea').value;</script>
                                        </div>
                                    </form>
                                </div>
                        @else
                            <div class="content">
                                <p>{{ $order->notes }}</p>
                            </div>
                        @endif
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
