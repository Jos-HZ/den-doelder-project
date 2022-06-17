@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>{{__("Order")}} {{ app('request')->input('ordernumber') }}</h1>

            <form method="POST" action="{{ route('placements.store') }}">
                @csrf
                <label for="order_id"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('order_id') is-danger @enderror"
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
                        <input type="text"
                               id="addition"
                               name="addition"
                               class="input @error('addition') is-danger @enderror"
                        >
                    </div>
                    @error('addition')
                    <p class="help is-danger">{{ $errors->get('addition')[0] }}</p>
                    @enderror
                </div>

                <label for="description">{{__("Description")}}</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            id="description"
                            name="description"
                            class="textarea @error('description') is-danger @enderror"
                            oninput="textareaOnInput(this)">
                            {{ $errors->any() ? old('description') : '' }}
                        </textarea>
                    </div>
                </div>
                @error('description')
                <p class="help is-danger">{{ $errors->get('description')[0] }}</p>
                @enderror

                <label for="quantity">{{__("Quantity")}}</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="input @error('quantity') is-danger @enderror"
                        >
                </div>
                    @error('quantity')
                    <p class="help is-danger">{{ $errors->get('quantity')[0] }}</p>
                    @enderror
            </form>
        </div>
    </section>

@endsection
