@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        <br>

        <form method="get" action="{{ route('backlog.index') }}">

            <div>
                <select id="txtSearch" name="category">
                    <option
                        value="">
                       {{__("All")}}
                    </option>
                    <option
                        value="mechanical" <?php if (app('request')->input('category') === 'mechanical') echo "selected";?>>
                       {{__("Mechanical")}}
                    </option>
                    <option
                        value="technical" <?php if (app('request')->input('category') === 'technical') echo "selected";?>>
                  {{__("Technical")}}
                    </option>
                </select>
                <select id="txtSearch" name="cape">
                    <option
                        value="">
                       {{__("All")}}
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

            <input type="submit" value="{{__("Filter")}}" class="btn btn-default"/>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th><abbr title="order_id">{{__("Order")}}</abbr></th>
                <th><abbr title="production_line">Cape</abbr></th>
                <th><abbr title="time">{{__("Time")}}</abbr></th>
                <th><abbr title="date">{{__("Date")}}</abbr></th>
                <th><abbr title="category">{{__("Category")}}</abbr></th>
                <th><abbr title="description">{{__("Description")}}</abbr></th>
                <th><abbr title="edit-button"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($backlogs as $backlog)
                <tr>
                    <th>{{ $backlog->order->ordernumber}}</th>
                    {{-- TODO: nette oplossing --}}
                    <th> @if($backlog->order->production_line_id === 3) 5
                        @else {{ $backlog->order->production_line_id }}
                        @endif</th>
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
                            <button class="btn btn-default" type="button">{{__("Edit")}}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
{{--    <div id="google_translate_element2"></div>--}}
@endsection
{{--<script src="{{asset("js/google_translate.js")}}"></script>--}}
