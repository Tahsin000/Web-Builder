<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Jost:wght@300;400;500;600;700&family=Outfit:wght@100&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/tailwindcss.3.4.1') }}"></script>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    @yield('css_content')

    <style>
        * {
            font-family: 'Inter', sans-serif;
            font-family: 'Jost', sans-serif;
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body>
    @include('Layout.nav')
    @yield('auth_content')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    @yield('script_content')
</body>

</html>
