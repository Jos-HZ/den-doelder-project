@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Order {{ $order->ordernumber }}</h1>
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
                    <a href="{{ route("qualityControl.index", ['ordernumber' => $order->ordernumber]) }}">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">Quality control</p>
                        </article>
                    </a>

                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-8">
                    <article class="tile is-child box has-background-success">
                        <div class="notesTitle">
                            <p class="title">Notes</p>
                            <div class="notesButton">
                                @can('is_admin')
                                <a href="{{
                                    (request()->query('field') === 'notes'
                                    ? 'javascript:document.getElementById(\'notes\').submit()'
                                    : request()->fullUrlWithQuery(['field' => 'notes']))
                                    }}">
                                        <img src="/img/svg/{{
                                            (request()->query('field') === 'notes'
                                                ? 'save'
                                                : (isset($order->notes)
                                                    ? 'edit'
                                                    : 'create'))
                                        }}.svg">
                                    </a>
                                @endcan
                            </div>
                        </div>
                            @if (request()->query('field') === 'notes')
                                @can('is_admin')
                                    <div class="content">
                                        <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="grow-wrap">
                                                <textarea
                                                    name="notes"
                                                    oninput="textareaOnInput(this)"
                                                    class="is-focused has-background-success">{{
                                                        $order->notes
                                                }}</textarea>
                                            </div>
                                        </form>
                                    </div>
                                @endcan
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
