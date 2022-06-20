@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Order")}} {{ $order->ordernumber }} {{$order->pallettype}}</h1>
            <p class="has-text-centered">{{__("Number of pallets")}} {{ $order->palletnumber }}</p>

            <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">{{__("Checklist")}}</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title text-lg-center">{{__("Order details")}}</p>
                        </article>
                    </div>
                    <div class="tile is-parent is-4">
                        <div class="tile is-child box">
                            <a href="{{ route('qualityControl.index', $order) }}">
                                <article>
                                    <p class="title text-lg-center">{{__("Quality control")}}</p>
                                </article>
                            </a>
                        </div>
                    </div>
            </div>
                {{--   TODO: change url query to something useful     --}}

                <div class="tile is-ancestor">
                    <div class="tile is-parent is-8">
                        <div class="tile is-child box">
                            <div class="notesTitle">
                            <p class="title">{{__("Notes")}}</p>
                                @if (Request::query('a') === 'edit')
                                    <div class="notesButton">
                                        <a href="javascript:document.getElementById('notes').submit()"><img
                                                src="/img/svg/save.svg"></a>
                                    </div>
                                @else
                                    <div class="notesButton">
                                        <a href=" {{ request()->fullUrlWithQuery(['a' => 'edit']) }}">
                                            <img src="/img/svg/{{ (isset($order->notes) ? 'edit' : 'create') }}.svg"></a>
                                    </div>
                                @endif
                            </div>
                            @if (Request::query('a') === 'edit')
                                <div class="content">
                                    <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grow-wrap">
                                            <textarea name="notes"
                                                      oninput="this.parentNode.dataset.replicatedValue = this.value"
                                                      class="is-focused has-background-grey-lighter">{{ $order->notes }}</textarea>
                                            <script>document.querySelector('#notes > div > textarea').parentNode.dataset.replicatedValue = document.querySelector('#notes > div > textarea').value;</script>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="content" id="notes">
                                    <p>{{ $order->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="tile is-parent is-vertical">
                        <div class="tile is-child box">
                            <a href="{{ route('qualityControl.create', ['ordernumber' => $order->ordernumber ])}}">
                                <p class="title text-lg-center">{{__("Create quality control")}}</p>
                            </a>
                        </div>

                        <div class="tile is-child box">
                            <a href="">
                                <p class="title text-lg-center">{{__("Location Log")}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="title is-child box">
                        <a href="{{ route('locations.index', ['ordernumber' => $order->ordernumber ]) }}">
                            <p class="title text-lg-center">{{__("Location")}}</p>
                            <img src="/img/placement/placing-den-doelder.jpg" alt="placement">
                        </a>
                    </div>
                </div>
            </div>
            </div>
    </section>
@endsection
