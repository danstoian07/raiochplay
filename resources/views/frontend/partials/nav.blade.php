<nav class="nav" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ route('frontend.home') }}" class="brand-logo"><img src="/frontend/img/logo.jpg" alt="logo"></a>

        <ul class="right hide-on-med-and-down">
            <li><a href="{{ route('frontend.home') }}">Acasa</a></li>
            <li><a href="{{ route('frontend.produse') }}">Produse</a></li>
            <li><a href="{{ route('frontend.despre-noi') }}">Despre Noi</a></li>
            <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="{{ route('frontend.home') }}"><i class="material-icons">home</i> Acasa</a></li>
            <li><a href="{{ route('frontend.produse') }}"><i class="material-icons">store_mall_directory</i> Produse</a></li>
            <li><a href="{{ route('frontend.despre-noi') }}"><i class="material-icons">perm_identity</i> Despre Noi</a></li>
            <li><a href="{{ route('frontend.contact') }}"><i class="material-icons">mail_outline</i> Contact</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>