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
        <div class="col s12 m12 l4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">pan_tool</i></h2>
            <h5 class="center">Siguranta inainte de toate</h5>
            <p class="light">
              Stim ca proiectarea si amenajarea unui loc de joaca este o provocare de la inceput pana la final.
              Iar siguranta nu trebuie trecuta cu vederea sub nici o forma. In cazul in care sunteti de acord cu
              mentalitatea noastra, cu siguranta colaborarea noastra va fi de succes.
            </p>
          </div>
        </div>

        <div class="col s12 m12 l4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">grade</i></h2>
            <h5 class="center">Experienta in domeniu</h5>
            <p class="light">
              Cei de peste 10 ani de experienta in domeniu ne ajuta sa fim prompti si sa tratam fiecare client cu profesionalism.
              Insa, suntem intr-o continua stare de receptivitate pentru acumularea de experienta si cerintele actuale ale clientilor.
            </p>
          </div>
        </div>

        <div class="col s12 m12 l4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">card_membership</i></h2>
            <h5 class="center">Garantia calitatii</h5>
            <p class="light">
              Calitatea este garantata de certificarile noastre in domeniu, dar si de profesionalismul echipei de montaj si mentenanta.
              Multumirea deplina a clientului ne consolizeaza locul in piata si ne asigura inca o data de o treaba bine facuta.
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
