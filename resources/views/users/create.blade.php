@extends('layouts.master')
@section('content')
    <section class="section">
        <a href="/"><img src="/img/svg/back-arrow.svg"  width="35" height="35"></a>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2 class="has-text-centered">{{__("Create a new user")}}</h2>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Name")}}:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Email")}}:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Password")}}:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{__("Confirm Password")}}:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>{{__("Role")}}:</strong>
                    <div class="form-group">
                        <div class="select">
                            <select id="role" name="role">
                                <option value="admin">{{__("Administrative worker")}}</option>
                                <option value="driver">{{__("Forklift driver")}}</option>
                                <option value="production">{{__("Production")}}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>{{__("Language")}}:</strong>
                    <div class="form-group">
                        <div class="select">
                            <select id="language" name="language">
                                <option value="nl">{{__("Dutch")}}</option>
                                <option value="en">{{__("English")}}</option>
                                <option value="pl">{{__("Polish")}}</option>
                                <option value="ro">{{__("Romanian")}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </section>
@endsection
