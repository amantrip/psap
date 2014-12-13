@extends('layouts.default')

@section('title')
    <title>PSAP Registry</title>
@stop

@section('styling')
    <link href="css/lib/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/compiled/datatables.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop

@section('sidebar')
    <ul id="dashboard-menu">
        <li>
            <a class="" href="/">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a class="" href="/docs/api">
                <i class="icon-bolt"></i>
                <span>API Documentation</span>
            </a>
        </li>
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a class="dropdown-toggle" href="#">
                <i class="icon-sitemap"></i>
                <span>How To's</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="active submenu">
                <li><a href="" class="active">For Public</a></li>
                <li><a href="/docs/instructions/admin" class="">For Admin</a></li>
                <li><a href="/docs/instructions/private" class="">For Private Access</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper">
        <!-- users table -->
        <div class="table-wrapper users-table section">
            <div class="row head">
                <div class="col-md-12">
                    <h2>Public Instructions</h2>
                </div>
            </div>
        </div>
        <br>
        <h3>Search using PSAP ID, PSAP Name, County, State, City or </h3>
    </div>
@stop

