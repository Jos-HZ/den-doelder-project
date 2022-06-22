@extends('layouts.master')

@section('head')
    <script type="text/javascript" src="{{ URL::asset('js/submit-forms.js') }}"></script>
@endsection

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Control")}}</h1>
            <h2 class="subtitle has-text-centered">{{__("Order") }}: {{ $control->order->ordernumber }}
                - {{ $control->order->pallettype }} </h2>

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
                        {{-- !! ROWS !! --}}
                        @foreach($columns as $column)
                            {{-- hidden fields --}}
                            @if($category->id === $column->category_id )
                                <tr>
                                    <th>
                                        {{ $column->column }}
                                    </th>

                                    {{-- input fields --}}
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    {{-- laat de lege staan aub --}}
                                    <td></td>
                                    {{-- input fields --}}
                                    <td>

                                    </td>

                                    <td>

                                    </td>

                                    <td>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
                <input type="submit" value="{{__("submit")}}"
                       class="button is-link"/>
            </form>

        </div>
    </section>
@endsection
