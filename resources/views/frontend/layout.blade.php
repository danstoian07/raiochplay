@include('frontend.partials.head')
<body>
@include('frontend.partials.nav')

@yield('content')

@include('frontend.partials.footer')

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/frontend/js/materialize.js"></script>
<script src="/frontend/js/init.js"></script>

@yield('footer-scripts')

</body>
</html>
