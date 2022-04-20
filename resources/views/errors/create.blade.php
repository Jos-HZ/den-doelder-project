@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">

            <h1>Order {{ app('request')->input('ordernumber') }} </h1>
            <form method="POST" action="{{ route('error.store') }}">
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
                            value="{{ app('request')->input('ordernumber') }}"
                        >
                    </div>
                </div>

                <label for="time">Time:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('time'),
                            ])
                            type="time"
                            id="time"
                            name="time"
                            value="{{ $errors->any() ? old('time') : '' }}">
                    </div>
                    @error('time')
                        <p class="help is-danger">{{ $errors->get('time')[0] }}</p>
                        {{-- <p class="help is-danger">{{ $errors->getMessages()['time'][0] }}</p> --}}
                    @enderror
                </div>

                <label for="date">Date:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <input
                            @class ([
                                'input',
                                'is-danger' => $errors->get('date'),
                            ])
                            type="date"
                            id="date"
                            name="date"
                            value="{{ $errors->any() ? old('date') : '' }}"
                        >
                        {{-- required --}}
                    </div>
                    @error('date')
                    <p class="help is-danger">{{ $errors->get('date')[0] }}</p>
                    @enderror
                </div>

                <label class="i forgor" for="category">Error category:</label><br>
                <div class="label">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="category" value="mechanical">
                            Mechanical error
                        </label>
                        <label class="radio">
                            <input type="radio" name="category" value="technical">
                            Technical error
                        </label>
                    </div>
                    @error('category')
                    <p class="help is-danger">{{ $errors->get('category')[0] }}</p>
                    @enderror
                </div>

                <label for="description">Description:</label><br>
                <div class="label">
                    <div class="control has-icons-left has-icons-right">
                        <div class="grow-wrap">
                            <textarea
                                {{-- @class ([
                                    'input',
                                    'is-danger' => $errors->get('description'),
                                ]) --}}
                                id="description"
                                name="description"
                                oninput="this.parentNode.dataset.replicatedValue = this.value">{{
                                ($errors->any() ? old('description') : '')
                            }}</textarea>
                            <script>document.querySelector('#notes > div > textarea').parentNode.dataset.replicatedValue = document.querySelector('#notes > div > textarea').value;</script>
                        </div>
                    </div>
                    @error('description')
                    <p class="help is-danger">{{ $errors->get('description')[0] }}</p>
                    @enderror
                </div>

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{ route('error.index') }}">
                    <button type="button" class="button is-link-light">Cancel</button>
                </a>

            </form>
        </div>
    </section>
@endsection
