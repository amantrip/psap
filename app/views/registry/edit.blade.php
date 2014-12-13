@extends('layouts.default')

@section('title')
    <title>PSAP Admin Edit Registry</title>
@stop

@section('styling')
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop



@section('sidebar')
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a class="dropdown-toggle" href="#">
                <i class="icon-user"></i>
                <span>Admin/Private Access</span>

            </a>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Edit Registry</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-6 with-sidebar">
                {{ Form:: open(['action' => 'RegistryController@update', 'class' => 'form-horizontal']) }}
                    {{ Form::hidden('id', $registry->id) }}
                    <div class="form-group">
                        {{ Form:: label('psapname', 'PSAP Name', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'psapname', $registry->psapname, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('state', 'State', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'state', $registry->state, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('county', 'County', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'county', $registry->county, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('city', 'City', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'city', $registry->city, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('text_911', 'Text-To-911', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: select('text_911', ['yes'=>'yes', 'no'=>'no'], $registry->text_911, ['class'=>'col-md-2 control-label']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('typechange', 'Type Change', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: select('typechange', ['NC'=>'NC', 'O'=>'O', 'A'=>'A', 'M'=>'M','S'=>'S'], $registry->typechange, ['class'=>'col-md-2 control-label']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('comments', 'Comments', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'comments', $registry->comments, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            {{ Form:: submit('Submit', ['class' => 'btn btn-flat success']) }}
                            <a href="/admin" class="btn btn-flat default">Cancel</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop