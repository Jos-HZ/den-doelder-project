@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Order{{ app('request')->input('ordernumber') }}</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="order_id">Order</abbr></th>
                <th><abbr title="production_line">Cape</abbr></th>
                <th><abbr title="time">Time</abbr></th>
                <th><abbr title="date">Date</abbr></th>
                <th><abbr title="category">Category</abbr></th>
                <th><abbr title="description">Description</abbr></th>
                <th><abbr title="edit-button"></abbr></th>
                <th><abbr title="delete-buttons"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($backlogs as $backlog)
                <tr>
                    <th>{{ $backlog->order_id }}</th>
                    {{-- TODO: connect error->production_line --}}
                    <th>1/2/5</th>
                    <td>{{ $backlog->time }}</td>
                    <td>{{ $backlog->date }}</td>
                    <td>@if($backlog->category === 'technical')
                            T
                        @else
                            M
                        @endif
                    </td>
                    <td>{{ $backlog->description }}</td>
                    <td>
                        <a href="{{route('backlog.edit', $backlog, ['ordernumber' => $order->ordernumber ])}}">
                            <button class="btn btn-default" type="button">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('$backlog.destroy', $backlog)}}">
                            @csrf
                            @method('DELETE')
                            {{-- TODO: change confirm message --}}
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Weet je zeker dat je deze error wilt verwijderen?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
