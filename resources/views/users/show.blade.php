@extends('layouts.master')

@section('content')
<section class="section">
    <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{__("Show")}} {{__("User")}}</h2>
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
