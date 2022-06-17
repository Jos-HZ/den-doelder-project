@extends('layouts.master')
@section('content')
    <section class="section">
        <a href="/users"><img src="/img/svg/back-arrow.svg" class="image is-32x32"></a>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{__("Edit New User")}}</h2>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($user, ['method' => 'POST','route' => ['users.update', $user->id]]) !!}
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Name")}}:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'value' => [$user->name] )) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Email")}}:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'value' => [$user->email])) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Role")}}:</strong>
                        <div class="select">
                            <select id="role" name="role">
                                <option value="admin">{{__("Administrative worker")}}</option>
                                <option value="driver">{{__("Forklift driver")}}</option>
                                <option value="production">{{__("Production")}}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="language" name="language" value= {{Auth::user()->language}}>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
