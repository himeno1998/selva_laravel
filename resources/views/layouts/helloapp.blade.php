<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>
<body>
    <h1>@yield('title')</h1>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
