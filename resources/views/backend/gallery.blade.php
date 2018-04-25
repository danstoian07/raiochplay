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


                                <form method="POST" action="{{ route('admin.product.pictures.sort', ['id' => $id]) }}">
                                    {{ csrf_field() }}
                                    <div id="sortable" class="list-unstyled row clearfix">
                                        @foreach($pictures as $picture)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="set_{{ $picture->id }}">
                                            <img class="img-responsive thumbnail" src="/products/images/{{ $picture->url }}">
                                        </div>
                                        @endforeach
                                        <div class="col-md-12">
                                            <input type="hidden" id="ordine" name="ordine">
                                            <button type="submit" id="submit-changes" class="btn btn-primary waves-effect" style="display: none;">Salveaza Ordinea</button>
                                        </div>
                                    </div>

                                </form>

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
                        $('#ordine').val(data);
                        $('#submit-changes').show();
                    }
                });

                $( "#sortable" ).disableSelection();
            } );
        });
    </script>

@endsection