<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | Elegant Lashes by Katie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/img/lady.jpg')}}" type="image/png">
    <meta name="description" content="Gaming Rewards">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
</head>
<body>
        <!-- <header>
            <a href="/"><img id="logo" src="/img/logo_colored_cropped.png" /></a>
        </header> -->

        <main>
            @yield('content')
        </main>

        @yield('scripts')
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>