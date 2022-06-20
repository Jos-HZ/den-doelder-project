@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Placement")}}</h1>

            @foreach($locations as $location)
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <a href="{{ route('placements.create' ,['ordernumber' => app('request')->input('ordernumber')])}}">
                            <img src="/img/placement/locations/loods-C.jpg" alt="loods-C">
                            <p class="title text-center pt-3">{{ $location }}</p>
                        </a>
                    </div>
                </div>
            @endforeach

{{--            <div class="tile is-ancestor">--}}
{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create' ,['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/warehouse-c.jpg" alt="loods-C">--}}
{{--                            <p class="title text-center pt-3">{{__("Warehouse C")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/droog-kamer.jpg" alt="droog-kamers">--}}
{{--                            <p class="title text-center pt-3">{{__("Dry Rooms")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/location-q.jpg" alt="location-Q">--}}
{{--                            <p class="title text-center pt-3">{{__("Location Q")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="tile is-ancestor">--}}
{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/buiten-terrein.JPG" alt="buiten-terrein">--}}
{{--                            <p class="title text-center pt-3">{{__("Outside Terrain")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}

{{--                            <img src="/img/placement/locations/Loods-2+3.JPG" alt="loods-2+3">--}}
{{--                            <p class="title text-center pt-3">{{__("Warehouse 2 + 3")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tile is-parent">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}

{{--                            <img src="/img/placement/locations/C-pallets.JPG" alt="c-pallets">--}}
{{--                            <p class="title text-center pt-3">{{__("C Pallets")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="tile is-ancestor">--}}
{{--                <div class="tile is-parent is-4">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/loods-D.JPG" alt="loods-d">--}}
{{--                            <p class="title text-center pt-3">{{__("Warehouse D")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tile is-parent is-4">--}}
{{--                    <div class="tile is-child box">--}}
{{--                        <a href="{{ route('placements.create',['ordernumber' => app('request')->input('ordernumber')])}}">--}}
{{--                            <img src="/img/placement/locations/location-A.JPG" alt="location-a">--}}
{{--                            <p class="title text-center pt-3">{{__("Location A")}}</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
    </section>
@endsection

