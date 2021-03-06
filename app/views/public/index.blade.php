@extends('...layouts.default')

@section('title')
    <title>PSAP Registry</title>
@stop

@section('styling')
    <link href="css/lib/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/datatables.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/home-page.css" />
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

@section('sidebar')
    <ul id="dashboard-menu">
        <li>
            <a class="" href="/">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="/public">
                <i class="icon-globe"></i>
                <span>Public Access</span>
            </a>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="datatables-page">
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
                            <th tabindex="0" rowspan="1" colspan="1">Type of Change
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Comments
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
                            <th rowspan="1" colspan="1">Type of Change</th>
                            <th rowspan="1" colspan="1">Comments</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach( $entries as $entry)
                            <tr>
                                <td>{{ $entry->psapid }}</td>
                                <td>{{ $entry->psapname }}</td>
                                <td class="center">{{ $entry->state }}</td>
                                <td class=""> {{ $entry->county }}</td>
                                <td class="">{{ $entry->city }}</td>
                                <td class="center">{{ $entry->typechange }}</td>
                                <td>{{ $entry->comments }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

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
