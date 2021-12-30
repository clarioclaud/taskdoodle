<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>E-Library</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
 <!-- <link href="{{ asset('frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Template Name: PersonalLanding
    Template URL: https://templatemag.com/personallanding-bootstrap-landing-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>

  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#home" class="smoothscroll">E-Library</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home" class="smoothscroll">Home</a></li>
          @auth
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          @else
          <li><a href="{{ route('login') }}" >Login</a></li>
          @endauth
          <li><a href="{{ route('register') }}" >Register</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

    @yield('index')



  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>E-Library</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/personallanding-bootstrap-landing-template/
          Licensing information: https://templatemag.com/license/
        -->
        
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('frontend/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/php-mail-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('frontend/js/main.js')}}"></script>

</body>
</html>