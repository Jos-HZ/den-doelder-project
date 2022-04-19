@extends('layouts.master')
@yield('title')
@section('content')
    <section class="section">
        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Modal title</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <h1>TITLE</h1>
                    <h1>TITLE</h1>
                    <h1>TITLE</h1>
                    <h1>TITLE</h1>
                    <h1>TITLE</h1>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success">Save changes</button>
                    <button class="button">Cancel</button>
                </footer>
            </div>
        </div>
    </section>
@endsection
