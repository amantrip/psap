@extends('layouts.default')

@section('title')
    <title>PSAP Edit Private Access User Profile</title>
@stop

@section('styling')
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop

@section('header')

    <ul class="nav navbar-nav pull-right hidden-xs">
        <li class="settings hidden-xs hidden-sm">
            <a href="/logout" role="button">
                <i class="icon-share-alt"></i>
            </a>
        </li>
    </ul>
@stop


@section('sidebar')
    <ul id="dashboard-menu">
        <li class="">

            <a href="/">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="">

            <a href="/public">
                <i class="icon-globe"></i>
                <span>Public Access</span>
            </a>
        </li>
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a class="dropdown-toggle" href="#">
                <i class="icon-lock"></i>
                <span>Private Access</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="active submenu">
                <li><a href="/private" class="">PSAP Database</a></li>
                <li><a href="/private/reset" class="">Reset Password</a></li>
                <li><a href="" class="active">Edit Profile</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Edit Profile</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-6 with-sidebar">
                {{ Form:: open(['action' => 'PrivateController@editProfile', 'class' => 'form-horizontal']) }}
                    {{ Form::hidden('id', $admin->id) }}
                    <div class="form-group">
                        {{ Form:: label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: label('email', $admin->email, ['class' => 'col-md-2 control-label']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('name', 'Name', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'name', $admin->name, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('company', 'Company', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'company', $admin->company, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            {{ Form:: submit('Submit', ['class' => 'btn btn-flat success']) }}
                            <a class="btn btn-flat" href="/private">Cancel</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop