@extends('orders.order')
@yield('title')
@section('notes')
    <div class="tile is-parent is-8">
        <article class="tile is-child box has-background-success">
            <div class="notesTitle">
                <p class="title">Notes</p>
                <div class="notesButton">
                    <a href="javascript:document.getElementById('notes').submit()"><img src="/img/save.svg"></a>
                    {{-- <input type="submit" form="notes" value="floppy disk svg"/> --}}
                </div>
            </div>
            <div class="content">
                <form id="notes" method="post" action="edit">
                    @csrf
                    @method ('put')
                    {{-- <textarea type="text" id="notes" name="notes" oninput="this.style.height = this.scrollHeight + 'px'">{{ $order->notes }}</textarea> --}}
                    {{-- <textarea type="text" id="notes" name="notes">{{ $order->notes }}</textarea> --}}
                    <div class="grow-wrap">
                        <textarea name="notes" oninput="this.parentNode.dataset.replicatedValue = this.value" class="is-focused has-background-success">{{ $order->notes }}</textarea>
                        <script>document.querySelector('#notes > div > textarea').parentNode.dataset.replicatedValue = document.querySelector('#notes > div > textarea').value;</script>
                        {{-- <textarea name="notes" oninput="this.parentNode.dataset.replicatedValue = this.value">{{ $order->notes }}</textarea>
                        <script>
                            const textarea = document.querySelector('#notes > div > textarea');
                            textarea.parentNode.dataset.replicatedValue = textarea.value;
                            textarea.className = 'is-focused has-background-success';
                            textarea.parentNode.dataset.className = 'textarea is-focused has-background-success';
                        </script> --}}
                    </div>
                </form>
            </div>
            {{-- <form action="{{ Request::url() }}/edit?field=notes">
                <input type="text" id="notes" name="notes" value="{{ $order->notes }}">
            </form> --}}
        </article>
    </div>
@endsection
