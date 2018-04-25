<nav class="nav" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ route('frontend.home') }}" class="brand-logo"><img src="/frontend/img/logo.jpg" alt="logo"></a>

        <ul class="right hide-on-med-and-down">
            <li><a href="{{ route('frontend.home') }}">Acasa</a></li>
            <li><a href="{{ route('frontend.produse') }}">Produse</a></li>
            <li><a href="#">Despre Noi</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav" style="z-index: 1000000;">
            <li><a href="{{ route('frontend.home') }}">Acasa Mobil</a></li>
            <li><a href="{{ route('frontend.produse') }}">Produse Mobil</a></li>
            <li><a href="#">Despre Noi</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>