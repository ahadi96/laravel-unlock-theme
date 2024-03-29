<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title',' Unlock theme')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free HTML5 Website Template by uicookies.com" />
    <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="uicookies.com" />
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark probootstrap-navabr-dark">
        <div class="container">
          <a class="navbar-brand" href="index.html">Unlock</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-nav" aria-controls="probootstrap-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="probootstrap-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{ url('/')}}" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
              <li class="nav-item"><a href="{{ url('services') }}" class="nav-link">Services</a></li>
              <li class="nav-item"><a href="{{ url('contact-us') }}" class="nav-link">Contact</a></li>
              <li class="nav-item probootstrap-cta probootstrap-seperator"><a href="#" class="nav-link">Sign up</a></li>
              <li class="nav-item probootstrap-cta"><a href="#" class="nav-link">Log In</a></li>
            </ul>
           
          </div>
        </div>
      </nav>

      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
     
      @yield('content')

    <footer class="probootstrap-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg mb-4"><h2 class="probootstrap-heading"><a href="#">Unlock</a></h2></div>
              <div class="col-lg">
                <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">Company</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">About</a></li>
                    <li><a href="#" class="py-2 d-block">Jobs</a></li>
                    <li><a href="#" class="py-2 d-block">Press</a></li>
                    <li><a href="#" class="py-2 d-block">News</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg">
                 <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">Communities</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Support</a></li>
                    <li><a href="#" class="py-2 d-block">Sharing is Caring</a></li>
                    <li><a href="#" class="py-2 d-block">Better Web</a></li>
                    <li><a href="#" class="py-2 d-block">News</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg">
                 <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">Useful links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Bootstrap 4</a></li>
                    <li><a href="#" class="py-2 d-block">jQuery</a></li>
                    <li><a href="#" class="py-2 d-block">HTML5</a></li>
                    <li><a href="#" class="py-2 d-block">Sass</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="probootstrap-footer-widget mb-4">
              <ul class="probootstrap-footer-social list-unstyled float-md-right float-lft">
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md text-left">
            <ul class="list-unstyled footer-small-nav">
              <li><a href="#">Legal</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Cookies</a></li>
              <li><a href="#">Terms</a></li>
              <li><a href="#">About</a></li>
            </ul>
          </div>
          <div class="col-md text-md-right text-left">
            <p><small>&copy; Unlock 2017. All Rights Reserved. <br> Made with <span class="icon-heart"></span> by <a href="https://uicookies.com/">uiCookies</a> Demo Images: Unsplash</small></p>
          </div>
        </div>
      </div>
    </footer>


    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>