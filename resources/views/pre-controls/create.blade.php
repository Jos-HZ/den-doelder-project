@extends('layouts.master')
@section('head')
    <script type="text/javascript" src="{{ URL::asset('js/submit-forms.js') }}"></script>
@endsection
@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        <div class="container">
            <h1 class="title has-text-centered">{{__("Pre control")}}</h1>

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
                            {{-- TODO: correct ordernumber --}}
                            value="1"
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
                    <p class="help is-danger">{{ $errors->get('date')[0] }}</p>
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
                            value=>
                    </div>
                    @error('time')
                    <p class="help is-danger">{{ $errors->get('submitted_by') }}</p>
                    @enderror
                </div>
            </form>

                <input type="submit" value="{{__("submit")}}" onclick="submitFormsPreQualityControl()" class="button is-link"/>


        </div>
    </section>
@endsection
