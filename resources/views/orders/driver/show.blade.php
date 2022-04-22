@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Order {{ $order->ordernumber }}</p>
                        <p>Productie lijn: Cape {{ $order->production_id }} </p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Note</p>
                        <div class="notesTitle">
                            @if (Request::query('field') === 'notes')
                                <div class="notesButton">
                                    <a href="javascript:document.getElementById('notes').submit()"><img
                                            src="/img/svg/save.svg"></a>
                                </div>
                            @else
                                <div class="notesButton">
                                    <a href="{{ Request::url() }}/edit?field=notes"><img
                                            src="/img/svg/{{ (isset($order->notes) ? 'edit' : 'create') }}.svg"></a>
                                </div>
                            @endif
                        </div>
                        @if (Request::query('field') === 'notes')
                                <div class="content">
                                    <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grow-wrap">
                                            <textarea name="notes"
                                                      oninput="this.parentNode.dataset.replicatedValue = this.value"
                                                      class="is-focused has-background-success">{{ $order->notes }}</textarea>
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

                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Material checklist</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                            pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat
                            facilisis.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
