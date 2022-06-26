@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>{{__("Order" )}} {{ $backlog->order_id }} </h1>
            <form method="POST" action="{{route('backlog.update', $backlog)}}">
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
                            value="{{ $backlog->order_id }}"
                        >
                    </div>
                </div>

                <label for="time">{{__("Time")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('time') is-danger @enderror"
                            type="time"
                            id="time"
                            name="time"
                            value="{{$errors->any() ? old('time') : $backlog->time}}">
                    </div>
                    @error('time')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>


                <label for="date">{{__("Date")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('date') is-danger @enderror"
                            type="date"
                            id="date"
                            name="date"
                            value="{{$errors->any() ? old('date') : $backlog->date}}">
                    </div>
                    @error('date')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>


                <label for="category">{{__("Error category")}}:</label>
                <div class="label">
                    <div class="select">
                        <select
                            class="input @error('category') is-danger @enderror"
                            type="category"
                            id="category"
                            name="category"
                            value="{{$errors->any() ? old('category') : $backlog->category}}"
                        >
                            <option value="mechanical">{{__("Mechanical error")}}</option>
                            <option value="technical">{{__("Technical error")}}</option>
                        </select>
                    </div>

                    @error('category')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="description">{{__("Description")}}:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('description') is-danger @enderror"
                            id="description"
                            name="description"
                            value="{{$errors->any() ? old('description') : $backlog->description}}">
                        {{$errors->any() ? old('description') : $backlog->description}}</textarea>
                    </div>

                    @error('description')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <input type="submit" value="{{__("Submit")}}" class="button is-link">
                <a href="{{route('backlog.index')}}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection
