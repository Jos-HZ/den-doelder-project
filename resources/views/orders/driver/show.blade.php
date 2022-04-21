@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Order information</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                            pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat
                            facilisis.</p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Note</p>
                        <p>{{ $order->id }}</p>
                    </div>
                </div>
            </div>

            <div class="tile is-ancestor">

                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <p class="title">Material checklist</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                            pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat
                            facilisis.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
