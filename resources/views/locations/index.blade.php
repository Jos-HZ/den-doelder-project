@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Placement")}}</h1>

            @foreach($locations as $location)
                @if(($location->id - 1) % 3 === 0)
                    <div class="tile is-ancestor">
                        @endif
                        <div class="tile is-parent">
                            <div class="tile is-child box">

                                <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber'), 'location'=> $location->name ])}}">
                                    <img src="{{ $location->img_name }}" alt="{{ $location->name }}">
                                    <p class="title text-center pt-3">{{ $location->name }}</p>
                                </a>
                            </div>
                        </div>
                        @if(($location->id -1)% 3 === 2)
                    </div>
                @endif
            @endforeach
        </div>

    </section>
@endsection

