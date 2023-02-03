<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTAL IT</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/portal.css')}}">

    <link rel="shortcut icon" href="{{asset('images/favic.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
<body>
<div class="cursor-1"></div>
<div class="cursor-2"></div>
<div id="menu-bars" class="fas fa-bars"></div>
    
<header>
@include('nav.sidebar')
</header>

<section class="service" id="service"> 
@yield('content')
</section>

<footer>
    @include('footer.footer')
</footer>
<script src="{{ asset('/js/portal.js') }}"></script>
@stack('js')
</body>
</html>