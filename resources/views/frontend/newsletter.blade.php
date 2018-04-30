@extends('frontend.layout')

@section('head-scripts')
@endsection

@section('content')

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br><br><br><br>
            <h1 class="header center orange-text banner-text">Newsletter Raiochplay</h1>
            <div class="row center">
                <h5 class="header col s12 light subtext">Va puteti abona la newsletter folosind formularul de mai jos</h5>
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
                <div class="col s12 m4 l4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">mail_outline</i></h2>
                        <h5 class="center">Abonare Newsletter</h5>
                        <p class="light">
                            Despre noi text, despre noi, text despre noi.
                            Despre noi text, despre noi, text despre noi.
                            Despre noi text, despre noi, text despre noi.
                        </p>
                        <p class="light">
                            Despre noi text, despre noi, text despre noi.
                            Despre noi text, despre noi, text despre noi.
                            Despre noi text, despre noi, text despre noi.
                        </p>
                    </div>
                </div>

                <div class="col s12 m8 l8">
                    <div class="margin-top-40">
                        @if(session('message'))
                            <div class="mesaj-succes">
                                {{ session('message') }} &nbsp;
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="mesaje-eroare">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('frontend.submit.newsletter') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12 l12">
                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    <label for="lemail">Email</label>
                                </div>
                                <div class="input-field col s12 l12">
                                    <label>Cod Anti-Spam:</label>
                                    <input type="text" id="tr-size" name="cod_input" required="required">
                                    <input type="hidden" name="spam_not">
                                    <input type="hidden" name="cod_gen" value="{{ $cod_antispam }}">
                                    <span class="cod-antispam">{{ $cod_antispam }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light btn-rch" type="submit" name="action">Abonare
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>
        <br><br>
    </div>

@endsection

@section('footer-scripts')
@endsection
