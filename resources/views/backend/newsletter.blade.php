@extends('backend.layout')

@section('head-scripts')


@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')


            <div class="row clearfix">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Abonati Newsletter</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EMAIL</th>
                                    <th>DATA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($abonati as $key=>$abonat)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $abonat->email }}</td>
                                    <td>{{ $abonat->created_at }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Dezabonati</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EMAIL</th>
                                    <th>DATA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dezabonati as $key=>$dezabonat)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $dezabonat->email }}</td>
                                        <td>{{ $dezabonat->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

@endsection

@section('footer-scripts')

    <script>
        $( document ).ready(function() {

            $("#pass-switch").click(function() {
                if ($('input.checkbox_check').is(':checked')) {
                    $(".passwd").attr({type: "password"});
                }
                else {
                    $(".passwd").attr({type: "text"});
                }

            });

            $("#upload").change(function() {
                $("#upload-form").submit();
            });
        });
    </script>


@endsection