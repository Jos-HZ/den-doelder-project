@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Order {{ $order_number }}</h1>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th><abbr title="time">time</abbr></th>
                <th><abbr title="name-pallet">name pallet/ order</abbr></th>
                <th><abbr title="def-nr">def nr</abbr></th>
                <th><abbr title="extra-info">extra info</abbr></th>
                <th><abbr title="action">action</abbr></th>
                <th><abbr title="deviation">deviation</abbr></th>
                <th><abbr title="edit-button"></abbr></th>
            </tr>
            </thead>
            <tbody>
            @foreach($qualities as $quality)
                <tr>
                    @foreach($quality->getFillable() as $qualityFillableAttribute)
                        <td>{{ $quality[$qualityFillableAttribute] }}</td>
                    @endforeach
                    <td>
                        <a href="{{route('qualityControl.edit', $quality)}}">
                            <button class="btn btn-default" type="button">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </section>

@endsection
