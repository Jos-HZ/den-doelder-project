@extends('orders.order')
@yield('title')
@section('notes')
    <div class="tile is-parent is-8">
        <article class="tile is-child box has-background-success">
            <p class="title">Notes</p>
            @isset ($order->notes)
                <a href="{{ Request::url() }}/edit?field=notes">pencil svg</a>
                {{-- TODO add here the note dynamic --}}
                <div class="content">
                {{-- TODO add faker notes (dat doe je toch in de seeder???) --}}
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p> --}}
                    <p>{{ $order->notes }}</p>
                </div>
            @endisset
            @empty ($order->notes)
                <a href="{{ Request::url() }}/edit?field=notes">plus svg</a>
            @endempty
        </article>
    </div>
@endsection
