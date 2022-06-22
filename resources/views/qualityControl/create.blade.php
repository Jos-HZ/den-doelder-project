@extends('layouts.master')
@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        <div class="container">

            <h1 class="has-text-centered"> {{__("Order")}} {{ $order->ordernumber }}</h1>
            <form method="POST" action="{{ route('qualityControl.store') }}">
                @csrf

                <label for="order_id"></label>
                <div class="label">

                    <div class="control">

                        <input type="hidden"
                               name="order_id"
                               id="order_id"
                               class="input @error('order_id') is-danger @enderror"
                               value= {{$order->id}}>

                    </div>
                </div>

                <label for="production_line_id"></label>
                <div class="label">
                    <div class="control">

                        <input type="hidden"
                               name="production_line_id"
                               id="production_line_id"
                               class="input @error('production_line_id') is-danger @enderror"
                               value={{ $order->production_line_id }}>

                    </div>
                </div>

                <label for="time">{{__("Time")}}:</label>
                <div class="label">
                    <div class="control">
                        <input type="time"
                               class="input @error('time') is-danger @enderror"
                               id="time"
                               name="time"
                               value={{date(' H:i')}}>
                    </div>
                    @error('time')
                    <p class="help is-danger"> This is a required field</p>
                    @enderror
                </div>


                <div class="control">
                    <input class="input @error('name_pallet') is-danger @enderror"
                           type="hidden"
                           id="name_pallet"
                           name="name_pallet"
                           value="{{ $order->pallettype }}">
                </div>

                <label for="def_nr">Def nr</label>
                <div class="label">
                    <div class="select">
                        <select name="def_nr"
                                id="def_nr"
                                class="input @error('def_nr') is-danger @enderror">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>


                <label for="action">Action:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('action') is-danger @enderror"
                            id="action"
                            name="action"
                            value="{{$errors->any() ? old('action') : ''}}"
                        >{{ $errors->any() ? old('action') : ''}}</textarea>
                    </div>

                    @error('action')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="deviation">{{__("Deviation")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('deviation') is-danger @enderror"
                            id="deviation"
                            name="deviation"
                            value="{{$errors->any() ? old('deviation') : ''}}"
                        >{{$errors->any() ? old('deviation') : ''}}</textarea>
                    </div>

                    @error('deviation')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="extra_info">Extra info:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('extra_info') is-danger @enderror"
                            id="extra_info"
                            name="extra_info"
                            oninput="textareaOnInput(this)"
                        >{{$errors->any() ? old('extra_info') : ''}}</textarea>
                    </div>

                    @error('extra_info')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <input type="submit" value="{{__("Submit")}}" class="button is-link">

                <a href="{{route('qualityControl.index', $order->id)}}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection
