<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Jost:wght@300;400;500;600;700&family=Outfit:wght@100&display=swap"
        rel="stylesheet">
        
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <script src="{{ asset('js/tailwindcss.3.4.1') }}"></script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
            font-family: 'Jost', sans-serif;
            font-family: 'Outfit', sans-serif;
        }
    </style>
    @yield('style')
</head>

<body>
    @yield('content')

    @yield('script')
</body>

</html>
