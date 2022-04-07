@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8-desktop is-12-tablet">

                    <div class="content">
                        <h1>Welcome to the Den doelder application</h1>
                        <div class=" is-ancestor">
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-warning">
                                    <p class="title">Control list</p>
                                </article>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-success">
                                    <p class="title">Pallet design</p>
                                </article>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-info">
                                    <p class="title">Quality control</p>
                                </article>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-primary">
                                    <p class="title">Error</p>
                                </article>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-warning">
                                    <p class="title">Notes</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
