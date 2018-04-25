@extends('frontend.layout')

@section('head-scripts')
@endsection

@section('content')

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br><br><br><br>
      <h1 class="header center orange-text banner-text">Scurt slogan</h1>
      <div class="row center">
        <h5 class="header col s12 light subtext">Text descriptiv pentru banner top un slogan sau orice altceva</h5>
      </div>
      <div class="row center">
        <a href="#" id="download-button" class="btn-large waves-effect waves-light orange">Vezi catalog</a>
      </div>
      <br><br>

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
          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="/frontend/img/prod_1.jpg">
                <span class="card-title">Primu Produs</span>
                <span class="gradient-shadow"></span>
              </div>
              <div class="card-content">
                <p>Ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
              <div class="card-action">
                <a href="#">Detalii</a>
              </div>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="/frontend/img/prod_3.jpg">
                <span class="card-title">Produs 2</span>
                <span class="gradient-shadow"></span>
              </div>
              <div class="card-content">
                <p>Dolores ipsum sit amet, consectetur adipisicing elit.</p>
              </div>
              <div class="card-action">
                <a href="#">Detalii</a>
              </div>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="card small">
              <div class="card-image">
                <img src="/frontend/img/prod_2.jpg">
                <span class="card-title">Produs 3</span>
                <span class="gradient-shadow"></span>
              </div>
              <div class="card-content">
                <p>Lorem sit amet, consectetur ipsum dolor adipisicing elit.</p>
              </div>
              <div class="card-action">
                <a href="#">Detalii</a>
              </div>
            </div>
          </div>

      </div>

    </div>
    <br><br>
  </div>
</div>
@endsection

@section('footer-scripts')
@endsection