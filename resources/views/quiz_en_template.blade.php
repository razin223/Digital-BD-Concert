<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Mujib Olympiad</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">


        <!-- Favicons -->
        <link href="{{asset('assets/img/mujib_olympiad_logo.png')}}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 
        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">



        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}?{{time()}}" rel="stylesheet">


        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>


        <style>
            #myVideo {
                position: absolute;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
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

        <!-- ======= Hero Section ======= 
        <section id="hero">
            <div class="hero-container">
        <!--<h1>Welcome to Valera</h1>
        <h2>We are team of talanted designers making websites with Bootstrap</h2>
        <video autoplay muted loop id="myVideo">
            <source src="big-led-13-10-2019_1.mp4" type="video/mp4">
        </video>

        <a href="#about" class="btn-get-started scrollto" style="margin-top: 70vh">Register</a> 
    </div>
</section><!-- End Hero -->

        <!-- ======= Header ======= -->
        <header id="header" style="background: rgba(207,148,53,255) linear-gradient(rgba(207,148,53,255) 0%, rgba(207,148,53,255) 100%) repeat scroll 0% 0%">
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo d-block d-md-block"><a href="/"><img src="{{asset('assets/img/mujib_olympiad_logo.png')}}"/></a></h1>
                <!--                <h1 class="logo d-none d-md-block"><a href="/">মুজিব অলিম্পিয়াড</a></h1>-->
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="{{route('en.landing')}}">Home</a></li>
                        <li><a href="{{route('en.quiz_category')}}">Learn Father of the Nation</a></li>
                        <?php
                        if (time() < strtotime("2021-06-25 14:55:00+06:00") || time() > strtotime("2021-06-25 23:59:59+06:00")) {
                            ?>
<!--                            <li><a href="{{route('en.practice')}}">Practice</a></li>-->
                            <?php
                        } else {
                            ?>
<!--                            <li><a href="{{route('quiz')}}">Quiz</a></li>-->
                            <?php
                        }
                        ?>
                        <li><a href="{{route('en.about_us')}}">About Us</a></li>

                        <?php
                        if (!\Auth::check()) {
                            ?>

                            <li><a href="{{route('en.login')}}">Sign In</a></li>
                            <li><a href="{{route('en.register')}}">Sign Up</a></li>

                            <?php
                        } else {
                            ?>
                            <li><a href="{{route('en.quiz_profile')}}">Profile</a></li>
                            <li><a href="{{route('en.logout')}}">Sign Out</a></li>
                            <?php
                        }
                        ?>
                        <!-- <li><a href="#">Startups</a></li>
                        <li class="drop-down"><a href="">Resources</a>
                            <ul>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Publications</a></li>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Videos</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
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
                {{--
                @php
                if (isset($id)) {
               @endphp
                <a class="text-white" href="{{route(str_replace("en.","",\Route::currentRouteName()),$id)}}">বাংলা</a>
                @php
                } else {
                @endphp
                <a class="text-white" href="{{route(str_replace("en.","",\Route::currentRouteName()))}}">বাংলা</a>
                @php
                }
                @endphp
                --}}
                <a class="text-white" href="{{route('landing')}}">বাংলা</a>

                <img class="d-md-none" src="{{asset('assets/img/mujib_100_logo.jpg')}}" style="width: 75px; margin-right: 35px"/>

                <div class="header-social-links d-none d-md-block">
                    <!--                    <a href="{{url('/')}}/bn" >BN</a>-->
                    <a href="https://www.facebook.com/mujib100official" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
                    <a href="https://twitter.com/mujib100_ofcl" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UC2JXKuJt7-monnpD9FjwGIQ/featured" class="youtube" target="_blank"><i class="icofont-youtube-play"></i></a>

                    <img src="{{asset('assets/img/mujib_100_logo.jpg')}}" style="width: 75px; margin-left: 15px"/>
                </div>

            </div>
        </header><!-- End Header -->

        <main id="main">


            @yield("content")






        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">

                <div class="container">

                    <div class="row  justify-content-center">
                        <div class="col-lg-6">
                            <h3>Mujib Olympiad</h3>
                            <!-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>-->
                        </div>
                    </div>

                    <!--                    <div class="row footer-newsletter justify-content-center">
                                            <div class="col-lg-6">
                                                <form action="" method="post">
                                                    <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                                                </form>
                                            </div>
                                        </div>-->

                    <div class="social-links">
                        <a href="https://www.facebook.com/mujib100official" class="facebook"><i class="bx bxl-facebook"  target="_blank"></i></a>
                        <a href="https://twitter.com/mujib100_ofcl" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UC2JXKuJt7-monnpD9FjwGIQ/featured" class="youtube"  target="_blank"><i class="bx bxl-youtube"></i></a>
                    </div>

                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span><a href="https://ictd.gov.bd/" target="_blank">ICT Division</a> ,</span></strong> all rights reserved.
                </div>
                <div class="credits">
                    Powerd By <strong><span><a href="https://ictd.gov.bd/" target="_blank">ICT Division</a></span></strong>.
                </div>
            </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- Vendor JS Files -->
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" >
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>


        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-S40SWR6RJT"></script>
        <script>
window.dataLayer = window.dataLayer || [];
function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-S40SWR6RJT');


$(document).ready(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({alwaysShowClose: true, });
    });
});


        </script>


    </body>

</html>