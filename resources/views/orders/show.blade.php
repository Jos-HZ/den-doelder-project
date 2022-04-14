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
            <div class="tile is-ancestor">
                <div class="tile is-parent is-8">
                    <article class="tile is-child box has-background-success">
                        <p class="title">Notes</p>
                        {{--                        TODO add here the note dynamic--}}
                        <div class="content">
                            {{--                            TODO: add faker notes --}}
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
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
