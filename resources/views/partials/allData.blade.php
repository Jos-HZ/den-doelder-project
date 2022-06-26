<form method="get" action="{{ route('orders.data') }}">
    <div>
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
                value="3" <?php if (app('request')->input('cape') === '3') echo "selected";?>>
                5
            </option>
        </select>

        <input type="submit" value="{{__("Filter")}}" class="btn btn-default"/>
    </div>
</form>

<table class="table is-bordered">
    <thead>
    <th><abbr title="ordernumber">{{__("Order number")}}</abbr></th>
    <th><abbr title="Prodction_line">{{__("Production line")}}</abbr></th>
    <th><abbr title="started_conversion_at">{{__("Started conversion at")}}</abbr></th>
    <th><abbr title="started_production_at">{{__("Started production at")}}</abbr></th>
    <th><abbr title="completed_production_at">{{__("Completed at")}}</abbr></th>
    <th><abbr title="conversion_time">{{__("Conversion time")}}</abbr></th>
    <th><abbr title="production_time">{{__("Production time")}}</abbr></th>
    <th><abbr title="error_time">{{__("Error time")}}</abbr></th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->ordernumber}}</td>
            <td>@if($order->production_line_id === 3)
                    5
                @else
                    {{ $order->production_line_id }}
                @endif</td>
            <td>{{ $order->conversion_time}}</td>
            <td>{{ $order->start_time }}</td>
            <td>{{ $order->end_time }}</td>
            <td>{{ $order->conversionTime() }}</td>
            <td>{{ $order->productionTime() }}</td>
            <td>{{ $order->errorTime() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
