@extends('layouts.master')

@section('content')
    <section class="section">
        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">

        <div class="container">
            <h1 class="title has-text-centered">{{__("Order")}} {{ $order->ordernumber }} {{$order->pallettype}}</h1>
            <p class="has-text-centered">{{__("Number of pallets")}} {{ $order->palletnumber }}</p>
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        @if($order->start_time === null)
                            <a href="{{ route('orders.start', $order) }}">
                                <p class="title text-lg-center">{{__("Start")}}</p>
                            </a>
                        @elseif($order->end_time === null)
                            <a href="{{ route('orders.end', $order) }}">
                                <p class="title text-lg-center">{{__("Done")}}</p>
                            </a>
                        @else
                            <p class="title text-lg-center">{{__("Is finished")}}</p>
                        @endif

                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title text-lg-center">{{__("Control list")}}</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <a href=/public/storage/files/D4QyUTWQq9BF9vBabztsfuTiKc735a4RI7hwsDlZ.pdf">
                        <p class="title text-lg-center">{{__("Order details")}}</p>
                    </article>
                    </a>
                </div>
                <div class="tile is-parent is-4">
                    <div class="tile is-child box">
                        <a href="{{ route('qualityControl.index', $order) }}">
                            <article>
                                <p class="title text-lg-center">{{__("Quality control")}}</p>
                            </article>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-8">
                    <article class="tile is-child box has-background-success">
                        <div class="notesTitle">
                            <p class="title">{{__("Notes")}}</p>
                            <div class="notesButton">
                                @can('is_admin')
                                    <a href="{{
                                    (request()->query('field') === 'notes'
                                    ? 'javascript:document.getElementById(\'notes\').submit()'
                                    : request()->fullUrlWithQuery(['field' => 'notes']))
                                    }}">
                                        <img src="/img/svg/{{
                                            (request()->query('field') === 'notes'
                                                ? 'save'
                                                : (isset($order->notes)
                                                    ? 'edit'
                                                    : 'create'))
                                        }}.svg">
                                    </a>
                                @endcan
                            </div>
                        </div>
                        @if (request()->query('field') === 'notes')
                            @can('is_admin')
                                <div class="content">
                                    <form id="notes" method="post" action="{{ route('orders.update', $order->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grow-wrap">
                                                <textarea
                                                    name="notes"
                                                    oninput="textareaOnInput(this)"
                                                    class="is-focused has-background-success">{{
                                                        $order->notes
                                                }}</textarea>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                        @else
                            <div class="content">
                                <p>{{ $order->notes }}</p>
                            </div>
                        @endif
                    </article>
                </div>
                <div class="tile is-parent is-vertical">
                    <div class="tile is-child box">
                        <a href="{{ route('qualityControl.create', ['ordernumber' => $order->ordernumber ])}}">
                            <p class="title text-lg-center">{{__("Create quality control")}}</p>
                        </a>
                    </div>

                    <div class="tile is-child box has-background-danger">
                        <a href="{{ route('backlog.create', ['ordernumber' => $order->ordernumber ])}}">
                            <p class="title text-lg-center">{{__("Error")}}</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <table class="table">
                            <thead>
                            <th><abbr title="time">{{__("Time")}}</abbr></th>
                            <th><abbr title="date">{{__("Date")}}</abbr></th>
                            <th><abbr title="category">{{__("Category")}}</abbr></th>
                            <th><abbr title="description">{{__("Description")}}</abbr></th>
                            <th><abbr title="resolved">{{__("Resolved_at")}}</abbr></th>
                            <th><abbr title="resolved">{{__("Error time")}}</abbr></th>
                            <th><abbr title="edit-button"></abbr></th>
                            <th><abbr title="resolve-button"></abbr></th>
                            </thead>
                            <tbody>
                            @foreach($order->backlog->sortByDesc('created_at') as $backlog)
                                <tr>
                                    <td>{{ $backlog->time }}</td>
                                    <td>{{ $backlog->date }}</td>
                                    <td>@if($backlog->category === 'technical')
                                            T
                                        @else
                                            M
                                        @endif
                                    </td>
                                    <td>{{ $backlog->description }}</td>
                                    <td>{{ $backlog->resolved_at }}</td>
                                    <td>{{ $backlog->timeDifference() }}</td>
                                    <td>
                                        @if($backlog->resolved_at === null)
                                            <a href="{{ route('backlog.resolve', $backlog)}}">
                                                <button class="btn btn-default" type="button">{{__("Resolve")}}</button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('backlog.edit', $backlog)}}">
                                            <button class="btn btn-default" type="button">{{__("Edit")}}</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
