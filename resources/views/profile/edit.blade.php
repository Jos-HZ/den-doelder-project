@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>User {{ $user}} </h1>
            <form method="POST" action="{{route('profile.update', $user->id)}}">
                @csrf
                @method('PUT')

                <label for="user_name">Name:</label>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('user_name') is-danger @enderror"
                            type="user_name"
                            id="user_name"
                            name="user_name"
                            value="{{ $user->name }}"
                        >
                    </div>
                </div>

                <label for="email">Email:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('email') is-danger @enderror"
                            type="email"
                            id="email"
                            name="email"
                            value="{{$errors->any() ? old('email') : $user->email}}"
                        //required
                    </div>
                    <br>
                    @error('email')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>
                <br>

                <label for="password">Password:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input @error('password') is-danger @enderror"
                            type="password"
                            id="password"
                            name="password"
                            value="{{$errors->any() ? old('password') : $error->password}}"
                        //required
                    </div>
                    <br>
                    @error('password')
                    <p class="help is-danger">This is a required field</p>
                    @enderror
                </div>
                <br>

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{route('profile.index')}}">
                    <button type="button" class="button is-link-light">Cancel</button>
                </a>

            </form>
        </div>
    </section>
@endsection
