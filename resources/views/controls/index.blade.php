@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Control")}}</h1>
            <h2 class="subtitle has-text-centered">{{__("Order") }}: {{ $order->ordernumber }}
                - {{ $order->pallettype }} </h2>

            @foreach($categories as $category)
                <div class="pt-4">
                    <h1 class='title is-5'>{{ $category->category }}</h1>

                </div>
                <table class="table is-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th><abbr title="correct">{{__("Correct (Y/N)")}}</abbr></th>
                        <th><abbr title="changed_to">{{__("Changed to")}}</abbr></th>
                        <th><abbr title="treated">ht / hk</abbr></th>
                        <th><abbr title="humidity">{{__("Humidity")}}</abbr></th>

                        <th></th>

                        <th><abbr title="correct">{{__("Correct (Y/N)")}}</abbr></th>
                        <th><abbr title="changed_to">{{__("Changed to")}}</abbr></th>
                        <th><abbr title="comment">{{__("Comment")}}</abbr></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- pre control rows --}}
                    @for($i=0; $i < count($rows); $i++ )
                        {{-- hidden fields --}}
                        @if($category->id === $rows[$i]->column->category_id )
                            <tr>
                                <th>
                                    {{ $rows[$i]->column->column }}
                                </th>

                                <td>@if($rows[$i]->correct) Correct @else Incorrect @endif</td>
                                <td>{{ $rows[$i]->changed_to }}</td>
                                <td>{{ $rows[$i]->treated }}</td>
                                <td>{{ $rows[$i]->humidity }}</td>

                                        <td></td>


                                <td>{{ $controlRows[$i]->correct }}</td>
                                <td>{{ $controlRows[$i]->changed_to }}</td>
                                <td>{{ $controlRows[$i]->comment }}</td>
                                @endif
                            </tr>

                            @endfor
                    </tbody>
                </table>
            @endforeach

        </div>
    </section>
@endsection