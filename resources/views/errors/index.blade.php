@extends('layouts.master')

@section('content')
    <section class="section">
        <form method="get" action="{{ route('error.index') }}">
            <div class="select">
                <select id="txtSearch" name="category">
                    <option
                        value="mechanical" <?php if (app('request')->input('category') === 'mechanical') echo "selected";?>>
                        Mechanical
                    </option>
                    <option
                        value="technical" <?php if (app('request')->input('category') === 'technical') echo "selected";?>>
                        Technical
                    </option>
                </select>
            </div>
            <input type="submit" value="Filter" class="btn btn-default"/>
        </form>
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
                @can('is_production', 'is_driver')
                <th><abbr title="delete-buttons"></abbr></th>
                @endcan()
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
                    <td>@if($error->category === 'technical')
                            T
                        @else
                            M
                        @endif
                    </td>
                    <td>{{ $error->description }}</td>
                    <td>
                        <a href="{{route('error.edit', $error)}}">
                            <button class="btn btn-default" type="button">Edit</button>
                        </a>
                    </td>
                    @can('is_production', 'is_driver')
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
                        @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
