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
                    <th><abbr title="pallet_name">{{__('Name pallet')}}</abbr></th>
                    <th><abbr title="description">{{__('Description')}}</abbr></th>
                    <th><abbr title="location">{{__("Location")}}</abbr></th>
                    <th><abbr title="quantity">{{__('Quantity')}}</abbr></th>
                    <th><abbr title="edit"></abbr></th>
                </tr>
                </thead>
                <tbody>
                @foreach($placements as $placement)
                    <tr>
                        <td>{{ $placement->order->ordernumber }}</td>
                        <td>{{ $placement->order->pallettype}}</td>
                        <td>{{ $placement->description}}</td>
                        <td>{{ $placement->placement }}</td>
                        <td>{{ $placement->quantity }}</td>
                        <td>
                            <a href="{{ route('placements.edit', $placement->id) }}">
                                <button class="btn btn-default" type="button">{{__("Edit")}}</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

