@extends('layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="field">
                <label class="label">Order </label>
            </div>

            <div class="field">
                <label class="label">Date</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="Date">
                </div>
            </div>

            <div class="field">
                <label class="label">Time</label>
                <div class="control">
                    <input class="input" type="time" placeholder="Time">
                </div>
            </div>

            <div class="field">
                <label class="label">Subject</label>
                <div class="control">
                    <div class="select">
                        <select>
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
                    <textarea class="textarea" placeholder="Textarea"></textarea>
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
        </div>
    </section>
@endsection
