@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        <div class="container">
            <h1 class="title has-text-centered">{{__("Pallet Locations")}}</h1>

            <table class="table is-bordered">
                <thead>
                <tr>
                    <th><abbr title="order_id">{{__("Order")}}</abbr></th>
                    <th><abbr title="pallet_name">{{__('Pallet name')}}</abbr></th>
                    <th><abbr title="location">{{__("Location")}}</abbr></th>
                    <th><abbr title="quantity">{{__('Quantity')}}</abbr></th>
                </tr>
                </thead>
                <tbody>
                @foreach($placements as $placement)
                    <tr>
                        <td>{{ $placement->order->ordernumber }}</td>
                        <td>{{ $placement->order->pallettype}}</td>
                        <td>{{ $placement->placement }}</td>
                        <td>{{ $placement->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
