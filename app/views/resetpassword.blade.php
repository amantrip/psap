@extends('layouts.home')


@section('title')
    <title>PSAP Admin Login</title>
@stop


@section('styling')
    <link rel="stylesheet" href="/clean/css/compiled/sign-in.css" type="text/css" media="screen" />
@stop

@section('content')
    <!-- Sign In Option 2 -->
    <div id="sign_in2">
        <div class="container">
            <div class="section_header">

            </div>
            <div class="row login">
                <div class="col-sm-5 left_box">
                    <h4>Reset Password</h4>

                    <div class="perk_box">
                        <div class="perk">
                            <span class="icos ico1"></span>
                            <p><strong>Access all PSAP Entries</strong>: Edit, Delete Entries or Assign new owners.</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico2"></span>
                            <p><strong>Create New Admin</strong>: Use the new admin's email to send them an access code.</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico3"></span>
                            <p><strong>Create New Private Access Users</strong>: Use the new user's email to send them an access code.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="division">
                                <div class="line l"></div>
                                <span>Reset</span>
                                <div class="line r"></div>
                            </div>

                            <div class="form">
                                {{ Form::open(['action' => 'HomeController@resetPassword']) }}
                                    {{Form:: text('email', null, ['class' => 'form-control', 'placeholder' => 'Email' ,'required'])}}
                                    {{Form:: text('accesscode', null, ['class' => 'form-control', 'placeholder' => 'Access Code', 'required'])}}
                                    {{Form:: password('password', ['class' => 'form-control', 'placeholder' => 'New Password', 'required'])}}<br>
                                    {{Form:: password('repassword',  ['class' => 'form-control', 'placeholder' => 'Re Enter Password', 'required'])}}
                                    <br>
                                    {{ Form:: submit('Submit') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

