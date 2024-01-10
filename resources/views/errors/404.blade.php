<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&family=Jost:wght@300;400;500;600;700&family=Outfit:wght@100&display=swap"
        rel="stylesheet">
        <script src="{{ asset('js/tailwindcss.3.4.1') }}"></script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
            font-family: 'Jost', sans-serif;
            font-family: 'Outfit', sans-serif;
        }
    </style>
    <title>404 - Page Not Found</title>
    <style>
        /* public/css/404.css (Adjust the path based on your project structure) */

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }

        .error-container {
            text-align: center;
            color: #333;
        }

        h1 {
            font-size: 6rem;
            margin: 0;
        }

        p {
            font-size: 1.5rem;
            margin-top: 0.5rem;
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background-color: #3490dc;
            border-radius: 0.25rem;
        }

        .btn:hover {
            background-color: #2779bd;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1 class="animate__animated animate__fadeInDown">404</h1>
        <p class="animate__animated animate__fadeInDown">Oops! Page not found.</p>
        <a href="{{ url('/create') }}" class="btn animate__animated animate__fadeInUp">Go to Home</a>
    </div>
</body>

</html>
