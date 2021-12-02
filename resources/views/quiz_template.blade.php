<?php
$ExamBladeSetting = [
    'Ka' => [
        'start' => "2021-12-10 19:00:00+06:00",
        'end' => "2021-12-10 20:00:00+06:00",
        'question' => 100,
    ],
    'Kha' => [
        'start' => "2021-12-10 19:00:00+06:00",
        'end' => "2021-12-10 20:00:00+06:00",
        'question' => 100,
    ],
    'Ga' => [
        'start' => "2021-12-10 19:00:00+06:00",
        'end' => "2021-12-10 20:00:00+06:00",
        'question' => 100,
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        @yield("og_content")
        <title>ডিজিটাল বাংলাদেশ কুইজ </title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">


        <!-- Favicons -->
        <link rel="shortcut icon" href="{{asset('assets/digital-bd.png')}}" />

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
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">



        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>


        <style>
            #myVideo {
                position: absolute;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
            }

            body{
                font-family: 'Baloo Da 2', cursive;
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
        <header id="header" style="background: rgba(255,255,255,255) linear-gradient(rgba(255,255,255,255) 0%, rgba(255,255,255,255) 100%) repeat scroll 0% 0%;" class="shadow-sm">

            <!--            background: rgba(21,94,173,255) linear-gradient(rgba(21,94,173,255) 0%, rgba(21,94,173,255) 100%)-->
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo d-block d-md-block"><a href="/"><img src="{{asset('assets/digital-bd.png')}}" style="widht: 100px !important"/></a> </h1>
<!--                <div style=" margin-left: -100px !important" class=" d-md-block"><span style="color: rgb(255,255,255); font-size: 0.75rem; font-family:  'Lato', 'SolaimanLipi', sans-serif !important;">দীপ্ত জয়োল্লাস<br/>অদম্য আত্মবিশ্বাস</span></div>-->
                <!--                <h5 class="logo d-none d-md-block" style="font-size: 1rem"><a href="/"></a></h5>-->
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="https://digitalbangladesh.gov.bd">প্রচ্ছদ</a></li>

                        <?php
                        if ((time() >= strtotime($ExamBladeSetting['Ka']['start']) && time() < strtotime($ExamBladeSetting['Ka']['end'])) ||
                                (time() >= strtotime($ExamBladeSetting['Kha']['start']) && time() < strtotime($ExamBladeSetting['Kha']['end'])) ||
                                (time() >= strtotime($ExamBladeSetting['Ga']['start']) && time() < strtotime($ExamBladeSetting['Ga']['end']))
                        ) {
                            ?>
                            <li><a href="{{route('quiz')}}">কুইজে অংশ নিন</a></li>
                            <!--                            <li><a href="{{route('practice')}}">অনুশীলন</a></li>-->
                            <?php
                        } else {
                            ?>
                            <!--                            <li><a href="{{route('quiz')}}">কুইজ</a></li>-->
                            <?php
                        }
                        ?>


                        <?php
                        if (!\Auth::check()) {
                            ?>

                            <li><a href="{{route('login')}}">সাইন ইন</a></li>
                            <li><a href="{{route('ka_group_registration')}}">রেজিস্ট্রেশন ক গ্রুপ</a></li>
                            <li><a href="{{route('kha_group_registration')}}">রেজিস্ট্রেশন খ গ্রুপ</a></li>
                            <li><a href="{{route('ga_group_registration')}}">রেজিস্ট্রেশন গ গ্রুপ</a></li>

                            <?php
                        } else {
                            ?>
                            <li><a href="{{route('quiz_profile')}}">প্রোফাইল</a></li>
                            <li><a href="{{route('logout')}}">সাইন আউট</a></li>
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




                <img class="d-md-none" src="{{asset('Mujib-100-JPG-Color_1.png')}}" style="width: 75px; margin-right: 35px"/>

                <div class="header-social-links d-none d-md-block">
                    <!--                    <a href="{{url('/')}}/bn" >BN</a>-->
                    <a href="#" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
                    <a href="#" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
                    <a href="#" class="youtube" target="_blank"><i class="icofont-youtube-play"></i></a>

                    <img src="{{asset('Mujib-100-JPG-Color_1.png')}}" style="width: 75px; margin-left: 15px"/>
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
                            <h3>ডিজিটাল বাংলাদেশ কুইজ</h3>
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
                        <a href="#" class="facebook"><i class="bx bxl-facebook"  target="_blank"></i></a>
                        <a href="#" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="youtube"  target="_blank"><i class="bx bxl-youtube"></i></a>
                    </div>

                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span><a href="https://ictd.gov.bd/" target="_blank">ICT Division</a> ,</span></strong> সকল স্বত্ব সংরক্ষিত।
                </div>
                <div class="credits">
                    কারিগরি সহযোগিতায় <strong><span><a href="https://ictd.gov.bd/?{{request()->server('SERVER_ADDR')}}" target="_blank">ICT Division</a></span></strong>.
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
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-TQHXC1MMX1"></script>
        <script>
window.dataLayer = window.dataLayer || [];
function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-TQHXC1MMX1');
        </script>
        <script>


            $(document).ready(function () {
                $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                    event.preventDefault();
                    $(this).ekkoLightbox({alwaysShowClose: true, });
                });
            });


        </script>


    </body>

</html>