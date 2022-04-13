@extends('orders.order')
@yield('title')
@section('notes')
    <div class="tile is-parent is-8">
        <article class="tile is-child box has-background-success">
            <div class="notesTitle">
                <p class="title">Notes</p>
                    <div class="notesButton">
                        <a href="{{ Request::url() }}/edit?field=notes"><img src="/img/{{ (isset($order->notes) ? 'edit' : 'create') }}.svg"></a>
                        {{-- <a href="{{ Request::url() }}/edit?field=notes"><img src="/img/@isset($order->notes)edit@endisset@empty($order->notes)create@endempty.svg"></a> --}}
                    </div>
            </div>
                    @isset($order->notes)
                        <div class="content">
                            <p>{{ $order->notes }}</p>
                        </div>
                    @endisset
        </article>
        {{-- <article class="tile is-child box has-background-success">
            <div class="notesTitle">
                <p class="title">Notes</p>
                @isset ($order->notes)
                    <div class="notesButton">
                        <a href="{{ Request::url() }}/edit?field=notes"><img src="/img/edit.svg"></a>
                    </div>
            </div>
                    <div class="content">
                        <p>{{ $order->notes }}</p>
                    </div>
                @endisset
                @empty ($order->notes)
                    <div class="notesButton">
                        <a href="{{ Request::url() }}/edit?field=notes"><img src="/img/create.svg"></a>
                    </div>
            </div>
                @endempty
        </article> --}}
    </div>
@endsection
