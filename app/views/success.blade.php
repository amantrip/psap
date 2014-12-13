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

            <a href="/public" class="active">
                <i class="icon-user"></i>
                <span>Private Access/Admin Create PSAP Entry</span>
            </a>
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

                    <a href="/admin" class="btn btn-default" >Return To Home Page</a>
            </div>
        </div>
    </div>
@stop








