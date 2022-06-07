@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">


            <h1> Order {{ $qualityControl->order->ordernumber }}</h1>

            <form method="POST" action="{{ route('qualityControl.update', $qualityControl) }}">
                @csrf
                @method('PUT')

                <label for="order_id"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('order_id') is-danger @enderror"
                            type="hidden"
                            id="order_id"
                            name="order_id"
                            value="{{ $qualityControl->order_id }}"
                        >
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

                <label for="name_pallet">{{__("Name Pallet")}}/ {{__("Order")}}</label>
                <div class="label">
                    <div class="control">
                        <input class="input @error('name_pallet') is-danger @enderror"
                               type="text"
                               id="name_pallet"
                               name="name_pallet"
                               value="{{ $qualityControl->name_pallet}}">
                    </div>
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

                <label for="action">{{__("Action")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('action') is-danger @enderror"
                            id="action"
                            name="action"
                            value="{{$errors->any() ? old('action') : $qualityControl->action}}"
                        >{{ $errors->any() ? old('action') : $qualityControl->action}}</textarea>
                    </div>
                    <br>
                    @error('action')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="deviation">{{__("Deviation")}}:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('deviation') is-danger @enderror"
                            id="deviation"
                            name="deviation"
                        >{{$errors->any() ? old('deviation') : $qualityControl->deviation}}</textarea>
                    </div>
                    <br>
                    @error('deviation')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="extra_info">Extra info:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('extra_info') is-danger @enderror"
                            id="extra_info"
                            name="extra_info"
                            oninput="textareaOnInput(this)"
                        >{{$errors->any() ? old('extra_info') : $qualityControl->extra_info}}</textarea>
                    </div>
                    <br>
                    @error('extra_info')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>


                <label for="production_line_id"></label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('production_line_id') is-danger @enderror"
                            type="hidden"
                            id="production_line_id"
                            name="production_line_id"
                            value="{{ $qualityControl->production_line_id }}"
                        >
                    </div>
                </div>

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{route('qualityControl.index')}}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection
