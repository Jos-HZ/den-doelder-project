@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">{{__("Order")}} {{ app('request')->input('ordernumber') }}</h1>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th><abbr title="time">{{__("Time")}}</abbr></th>
                <th><abbr title="name-pallet">{{__("Name pallet")}}/ {{__("Order")}}</abbr></th>
                <th><abbr title="def-nr">def nr</abbr></th>
                <th><abbr title="extra-info">extra info</abbr></th>
                <th><abbr title="action">{{__("Action")}}</abbr></th>
                <th><abbr title="deviation">{{__("Deviation")}}</abbr></th>
                <th><abbr title="edit-button"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($qualities as $quality)
                <tr>
                    @foreach($quality->getFillable() as $qualityFillableAttribute)
                        <td>{{ $quality[$qualityFillableAttribute] }}</td>
                    @endforeach
                    {{-- <th>{{ $quality->time }}</th>
                    <td>{{ $quality->name_pallet }}</td>
                    <td>{{ $quality->def_nr }}</td>
                    <td>{{ $quality->extra_info }}</td>
                    <td>{{ $quality->action }}</td>
                    <td>{{ $quality->deviation }}</td> --}}
                    <td>
                        <a href="{{route('qualityControl.edit', $quality)}}">
                            <button class="btn btn-default" type="button">{{__("Edit")}}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </section>

@endsection
