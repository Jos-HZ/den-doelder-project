@extends('layouts.master')
@section('head')
    <script type="text/javascript" src="{{ URL::asset('js/submit-forms.js') }}"></script>
@endsection
@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Pre control")}}</h1>
            <h2 class="subtitle has-text-centered">{{__("Order") }}: {{ $order->ordernumber }} - {{ $order->pallettype }} </h2>


            <form id="pre-control" method="POST" action="{{ route('pre-controls.store') }}">
                @csrf
                {{-- Hidden fields --}}
                <label for="order_id"></label>
                <div class="control has-icons-left has-icons-right">
                    <input
                        @class ([
                            'input',
                            'is-danger' => $errors->get('time'),
                        ])
                        type="hidden"
                        id="order_id"
                        name="order_id"
                        value="{{ $order->id }}"
                    >
                </div>


                <label for="treated">{{__('HT / Non HT / HtKd')}}:</label>
                <div class="label">
                    <div class="select">
                        <select
                            class="input @error('category') is-danger @enderror"
                            type="treated"
                            id="treated"
                            name="treated"
                        >
                            <option value="ht">{{__("HT")}}</option>
                            <option value="non_ht">{{__("Non HT")}}</option>
                            <option value="ht_kd">{{__("HtKd")}}</option>
                        </select>
                    </div>
                </div>

                {{-- Input fields --}}
                <label for="date">{{__('Date')}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('date') is-danger @enderror"
                            type="date"
                            id="date"
                            name="date"
                            value="{{ date('Y-m-d') }}"
                        >
                    </div>
                    @error('date')
                    <p class="help is-danger">{{ $errors->get('date') }}</p>
                    @enderror
                </div>

                <label for="submitted_by">{{__("Submitted by")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('submitted_by'),
                            ])
                            type="text"
                            id="submitted_by"
                            name="submitted_by"
                        >
                    </div>
                    @error('submitted_by')
                    <p class="help is-danger">{{ $errors->get('submitted_by') }}</p>
                    @enderror
                </div>

                {{-- !! ROWS !! --}}
                @foreach($columns_id as $id)
                {{-- hidden fields --}}
                {{ $columns[$id-1]->column }}
                <label for="column_id"></label>
                <div class="control has-icons-left has-icons-right">
                    <input
                        @class ([
                            'input',
                            'is-danger' => $errors->get('column_id'),
                        ])
                        type="hidden"
                        id="column_id"
                        name="column_id_{{$id}}"
                        {{-- TODO: correct column_id --}}
                        value=" {{ $id }}"
                    >
                </div>

                {{-- input fields --}}
                <lable for="correct">{{__("Correct")}}:</lable>
                <div class="label">
                    <div class="select">
                        <select
                            class="input @error('correct') is-danger @enderror"
                            id="correct"
                            name="correct_{{$id}}"
                        >
                            <option value="1">{{__("Yes")}}</option>
                            <option value="0">{{__("No")}}</option>
                        </select>
                    </div>
                    @error('correct')
                    <p class="help is-danger">{{ $errors->get('correct') }}</p>
                    @enderror
                </div>

                <label for="changed_to">{{__("Changed to")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('changed_to'),
                            ])
                            type="text"
                            id="changed_to"
                            name="changed_to_{{$id}}"
                            value="NEE"
                        >
                    </div>
                    @error('changed_to')
                    <p class="help is-danger">{{ $errors->get('changed_to') }}</p>
                    @enderror
                </div>

                <lable for="treated">{{__("Treated")}}:</lable>
                <div class="label">
                    <div class="select">
                        <select
                            class="input @error('treated') is-danger @enderror"
                            id="treated"
                            name="treated_{{$id}}"
                        >
                            <option value="hk">{{__("HK")}}</option>
                            <option value="kd">{{__("KD")}}</option>
                        </select>
                    </div>
                    @error('treated')
                    <p class="help is-danger">{{ $errors->get('treated') }}</p>
                    @enderror
                </div>

                <label for="humidity">{{__("Humidity")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('humidity'),
                            ])
                            type="number"
                            id="humidity"
                            name="humidity_{{$id}}"
                            value="8"
                        >
                    </div>
                    @error('humidity')
                    <p class="help is-danger">{{ $errors->get('humidity') }}</p>
                    @enderror
                </div>
                @endforeach

                <input type="submit" value="{{__("submit")}}"
                       class="button is-link"/>
            </form>

        </div>
    </section>
@endsection
