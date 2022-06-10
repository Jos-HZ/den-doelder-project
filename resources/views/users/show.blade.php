@extends('layouts.master')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{__("Show")}} {{__("User")}}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> {{__("Back")}}</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>{{__("Name")}}</th>
                <th>{{__("Email")}}</th>
                <th>{{__("Roles")}}</th>
            </tr>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        </table>
    </div>
</section>
@endsection
