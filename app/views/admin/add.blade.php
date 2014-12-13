@extends('layouts.default')

@section('title')
    <title>PSAP Admin Password Reset</title>
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
                <i class="icon-user"></i>
                <span>Admin</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="active submenu">
                <li><a href="/admin" class="">PSAP Database</a></li>
                <li><a href="/admin/manage" class="active">Manage Admins and Private Access</a></li>
                <li><a href="/admin/reset" class="">Reset Password</a></li>
                <li><a href="/admin/edit">Edit Profile</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Create New Admin/Private Access User</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-6 with-sidebar">
                {{ Form:: open(['action' => 'AdminController@addAdmin', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form:: label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('email', 'email',  null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group FIELD-BOX">
                        {{ Form:: label('type', 'Type', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            <label class="radio">{{ Form:: radio('type', 'admin', false) }} Admin</label>

                            <label class="radio">{{ Form:: radio('type', 'private', true) }} Private Access</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                            {{ Form:: submit('Submit', ['class' => 'btn btn-flat success']) }}
                            <a class="btn btn-flat" href="/admin/manage">Cancel</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop