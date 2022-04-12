@extends('layout.master')

@section('content')
    <section class="section">
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="order_id">Order</abbr></th>
                <th><abbr title="time">Time</abbr></th>
                <th><abbr title="date">Date</abbr></th>
                <th><abbr title="description">Description</abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($errors as $error)
                <a href="{{ route('error.show', $error) }}">
                    <tr>
                        <th>{{ $error->order_id }}</th>
                        <td>{{ $error->time }}</td>
                        <td>{{ $error->date }}</td>
                        <td>{{ $error->description }}</td>
                    </tr>
                </a>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
