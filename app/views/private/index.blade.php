@extends('layouts.default')

@section('title')
    <title>PSAP Private Access</title>
@stop


@section('styling')
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
    <link href="/css/lib/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/compiled/datatables.css" type="text/css" media="screen" />
    <style type="text/css">
        .pace {
          -webkit-pointer-events: none;
          pointer-events: none;

          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;

          -webkit-perspective: 12rem;
          -moz-perspective: 12rem;
          -ms-perspective: 12rem;
          -o-perspective: 12rem;
          perspective: 12rem;

          z-index: 2000;
          position: fixed;
          height: 6rem;
          width: 6rem;
          margin: auto;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
        }

        .pace.pace-inactive .pace-progress {
          display: none;
        }

        .pace .pace-progress {
          position: fixed;
          z-index: 2000;
          display: block;
          position: absolute;
          left: 0;
          top: 0;
          height: 6rem;
          width: 6rem !important;
          line-height: 6rem;
          font-size: 2rem;
          border-radius: 50%;
          background: rgba(31, 40, 55, 0.8);
          color: #fff;
          font-family: "Helvetica Neue", sans-serif;
          font-weight: 100;
          text-align: center;

          -webkit-animation: pace-3d-spinner linear infinite 2s;
          -moz-animation: pace-3d-spinner linear infinite 2s;
          -ms-animation: pace-3d-spinner linear infinite 2s;
          -o-animation: pace-3d-spinner linear infinite 2s;
          animation: pace-3d-spinner linear infinite 2s;

          -webkit-transform-style: preserve-3d;
          -moz-transform-style: preserve-3d;
          -ms-transform-style: preserve-3d;
          -o-transform-style: preserve-3d;
          transform-style: preserve-3d;
        }

        .pace .pace-progress:after {
          content: attr(data-progress-text);
          display: block;
        }

        @-webkit-keyframes pace-3d-spinner {
          from {
            -webkit-transform: rotateY(0deg);
          }
          to {
            -webkit-transform: rotateY(360deg);
          }
        }

        @-moz-keyframes pace-3d-spinner {
          from {
            -moz-transform: rotateY(0deg);
          }
          to {
            -moz-transform: rotateY(360deg);
          }
        }

        @-ms-keyframes pace-3d-spinner {
          from {
            -ms-transform: rotateY(0deg);
          }
          to {
            -ms-transform: rotateY(360deg);
          }
        }

        @-o-keyframes pace-3d-spinner {
          from {
            -o-transform: rotateY(0deg);
          }
          to {
            -o-transform: rotateY(360deg);
          }
        }

        @keyframes pace-3d-spinner {
          from {
            transform: rotateY(0deg);
          }
          to {
            transform: rotateY(360deg);
          }
        }
    </style>
    <script src="js/pace.js"></script>
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
                <li><a href="" class="active">PSAP Database</a></li>
                <li><a href="/private/reset">Reset Password</a></li>
                <li><a href="/private/edit">Edit Profile</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="datatables-page">
        <div class="table-wrapper users-table section">
            <div class="row filter-block">
                <div class="pull-right">
                    <a class="btn-flat pull-right success new-product add-user" href="/registry/create">+ Add New Entry</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table id="example">
                        <thead>
                            <tr>
                                <th tabindex="0" rowspan="1" colspan="1">PSAP ID
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">PSAP Name
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">State
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">County
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">City
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Text-To-911
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Type of Change
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Comments
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Last Update
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Edit Entry?
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1">Remove Entry?
                                </th>
                             </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">PSAP ID</th>
                                <th rowspan="1" colspan="1">PSAP Name</th>
                                <th rowspan="1" colspan="1">State</th>
                                <th rowspan="1" colspan="1">County</th>
                                <th rowspan="1" colspan="1">City</th>
                                <th rowspan="1" colspan="1">Text-To-911</th>
                                <th rowspan="1" colspan="1">Type of Change</th>
                                <th rowspan="1" colspan="1">Comments</th>
                                <th rowspan="1" colspan="1">Last Update</th>
                                <th rowspan="1" colspan="1">Edit Entry?</th>
                                <th rowspan="1" colspan="1">Remove Entry?</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach( $entries as $entry)
                                <tr>
                                    <td class="center">{{ $entry[0]->psapid }}</td>
                                    <td>{{ $entry[0]->psapname }}</td>
                                    <td class="center">{{ $entry[0]->state }}</td>
                                    <td class=""> {{ $entry[0]->county }}</td>
                                    <td class="">{{ $entry[0]->city }}</td>
                                    <td class="">{{ $entry[0]->text_911 }}</td>
                                    <td class="center">{{ $entry[0]->typechange }}</td>
                                    <td>{{ $entry[0]->comments }}</td>
                                    <td>{{ $entry[0]->updated_at }}</td>
                                    <td class="center">{{ link_to("/registry/edit/{$entry[0]->id}", "Edit") }}</td>
                                    <td class="center">{{ link_to("/registry/delete/{$entry[0]->psapid}", "Delete") }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
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






