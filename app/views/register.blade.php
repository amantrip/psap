@extends('layouts.default')

@section('title')
    <title>PSAP Admin Registration</title>
@stop

@section('styling')
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop



@section('sidebar')
    <ul id="dashboard-menu">
        <li class="">

            <a href="/">
                <i class="icon-globe"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a class="" href="/">
                <i class="icon-user"></i>
                <span>Admin/Private Access Registration</span>
            </a>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Register New Admin</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-8 with-sidebar">
                {{ Form:: open(['action' => 'HomeController@register', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form:: label('email', 'Registered Email', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('accesscode', 'Access Code', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: text('accesscode', null, ['class' => 'form-control', 'placeholder' => 'Access Code', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('password', 'Password', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('name', 'Name', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: text('name', null, ['class' => 'form-control', 'placeholder' => 'First and Last Name', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('company', 'Company', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: text('company', null, ['class' => 'form-control', 'placeholder' => 'Company', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                            {{ Form:: submit('Register', ['class' => 'btn btn-flat success']) }}
                            <a href="/" class="btn btn-flat btn-default">Cancel</a>
                        </div>
                    </div>
            </div>

             <!-- side right column -->
            <div class="col-md-4 form-sidebar">
                <div class="alert alert-info">
                    <i class="icon-lightbulb"></i> If you don't have an access code, please email us at am4227@columbia.edu and we will send you one!
                </div>
                <h6>Important Instructions</h6>
                <p>Please use the email ID to which you received the access code to register with PSAP Database!</p>

            </div>
        </div>
    </div>
@stop