<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')</title>
</head>

<body>
    
@guest

    <header>
        @yield('header')
    </header>
    <main class="container">
        @yield('content')
    </main>

@endguest

@auth
<div class="d-flex">
<header>
        @yield('header')
    </header>
    <main class="container">
        @yield('content')
    </main>
</div>
@endauth


    <footer>
        @yield('footer')
    </footer>
</body>




</html>