<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="/css/app.css">
    {{-- <script language="JavaScript" type="text/javascript" src="/js/jquery-2.1.3.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-1.13.1.js"></script> --}}
    {{-- <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> --}}
    <script src="/js/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script type="text/javascript" src="../../../public/js"></script>
    @yield('head')

    <link href="{{ asset('sass/app.scss') }}" rel="stylesheet">
</head>
<body>
@include('partials.navbar')

@yield('content')

</body>
</html>
