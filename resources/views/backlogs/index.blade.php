@extends('layouts.master')

@section('content')
    <section class="section">

        <form method="get" action="{{ route('backlog.index') }}">
            <div class="select">
                <select id="txtSearch" name="category">
                    <option
                        value="">
                        All
                    </option>
                    <option
                        value="mechanical" <?php if (app('request')->input('category') === 'mechanical') echo "selected";?>>
                        Mechanical
                    </option>
                    <option
                        value="technical" <?php if (app('request')->input('category') === 'technical') echo "selected";?>>
                        Technical
                    </option>
                </select>

                <select id="txtSearch" name="cape">
                    <option
                        value="">
                        All
                    </option>
                    <option
                        value="1" <?php if (app('request')->input('cape') === '1') echo "selected";?>>
                        1
                    </option>
                    <option
                        value="2" <?php if (app('request')->input('cape') === '2') echo "selected";?>>
                        2
                    </option>
                    <option
                        value="5" <?php if (app('request')->input('cape') === '5') echo "selected";?>>
                        5
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
                <th><abbr title="delete-buttons"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($backlogs as $backlog)
                <tr>
                    <th>{{ $backlog->order->ordernumber}}</th>
                    <th>{{ $backlog->order->production_line }}</th>
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
                        <a href="{{route('backlog.edit', $backlog)}}">
                            <button class="btn btn-default" type="button">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('backlog.destroy', $backlog)}}">
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
