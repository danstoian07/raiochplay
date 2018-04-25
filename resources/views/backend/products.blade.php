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
                                PRODUSE
                            </h2>
                            <a href="{{ route('admin.product.new') }}" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float pull-right">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <br>
                                @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="pic-box">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon pic-box-icon" style="background: url(../products/images/{{ $product->thumb }});">
                                            </div>
                                            <div class="content">
                                                <div><b>{{ $product->name }}</b></div>
                                                <div>{{ $product->code }}</div>
                                                <div><i>{{ $product->category->name }}</i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

@endsection

@section('footer-scripts')




@endsection