@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>{{__("Order")}} {{ app('request')->input('ordernumber') }}
            </h1>

            <form method="POST" action="{{ route('backlog.store') }}">
                @csrf

                <label for="order_id"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('time'),
                            ])
                            type="hidden"
                            id="order_id"
                            name="order_id"
                            value="{{
                            DB::table('orders')
                                ->where('ordernumber', app('request')
                                ->input('ordernumber'))
                                ->pluck('id')
                                ->first()
                            }}"
                        >
                    </div>
                </div>

                <label for="time">{{__("Time")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('time'),
                            ])
                            type="time"
                            id="time"
                            name="time"
                            value={{ date(' H:i') }}>
                    </div>
                    @error('time')
                    <p class="help is-danger">{{ $errors->get('time')[0] }}</p>
                    {{-- <p class="help is-danger">{{ $errors->getMessages()['time'][0] }}</p> --}}
                    @enderror
                </div>

                <label for="date">{{__("Date")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('date'),
                            ])
                            type="date"
                            id="date"
                            name="date"
                            value={{date(' Y-m-d')}}
                        >
                        {{-- required --}}
                    </div>
                    @error('date')
                    <p class="help is-danger">{{ $errors->get('date')[0] }}</p>
                    @enderror
                </div>

                <label class="i forgor" for="category"> {{__("Error category")}}:</label><br>
                <div class="label">

                    <div class="select">
                        <select
                            class="input @error('category') is-danger @enderror"
                            type="category"
                            id="category"
                            name="category"
                        >
                            <option value="mechanical">{{__("Mechanical error")}}</option>
                            <option value="technical">{{__("Technical error")}}r</option>
                        </select>
                    </div>
                    @error('category')
                    <p class="help is-danger">{{ $errors->get('category')[0] }}</p>
                    @enderror
                </div>

                <label for="description">{{__("Description")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <div class="grow-wrap">
                            <textarea
                                id="description"
                                name="description"
                                oninput="textareaOnInput(this)">{{
                                    $errors->any() ? old('description') : ''
                            }}</textarea>
                        </div>
                    </div>
                    @error('description')
                    <p class="help is-danger">{{ $backlogs->get('description')[0] }}</p>
                    @enderror
                </div>
                <input type="submit" value="{{__("Submit")}}" class="button is-link">

                <a href="{{ route('backlog.index') }}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection
