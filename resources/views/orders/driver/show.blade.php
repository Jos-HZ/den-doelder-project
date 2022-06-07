@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">{{__("Order")}} {{ $order->ordernumber }}</p>
                        <p>{{__("Production line")}}: Cape {{ $order->production_id }} </p>
                    </div>
                </div>

                {{--   TODO: change url query to something useful     --}}


                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">{{__("Note")}}</p>
                        <div class="notesTitle">
                            @if (Request::query('a') === 'edit')
                                <div class="notesButton">
                                    <a href="javascript:document.getElementById('notes').submit()"><img
                                            src="/img/svg/save.svg"></a>
                                </div>
                            @else
                                <div class="notesButton">
                                    {{--                                    <a href="/order/{{ $order->id }}/edit?field=notes">--}}
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
            </div>

            <div class="tile is-ancestor">

                <div class="tile is-parent is-8">
                    <div class="tile is-child box">
                        <p class="title">{{__("Material checklist")}}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                            pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat
                            facilisis.</p>
                    </div>
                </div>

                {{--       TODO: fix tile / button size         --}}
                <div class="tile is-parent">
                    <div class="tile is-child box {{ $order->driver_done ? 'has-background-success' : ''}}">
                        <form method="POST" action="{{ route('orders.driverDone', $order )}}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-pink" onclick="return confirm('Are you really done?')">
                                <i
                                    class="fas fa-check"></i>
                                <p class="title">{{__("Done")}}</p>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
