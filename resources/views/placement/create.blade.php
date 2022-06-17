@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>{{__("Order")}} {{ app('request')->input('ordernumber') }}</h1>

            <form method="POST" action="{{ route('placement.store') }}">
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

                <label for="addition">{{__("Addition")}}</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">

                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
