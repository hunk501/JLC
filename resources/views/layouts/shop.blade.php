<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <title>JLC - Construction Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/camera.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/camera.css') }}" rel="stylesheet" />

  <!-- Theme skin -->
  <link href="{{ asset('color/default.css') }}" rel="stylesheet" />
  <style>
  .modal.fade.in {
    top: 30%;
  }
  </style>


  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('ico/apple-touch-icon-144-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('ico/apple-touch-icon-114-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('ico/apple-touch-icon-72-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" href="{{ asset('ico/apple-touch-icon-57-precomposed.png') }}" />
  <link rel="shortcut icon" href="{{ asset('ico/favicon.png') }}" />

  <!-- =======================================================
    Theme Name: Eterna
    Theme URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  <div id="wrapper">

    <!-- start header -->
    <header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span6">
              <p class="topcontact"><i class="icon-phone"></i> +62 088 999 123</p>
            </div>
            <div class="span6">

              <ul class="social-network">                
                <li>
                  <a href="{{ url('/cart') }}" data-placement="bottom" title="My Cart">
                  <i class="icon-shopping-cart icon-white"></i> 
                  <span class="badge">{{ (session('total_qty') ? session('total_qty') : 0) }}</span>
                  </a>
                </li>
                <li><a href="{{ url('/login') }}" class="icon-white">My Account</a></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <div class="row nomargin">
          <div class="span4">
            <div class="logo">
              <!-- <a href="index.html"><img src="img/logo.png" alt="" /></a> -->
              <a href="{{ url('/') }}"><i class="ico icon-circled icon-bgdark icon-laptop active icon-3x"></i></a>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li class="dropdown {{ (!empty($page_name) && $page_name=='home')?'active':'' }} ">
                      <a href="{{ url('/') }}"><i class="icon-home"></i> Home</a>
                    </li>
                    <li class="dropdown {{ (!empty($page_name) && $page_name=='products')?'active':'' }} ">
                      <a href="{{ url('products') }}"><i class="icon-list"></i> Products </a>                    
                    </li>
                    <li class="dropdown {{ (!empty($page_name) && $page_name=='rental')?'active':'' }} ">
                      <a href="{{ url('rental') }}"><i class="icon-list"></i> Rental </a>
                    </li>
                    <li class="dropdown">
                      <a href="{{ url('/') }}"><i class="icon-home"></i> Services</a>
                    </li>
                    <li class="dropdown">
                      <a href="{{ url('/') }}"><i class="icon-home"></i> Design</a>
                    </li>
                    <li class="dropdown">
                      <a href="{{ url('/') }}"><i class="icon-home"></i> Projects</a>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    @yield('breadcrumb')

    @yield('content')

    <footer>
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Browse pages</h5>
              <ul class="link-list">
                <li><a href="#">Our company</a></li>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#icon-rocket icon-white">Privacy policy</a></li>
                <li><a href="#">Press release</a></li>
                <li><a href="#">What we have done</a></li>
                <li><a href="#">Our support forum</a></li>
              </ul>

            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Get in touch</h5>
              <address>
							<strong>JLC.</strong><br>
							Somestreet 200 VW, Suite Village A.001<br>
							Jakarta 13426 Indonesia
						</address>
              <p>
                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                <i class="icon-envelope-alt"></i> email@domainname.com
              </p>
            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Subscribe newsletter</h5>
              <p>
                Keep updated for new releases and freebies. Enter your e-mail and subscribe to our newsletter.
              </p>
              <form class="subscribe">
                <div class="input-append">
                  <input class="span2" id="appendedInputButton" type="text">
                  <button class="btn btn-theme" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p><span>&copy; JLC. All right reserved</span></p>
              </div>

            </div>

            <div class="span6">
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Eterna
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->  
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  <script src="{{ asset('js/modernizr.custom.js') }}"></script>
  <script src="{{ asset('js/toucheffects.js') }}"></script>
  <script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>
  <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>

  <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('js/portfolio/jquery.quicksand.js') }}"></script>
  <script src="{{ asset('js/portfolio/setting.js') }}"></script>

  <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('js/animate.js') }}"></script>
  <script src="{{ asset('js/inview.js') }}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset('js/custom.js') }}"></script>

  @if(!empty($page_name) && $page_name == 'home')
  <script src="{{ asset('js/camera/camera.js') }}"></script>
  <script src="{{ asset('js/camera/setting.js') }}"></script>
  @endif


</body>

</html>
