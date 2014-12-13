@extends('layouts.default')

@section('title')
    <title>Failed!</title>
@stop


@section('styling')
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop


@section('header')


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

            <a href="">
                <i class="icon-globe"></i>
                <span>Private Access/Admin</span>
            </a>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Failed!</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <div class="col-md-6 with-sidebar">
                <h4>{{$message}}</h4>

                    <a href="" class="btn btn-default" >Restart</a>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable({
                "sPaginationType": "full_numbers"
            });
        });
    </script>
@stop






