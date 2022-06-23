@extends('layouts.master')

@section('head')
    <script type="text/javascript" src="{{ URL::asset('js/submit-forms.js') }}"></script>
@endsection

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Control")}}</h1>
            <h2 class="subtitle has-text-centered">{{__("Order") }}: {{ $order->ordernumber }}
                - {{ $order->pallettype }} </h2>


            <form id="control" method="POST" action="{{ route('controls.store') }}">
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

                <label for="pre_control_id"></label>
                <div class="control has-icons-left has-icons-right">
                    <input
                        @class ([
                            'input',
                            'is-danger' => $errors->get('pre_control_id'),
                        ])
                        type="hidden"
                        id="pre_control_id"
                        name="pre_control_id"
                        value="{{ $preControl->id }}"
                    >
                </div>

                <label for="treated">HT / Non HT / HtKd:</label>
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

                @foreach($categories as $category)
                <div class="pt-4">
                    <h1 class='title is-5'>{{ $category->category_name() }}</h1>

                </div>
                <table class="table is-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th><abbr title="correct">{{__("Correct (Y/N)")}}</abbr></th>
                        <th><abbr title="changed_to">{{__("Changed to")}}</abbr></th>
                        <th><abbr title="treated">ht / hk</abbr></th>
                        <th><abbr title="humidity">{{__("Humidity")}}</abbr></th>

                        <th style="border:none"></th>

                        <th><abbr title="correct">{{__("Correct (Y/N)")}}</abbr></th>
                        <th><abbr title="changed_to">{{__("Changed to")}}</abbr></th>
                        <th><abbr title="comment">{{__("Comment")}}</abbr></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- !! ROWS !! --}}
                    @for($i=0; $i < count($rows); $i++)
                        {{-- hidden fields --}}
                        @if($category->id === $rows[$i]->column->category_id  )
                        <tr>
                            <th>
                                {{ $rows[$i]->column->column_name() }}
                            </th>

                            <div class="control has-icons-left has-icons-right">
                                <input
                                    @class ([
                                        'input',
                                        'is-danger' => $errors->get('column_id'),
                                    ])
                                    type="hidden"
                                    id="column_id"
                                    name="column_id_{{$i}}"
                                    value=" {{ $i + 1}}"
                                >
                            </div>

                            {{-- input fields --}}
                            <td>@if($rows[$i]->correct) Correct @else Incorrect @endif</td>
                            <td>{{ $rows[$i]->changed_to }}</td>
                            <td>{{ $rows[$i]->treated }}</td>
                            <td>{{ $rows[$i]->humidity }}</td>
                            {{-- laat de lege staan aub --}}
                            <td style="border:none"></td>
                            {{-- input fields --}}
                            <td>
                                <div class="label">
                                    <div class="select">
                                        <select
                                            class="input @error('correct') is-danger @enderror"
                                            id="correct"
                                            name="correct_{{$i}}"
                                        >
                                            <option value="1">{{__("Yes")}}</option>
                                            <option value="0">{{__("No")}}</option>
                                        </select>
                                    </div>
                                    @error('correct')
                                    <p class="help is-danger">{{ $errors->get('correct') }}</p>
                                    @enderror
                                </div>
                            </td>

                            <td>
                                <div class="label">
                                    <div class="control has-icons-left has-icons-right">
                                        <input
                                            @class ([
                                                'input',
                                                'is-danger' => $errors->get('changed_to'),
                                            ])
                                            type="text"
                                            id="changed_to"
                                            name="changed_to_{{$i}}"
                                            value="Test"
                                        >
                                    </div>
                                    @error('changed_to')
                                    <p class="help is-danger">{{ $errors->get('changed_to') }}</p>
                                    @enderror
                                </div>
                            </td>

                            <td>
                                <div class="label">
                                    <div class="control has-icons-left has-icons-right">
                                        <input
                                            @class ([
                                                'input',
                                                'is-danger' => $errors->get('comment'),
                                            ])
                                            type="text"
                                            id="comment"
                                            name="comment_{{$i}}"
                                            value="Test"
                                        >
                                    </div>
                                    @error('comment')
                                    <p class="help is-danger">{{ $errors->get('comment') }}</p>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endfor
                    </tbody>
                </table>
                @endforeach
                <input type="submit" value="{{__("submit")}}"
                       class="button is-link"/>
            </form>

        </div>
    </section>
@endsection
