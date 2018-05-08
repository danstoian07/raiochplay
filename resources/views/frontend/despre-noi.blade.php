@extends('frontend.layout')

@section('head-scripts')
@endsection

@section('content')

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <h1 class="header center orange-text banner-text" id="slogan">Jocul este pe primul loc</h1>
      </div>
      <div class="row center">
        <h5 class="header light subtext">Distractia este garantata cand siguranta este adecvata. Amenajarea unui loc de joaca trebuie tratata cu seriozitate.</h5>
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
        <div class="col s12 m12 l12">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">perm_identity</i></h2>
            <h5 class="center">Despre Noi</h5>

            <p class="light">
              Despre noi text, despre noi, text despre noi.
            </p>
            <p class="light">
              Despre noi text, despre noi, text despre noi.
            </p>
          </div>
        </div>


      </div>

    </div>
    <br><br>
  </div>

@endsection

@section('footer-scripts')
@endsection
