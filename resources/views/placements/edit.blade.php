@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1>{{__("Order")}} {{ $placement->order->ordernumber }}</h1>
            <p><b>{{__("Chosen location:")}} </b> {{$placement->placement}}</p>

            <form method="POST" action="{{ route('placements.update', $placement) }}">
                @csrf
                @method('PUT')

                <label for="placement"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input @error('order_id') is-danger @enderror"
                               type="hidden"
                               name="placement"
                               id="placement"
                               value="{{ $placement->placement}}">
                    </div>
                </div>

                <label for="order_id"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('order_id') is-danger @enderror"
                            type="hidden"
                            id="order_id"
                            name="order_id"
                            value="{{ $placement->order->id }}"
                        >
                    </div>
                </div>

                <label for="addition">{{__("Addition")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input type="text"
                               id="addition"
                               name="addition"
                               class="input @error('addition') is-danger @enderror"
                               value="{{ $placement->addition }}"
                        >
                    </div>
                    @error('addition')
                    <p class="help is-danger">{{ $errors->get('addition')[0] }}</p>
                    @enderror
                </div>

                <label for="description">{{__("Description")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            id="description"
                            name="description"
                            class="textarea @error('description') is-danger @enderror"
                            oninput="textareaOnInput(this)">
                            {{ $placement->description }}
                        </textarea>
                    </div>
                </div>
                @error('description')
                <p class="help is-danger">{{ $errors->get('description')[0] }}</p>
                @enderror

                <label for="quantity">{{__("Quantity")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="input @error('quantity') is-danger @enderror"
                            value="{{ $placement->quantity }}"
                        >
                    </div>
                    @error('quantity')
                    <p class="help is-danger">{{ $errors->get('quantity')[0] }}</p>
                    @enderror
                </div>

                <input type="submit" value="{{__("Submit")}}" class="button is-link">
                <a href="{{route('placements.index')}}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection
