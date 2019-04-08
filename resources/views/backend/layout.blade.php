@include('backend.partials.head')

<body class="theme-deep-orange">

@include('backend.partials.loader')

@include('backend.partials.topbar')

@include('backend.partials.sidebar')


@yield('content')


@include('backend.partials.footer')

</body>
</html>