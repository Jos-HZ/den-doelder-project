@extends('layouts.master')

@section('content')
    <section class="section">
        <span>Paris</span>
        <span class="icon">
    <i class="fas fa-arrow-right"></i>
  </span>
        <span>Budapest</span>
        <span class="icon">
    <i class="fas fa-arrow-right"></i>
  </span>
        <a href="/users"><img src="/img/svg/back-arrow.svg" display="block" width="35" height="35"></a>
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
