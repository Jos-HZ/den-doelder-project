@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
        <div class="container">
            <h1> {{__("Order")}} {{ $order->pallettype }}</h1>
            <form method="POST" action="{{ route('checklist.store') }}">
                @csrf
                <label for="palletname"></label>
                <div class="label">

                    <div class="control">

                        <input type="text"
                               name="palletname"
                               id="palletname"
                               class="input @error('palletname') is-danger @enderror"
                               value="{{$order->pallettype}}">


                    </div>
                </div>
                <label for="ordernumber"></label>
                <div class="label">

                    <div class="control">

                        <input type="number"
                               name="ordernumber"
                               id="ordernumber"
                               class="input @error('ordernumber') is-danger @enderror"
                               value= {{$order->ordernumber}}>


                    </div>
                </div>

                <label for="HT/nonHT">HT/nonHT</label>
                <div class="label">
                    <div class="select">
                        <select name="HT/nonHT"
                                id="HT/nonHT"
                                class="input @error('HT/nonHT') is-danger @enderror">
                            <option value="HT">HT</option>
                            <option value="non HT">non HT</option>
                            <option value="HtKd">HtKd</option>
                        </select>
                    </div>
                </div>

                <label for="date">{{__("Date")}}:</label>
                <div class="label">
                    <div class="control">
                        <input type="date"
                               class="input @error('date') is-danger @enderror"
                               id="date"
                               name="date"
                               value={{date(' Y-m-d')}}>
                    </div>
                    @error('date')
                    <p class="help is-danger"> This is a required field</p>
                    @enderror
                </div>

                <label for="controllername">{{__("Controller")}} {{__("Name")}}</label>
                <div class="label">
                    <div class="control">
                        <input class="input @error('controllername') is-danger @enderror"
                               type="text"
                               id="controllername"
                               name="controllername"
                               value="{{ $errors->any() ? old('controllername') : '' }}">
                    </div>
                </div>

              

                <input type="submit" value="{{__("Submit")}}" class="button is-link">

                <a href="{{route('qualityControl.index', $order->id)}}">
                    <button type="button" class="button is-link-light">{{__("Cancel")}}</button>
                </a>

            </form>
        </div>
    </section>
@endsection

