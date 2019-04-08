@extends('frontend.layout')

@section('head-scripts')
@endsection

@section('content')

  <div class="section no-pad-bot" id="index-banner" style="background-image: url(../categories/pictures/{{ $banner }});">
    <div class="container">
      <div class="row center">
        <h1 class="header center orange-text banner-text" id="slogan">{{ $slogan }}</h1>
      </div>
      <div class="row center">
        <h5 class="header light subtext">{{ $sub_slogan }}</h5>
      </div>
      {{--<div class="row center">--}}
      {{--<a href="#" id="download-button" class="btn-large waves-effect waves-light orange">Vezi catalog</a>--}}
      {{--</div>--}}
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m3">
          <div class="collection">
            @foreach($categories as $category)
            <a href="/produse/{{ $category->slug }}" class="collection-item">{{ $category->name }}</a>
            @endforeach
          </div>
        </div>

        <div class="col s12 m9">

          @foreach($products as $product)
          <div class="col s12 m12 l6 xl4">
            <div class="card medium hoverable">
              <div class="card-image">
                <img src="/products/images/{{ $product->thumb }}">
                <span class="gradient-shadow"></span>
              </div>
              <div class="card-content">
                <span class="card-title">{{ $product->name }}</span>
                <span class="">{!! $product->description !!}</span>
              </div>
              <div class="card-action">
                <a href="#">Detalii</a>
              </div>
            </div>
          </div>
          @endforeach


      </div>

    </div>
    <br><br>
  </div>
</div>
@endsection

@section('footer-scripts')
@endsection