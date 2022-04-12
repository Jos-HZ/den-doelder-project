@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="field">
                <label class="label">Order .. </label>
            </div>

            <form method="POST" action="{{ route('error.store') }}">
                @csrf
            <div class="field">
                <label class="label">Ordernumber</label>
                <div class="control has-icons-left has-icons-right">
                    <input
                        class="input"
                        type="text"
                        id="ordernumber"
                        name="ordernumber"
                        placeholder="Ordernumber"
                    >
                </div>
            </div>

            <div class="field">
                <label class="label">Date</label>
                <div class="control has-icons-left has-icons-right">
                    <input
                        class="input"
                        type="text"
                        placeholder="Date"
                        id="date"
                        name="date"
                    >
                </div>
            </div>

            <div class="field">
                <label class="label">Time</label>
                <div class="control">
                    <input
                        class="input"
                        type="time"
                        placeholder="Time"
                        id="time"
                        name="time"
                    >
                </div>
            </div>

            <div class="field">
                <label class="label">Subject</label>
                <div class="control">
                    <div class="select">
                        <select
                        id="subject"
                        name="subject"
                        >
                            <option>Select dropdown</option>
                            <option>Technical Error</option>
                            <option>Material Error</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Message</label>
                <div class="control">
                    <textarea
                        class="textarea"
                        placeholder="Textarea"
                        id="description"
                        name="description"
                    ></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    {{--                    TODO: Add link to backlog --}}
                    <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection
