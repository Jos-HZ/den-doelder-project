@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">

            <h1> Order {{ app('request')->input('ordernumber') }}</h1>
            <form method="POST" action="{{ route('qualityControl.store') }}">
                @csrf

                <label for="order_id"></label>
                <div class="label">
                    <div class="control">

                        <input type="text"
                               name="order_id"
                               id="order_id"
                               class="input @error('order_id') is-danger @enderror"
                                {{-- TODO: fix value  --}}
                               value="">

                    </div>
                </div>


                <label for="time">Time:</label>
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

                <label for="name_pallet">Name Pallet/ Order</label>
                <div class="label">
                    <div class="control">
                        <input class="input @error('name_pallet') is-danger @enderror"
                               type="text"
                               id="name_pallet"
                               name="name_pallet"
                               value="{{ $errors->any() ? old('name_pallet') : '' }}">
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

                <label for="action">Action:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('action') is-danger @enderror"
                            id="action"
                            name="action"
                            value="{{$errors->any() ? old('action') : ''}}"
                        >{{ $errors->any() ? old('action') : ''}}</textarea>
                    </div>
                    <br>
                    @error('action')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="deviation">Deviation:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('deviation') is-danger @enderror"
                            id="deviation"
                            name="deviation"
                            value="{{$errors->any() ? old('deviation') : ''}}"
                        >{{$errors->any() ? old('deviation') : ''}}</textarea>
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
                        >{{$errors->any() ? old('extra_info') : ''}}</textarea>
                    </div>
                    <br>
                    @error('extra_info')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{route('qualityControl.index')}}">
                    <button type="button" class="button is-link-light">Cancel</button>
                </a>

            </form>
        </div>
    </section>
@endsection
