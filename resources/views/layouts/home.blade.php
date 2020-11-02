<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Green Rich Wide Investment - @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('home/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('home/css/paper-kit.css?v=2.2.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('home/demo/demo.css')}}" rel="stylesheet" />
  <style>
      .description {
          font-weight: 500;
      }
  </style>

</head>
<body class="landing-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('home/logo.jpeg') }}" width="30" height="30" class="align-top" alt="">
            <span>Green Rich Wide Investment</span>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}/#about" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Register" data-placement="bottom" href="{{ route('login') }}">
              <i class="fa fa-user"></i>
              <p class="d-lg-none">Login</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
@yield('content')
<div class="section section-dark text-center">
    <div class="container">
      <h2 class="title" style="font-weight: 800">We Partner with the following companies</h2>
      <div class="row">
        <div class="col-md-4">
          <img src="{{ asset('master_card.png') }}" height="150" />
          <img src="{{ asset('visa.png') }}" height="150" />
        </div>
        <div class="col-md-4">
            <img src="{{ asset('verve.jpg') }}" height="150" />
            <img src="{{ asset('cmc.png') }}" height="150" />
        </div>
      </div>
    </div>
  </div>
  <footer class="footer" style="background-color: black">
    <div class="container">
      <div class="row">
        <nav class="footer-nav">
          <ul>
            <li>
              <a href="{{ route('home') }}/#about">About Us</a>
            </li>
            <li>
              <a href="{{ route('home') }}">Contact Us</a>
            </li>
            <li>
              <a href="{{ route('register') }}">Get Started</a>
            </li>
          </ul>
        </nav>
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="fa fa-heart heart"></i> by Green Rich Wide Team
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('home/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('home/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('home/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('home/js/plugins/bootstrap-switch.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('home/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{ asset('home/js/plugins/moment.min.js')}}"></script>
  <script src="{{ asset('home/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('home/js/paper-kit.js?v=2.2.0')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
</body>

</html>
