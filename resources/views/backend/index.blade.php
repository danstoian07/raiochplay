@extends('backend.layout')

@section('head-scripts')
    <script>
        (function(w,d,s,g,js,fs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
            js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
        }(window,document,'script'));
    </script>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wide-on-mobile">
                    <div class="card">
                        <div class="header">
                            <h2>Vizitatori</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">settings</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" class=" waves-effect waves-block" data-toggle="modal" data-target="#defaultModal">Setari Google Analitics</a></li>
                                        <li><a href="https://console.developers.google.com/apis/library/analytics.googleapis.com/?q=analytics" target="_blank">Obtine cheie API</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="embed-api-auth-container" style="padding: 10px;"></div>
                            <div id="chart-container" style="padding: 0px 10px;"></div>
                            <div id="view-selector-container" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

    {{--MODAL--}}
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Setari Google Analitics</h4>
                </div>
                <form action="{{ route('admin.analytics.update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="view_code" value="{{ $view_code }}">
                                <label class="form-label">Website ID</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="client_id" value="{{ $client_id }}">
                                <label class="form-label">Client ID</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">Salveaza</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Inchide</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer-scripts')
    <script>

        gapi.analytics.ready(function() {

            /**
             * Authorize the user immediately if the user has already granted access.
             * If no access has been created, render an authorize button inside the
             * element with the ID "embed-api-auth-container".
             */
            gapi.analytics.auth.authorize({
                container: 'embed-api-auth-container',
                clientid: '{{ $client_id }}'
            });


            /**
             * Create a new ViewSelector instance to be rendered inside of an
             * element with the id "view-selector-container".
             */
            var viewSelector = new gapi.analytics.ViewSelector({
                container: 'view-selector-container'
            });

            // Render the view selector to the page.
            viewSelector.execute();


            /**
             * Create a new DataChart instance with the given query parameters
             * and Google chart options. It will be rendered inside an element
             * with the id "chart-container".
             */
            var dataChart = new gapi.analytics.googleCharts.DataChart({
                query: {
                    ids: 'ga:{{ $view_code }}',
                    metrics: 'ga:sessions',
                    dimensions: 'ga:date',
                    'start-date': '30daysAgo',
                    'end-date': 'yesterday'
                },
                chart: {
                    container: 'chart-container',
                    type: 'LINE',
                    options: {
                        width: '100%',
                        title: ''
                    }
                }
            });


            /**
             * Render the dataChart on the page whenever a new view is selected.
             */
            viewSelector.on('change', function(ids) {
                dataChart.set({query: {ids: 'ga:{{ $view_code }}'}}).execute();
            });

        });
    </script>
@endsection