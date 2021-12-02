<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>BIG: BANGABANDHU INNOVATION GRANT</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('assets/img/BIG_ICON.png')}}" rel="icon">
        <link href="{{asset('assets/img/BIG_ICON.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('assets/vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style_1.css')}}" rel="stylesheet">

        <style>
            .hero-container img {
                width: 100%;
            }
        </style>

        <!-- =======================================================
        * Template Name: Valera - v2.1.0
        * Template URL: https://bootstrapmade.com/valera-free-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>



        <!-- ======= Header ======= -->
        <header id="header" style="background: rgba(255, 255, 255, 1) linear-gradient(rgba(255, 255, 255, 0.7) 0%, rgba(255, 255, 255, 0.5) 100%) repeat scroll 0% 0%">
            <div class="container-fluid d-flex align-items-center justify-content-between">

                <h1 class="logo"><a href="/"><img src="{{asset('assets/img/BIG.png')}}"/></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li> <!-- class="active" --> <a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/big-grant">Big Grant</a></li>
                        <li><a href="#">Startups</a></li>
                        <li class="drop-down"><a href="">Resources</a>
                            <ul>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Publications</a></li>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Videos</a></li>
                            </ul>
                        </li>

                        <li class="drop-down"><a href="javascript:;">Register</a>
                            <ul>
                                <li><a href="/national-register">National</a></li>
                                <li><a href="/international-register">International</a></li>
                            </ul>
                        </li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="{{route('login')}}" class=" border" style=" padding: 10px 15px">Login</a></li>
                        <!--<li class="drop-down"><a href="">Drop Down</a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="drop-down"><a href="#">Deep Drop Down</a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                            </ul>
                        </li> -->

                    </ul>
                </nav><!-- .nav-menu -->

                <div class="header-social-links">
                    <a href="{{url('/')}}/bn" >BN</a>
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="https://www.facebook.com/Bangabandhu-Innovation-Grant-BIG-101241788454724" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/GOBIGWITHBIG2020/" class="instagram"><i class="icofont-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
                </div>

            </div>
        </header><!-- End Header -->
        <!-- ======= Hero Section ======= -->
        <section id="hero"style="padding: 0">
            <div class="hero-container">

                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('assets/img/slider/01.jpg')}}" alt="1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('assets/img/slider/02.jpg')}}" alt="2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('assets/img/slider/03.jpg')}}" alt="3">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
                <!--                <video autoplay muted loop id="myVideo">
                                    <source src="big-led-13-10-2019_1.mp4" type="video/mp4">
                                </video>-->
            </div>
        </section><!-- End Hero -->

        <main id="main">
            @yield("content")
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">

                <div class="container">

                    <div class="row  justify-content-center">
                        <div class="col-lg-6">
                            <h3>BIG: BANGABANDHU INNOVATION GRANT </h3>
                            <!-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>-->
                        </div>
                    </div>

                    <div class="row footer-newsletter justify-content-center">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="https://www.facebook.com/Bangabandhu-Innovation-Grant-BIG-101241788454724" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/GOBIGWITHBIG2020/" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>

                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>BIG: BANGABANDHU INNOVATION GRANT </span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Powered by <strong><span>ICT Division</span></strong>.
                </div>
            </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
        <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>

    </body>

</html>