<table class="table">
    <thead>
    <th><abbr title="started_conversion_at">{{__("Started conversion at")}}</abbr></th>
    <th><abbr title="started_production_at">{{__("Started production at")}}</abbr></th>
    <th><abbr title="completed_production_at">{{__("Completed at")}}</abbr></th>
    <th><abbr title="conversion_time">{{__("Conversion time")}}</abbr></th>
    <th><abbr title="production_time">{{__("Production time")}}</abbr></th>
    <th><abbr title="error_time">{{__("Error time")}}</abbr></th>
    </thead>
    <tbody>
    <tr>
    <td>{{ $order->conversion_time}}</td>
    <td>{{ $order->start_time }}</td>
    <td>{{ $order->end_time }}</td>
    <td>{{ $order->conversionTime() }}</td>
    <td>{{ $order->productionTime() }}</td>
    <td>{{ $order->errorTime() }}</td>
    </tr>
    </tbody>
</table>
