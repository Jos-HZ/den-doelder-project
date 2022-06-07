@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{__("Users Management")}}</h2>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>{{__("Name")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Roles")}}</th>
                    <th width="280px">{{__("Action")}}</th>
                </tr>
                @foreach ($roles as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{$user->role}}</td>

                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">{{__("Show")}}</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{__("Edit")}}</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            @if($user->role !== "admin")
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            @endif
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $roles->render() !!}
        </div>
    </section>
@endsection
