@extends('layouts.home')

@section('title')
    <title>Welcome to PSAP Database</title>
@stop

@section('styling')
    <style type="text/css">
        .nodeco{
            color:black
        }

        .nodeco:hover{
            color:black
        }

        div.top10{
            margin-top:60px;
        }

        div.section_header{
            margin-bottom: 15px;
        }
    </style>
@stop

@section('content')
    <div class="feature_wrapper option3">
        <div class="section_header">
            <!--<h3>Features <span>(Option 3)</span></h3>-->
        </div>
        <div class="row subtitle">
            <h2>
                A primary PSAP is defined as a PSAP to which 9-1-1 calls are routed directly from the 9-1-1 Control Office, such as, a selective router or 9-1-1 tandem. The PSAP database serves as a tool to aid the Commission in evaluating the state of PSAP readiness and E9-1-1 deployment.

            </h2>
        </div>

        <!-- Features Row -->
        <div class="row">
            <!-- Feature -->
            <div class="col-sm-4">
                <a class="nodeco" href="/public"><div class="feature">
                    <div class="img">
                        <img src="/clean/img/globe.png" />
                    </div>
                    <div class="text">
                        <h6>Public Access</h6>
                        <p>
                        </p>
                    </div>
                </div></a>
            </div>
            <!-- Feature -->
            <div class="col-sm-4">
                <a class="nodeco" href="/private"><div class="feature">
                    <div class="img">
                        <img src="/clean/img/lock.png" />
                    </div>
                    <div class="text">
                        <h6>Private Access</h6>
                        <p>
                        </p>
                    </div>
                </div></a>
            </div>
            <!-- Feature -->
            <div class="col-sm-4">
                <a class="nodeco" href="/admin"><div class="feature last">
                    <div class="img">
                        <img src="/clean/img/user.png" />
                    </div>
                    <div class="text">
                        <h6>Admin Access</h6>
                        <p>
                        </p>
                    </div>
                </div></a>
            </div>
        </div>
    </div>

    <div class="feature_wrapper option3 top10">
        <div class="section_header">
            <h3>Documentation</h3>
        </div>
        <div class="row subtitle">
            <h2>
               PSAP Documentation about how to use the database for the public, private users and admin. PSAP Database also has Public API access and details about the usage are presented below.
            </h2>
        </div>

        <!-- Features Row -->
        <div class="row">
            <!-- Feature -->
            <div class="col-sm-4">
                <a class="nodeco" href="/docs/How-To-Documentation.pdf">
                    <div class="feature">
                        <div class="img">
                            <img src="clean/img/features-ico6.png" />
                        </div>
                        <div class="text">
                            <h6>How To's</h6>
                            <p>

                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Feature -->
            <div class="col-sm-4">
                 <a class="nodeco" href="/docs/API-Documentation.pdf">
                    <div class="feature">
                        <div class="img">
                            <img src="clean/img/features-ico5.png" />
                        </div>
                        <div class="text">
                            <h6>API Access</h6>
                            <p>

                            </p>
                        </div>
                    </div>
                 </a>
            </div>
            <!-- Feature -->
            <div class="col-sm-4">
                <a class="nodeco" href="/docs/Developer-Documentation.pdf">
                    <div class="feature last">
                        <div class="img">
                            <img src="clean/img/features-ico7.png" />
                        </div>
                        <div class="text">
                            <h6>Developer Information</h6>
                            <p>

                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop