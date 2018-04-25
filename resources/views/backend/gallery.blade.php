@extends('backend.layout')

@section('head-scripts')


@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')


            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                GALERIE FOTO
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <input type="text" id="ordine">

                                <div id="sortable" class="list-unstyled row clearfix">

                                    @foreach($pictures as $picture)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="set_{{ $picture->id }}">
                                        <a href="/products/images/{{ $picture->url }}" data-sub-html="">
                                            <img class="img-responsive thumbnail" src="/products/images/{{ $picture->url }}">
                                        </a>
                                    </div>
                                    @endforeach


                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

@endsection

@section('footer-scripts')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $( function() {
                $( "#sortable" ).sortable({
                    axis: 'x,y',
                    stop: function (event, ui) {
                        var data = $(this).sortable("serialize", { key: "sort" });

                        console.log(data);
                        $('#ordine').val(data);
                        // POST to server using $.post or $.ajax
                        // $.ajax({
                        //     data: data,
                        //     type: 'POST',
                        //     url: '/your/url/here'
                        // });
                    }
                });

                $( "#sortable" ).disableSelection();
            } );
        });
    </script>

@endsection