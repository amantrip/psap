@extends('layouts.default')

@section('title')
    <title>Success!</title>
@stop


@section('styling')
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
                <li><a href="" class="">PSAP Database</a></li>
                <li><a href="/admin/manage">Manage Admins and Private Access</a></li>
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
                <h3>Success!</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <div class="col-md-6 with-sidebar">
                <h4>{{$message}}</h4>

                    <a href="/admin" class="btn btn-default" >Return To Admin Page</a>
            </div>
        </div>
    </div>
@stop








