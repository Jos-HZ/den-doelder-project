@extends('layout.master')

@section('content')
    <section class="section">
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="order_id">Order</abbr></th>
                <th><abbr title="production_line">Cape</abbr></th>
                <th><abbr title="time">Time</abbr></th>
                <th><abbr title="date">Date</abbr></th>
                <th><abbr title="description">Description</abbr></th>
                <th><abbr title="edit-button"></abbr></th>
                <th><abbr title="delete-buttons"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($errors as $error)
                    <tr>
                        <th>{{ $error->order_id }}</th>
                        {{-- TODO: connect error->production_line --}}
                        <th>1/2/5</th>
                        <td>{{ $error->time }}</td>
                        <td>{{ $error->date }}</td>
                        <td>{{ $error->description }}</td>
                        <td>
                            <a href="{{route('error.edit', $error)}}">
                                <button class="btn btn-default" type="button">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('error.destroy', $error)}}">
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
