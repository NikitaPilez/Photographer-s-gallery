<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#000000">

  <title>Kirill Bukrey</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!--  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'> -->
  <link href="css/grayscale.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="img/main.jpg" />

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger light-hover" href="{{asset('/')}}">@lang('dictionary.home')</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu 
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('models')}}">@lang('dictionary.models')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('contacts')}}">@lang('dictionary.contacts')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('reviews')}}">@lang('dictionary.reviews')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('services')}}">@lang('dictionary.services')</a>
          </li>
          @if(App::getLocale() == 'en')
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('setlocale/ru')}}">
               @lang('dictionary.ru')
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger light-hover" href="{{asset('setlocale/en')}}">
               @lang('dictionary.en')
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  @section('scripts')
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script> -->
  <script src="js/grayscale.js"></script>
  <script src="js/myscript.js"></script>
  <script src="js/lightbox.js"></script>
  @show

</body>

</html>
