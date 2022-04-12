@extends('orders.order')
@yield('title')
@section('notes')
    <div class="tile is-parent is-8">
        <article class="tile is-child box has-background-success">
            <p class="title">Notes</p>
            <input type="submit" form="notes" value="floppy disk svg"/>
            <div class="content">
                <form id="notes" method="post" action="edit">
                    @csrf
                    @method ('put')
                    <textarea type="text" id="notes" name="notes">{{ $order->notes }}</textarea>
                </form>
            </div>
            {{-- <form action="{{ Request::url() }}/edit?field=notes">
                <input type="text" id="notes" name="notes" value="{{ $order->notes }}">
            </form> --}}
        </article>
    </div>
@endsection
