@extends('backend.layout')

@section('head-scripts')


@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')


            <div class="row clearfix">

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="header">
                            <h2>
                                Schimba Parola
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('admin.settings.password.update') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="old_pass" class="form-control passwd" placeholder="Parola actuala" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="new_pass" class="form-control passwd" placeholder="Parola noua" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="new_pass_confirmation" class="form-control passwd" placeholder="Confirmare parola noua" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="switch" id="pass-switch">
                                        <label>
                                            <input type="checkbox" class="checkbox_check">
                                            <span class="lever checkbox_check"></span>
                                            Ascunde parolele
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0px;">
                                    <button type="submit" class="btn btn-primary waves-effect">Salveaza</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Avatar
                            </h2>
                        </div>
                        <div class="body">
                            <img class="img-responsive thumbnail" src="/backend/avatar/{{ auth()->user()->avatar }}">
                            <form id="upload-form" method="POST" action="{{ route('admin.settings.avatar.upload') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="file-upload">
                                    <label for="upload" class="file-upload__label btn-primary">Schimba Poza</label>
                                    <input id="upload" class="file-upload__input" type="file" name="avatar">
                                </div>
                            </form>
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