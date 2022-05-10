@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1> [insert name]</h1>
            <form action="{{ route('qualityControl.update', $quality) }}">
                @csrf
                @method('put')

                <label for="">Time:</label>
                <div class="label">
                    <div class="control">
                        <input type="time" class="input @error('time') is-danger @enderror"
                               name="time" value="{{ $errors->any() ? old('time') : $errors->time }}"
                        >
                    </div>
                    <br>
                    @error('time')
                    <p class="help is-danger"> This is a required field</p>
                    @enderror
                </div>
                <br>

                <label for="name-pallet">Name Pallet/ Order</label>
                <div class="label">
                    <div class="control">
                        <input class="input @error('') is-danger @enderror" type="text"
                               id="name-pallet" name="name-pallet">
                    </div>
                </div>

                <label for="">Def nr</label>


                <label for="description">Extra Information:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('description') is-danger @enderror"
                            id="description"
                            name="description"
                            value="{{$errors->any() ? old('description') : $error->description}}"
                        >
                        {{$errors->any() ? old('description') : $error->description}}</textarea>
                    </div>
                    <br>
                    @error('description')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <label for="description">Action:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <textarea
                            class="input @error('action') is-danger @enderror"
                            id="action"
                            name="action"
                            value="{{$errors->any() ? old('action') : $error->action}}"
                        >
                        {{$errors->any() ? old('action') : $error->action}}</textarea>
                    </div>
                    <br>
                    @error('description')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{route('error.index')}}">
                    <button type="button" class="button is-link-light">Cancel</button>
                </a>
            </form>
        </div>
    </section>
@endsection
