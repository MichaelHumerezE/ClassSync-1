<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ClassSync</title>
    <link rel="icon" type="image/x-icon" href="{{ url('assets/icon.png')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" / <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="app" class="wrapper">
        @auth
            @include('layouts.sidebar')
        @endauth

        <div id="content">
            @include('layouts.partials.navbar')
            <main class="container">
                @include('components.flash_alerts')
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
