@extends("landing_template_2")

@section("content")


<style>

    #demo{
        width: 100%;
        height: calc(100vh - 190px) !important;
        height: -moz-calc(100vh - 190px) !important;
        height: -webkit-calc(100vh - 190px) !important;
    }

    #demo .carousel-inner .carousel-item img{
        width: 100%;
        overflow: hidden;
    }

    #demo .carousel-indicators{
        margin-bottom: 0.5rem;
    }

    #demo #register_now{
        ffont-family: 'DM Sans', sans-serif;
        font-weight: bold;
        position: absolute;
        color: #fff;
        letter-spacing: 3px;
        background-color: #221f1f;
        padding: 1vw 2vw;
        border-radius: 3vw;
        font-size: 1.5vw;
        margin-left: 33%;
        margin-top: -18.5%;
    }

    #demo ul.carousel-indicators li{
        background-color: rgb(255,255,0);
    }

    #demo ul.carousel-indicators li.active {
        background-color: rgb(0,0,0);
    }

    @media (max-width: 992px) {

        #slider{
            padding-top: 0px;
            height: auto;
        }
        #demo{
            width: 100%;
            height: auto !important;
        }
        #demo #register_now{
            letter-spacing: 2px;
        }
    }

    @media (max-width: 576px) {
        #demo #register_now{
            letter-spacing: 1px;
        }
    }

    #organizer{
        padding: 20px 0px;
    }
</style>


<section id="slider">

    <div id="demo" class="carousel slide" data-ride="carousel">

        <?php
        $Data = \App\Slider::where('display', 'Yes')->orderBy('serial', 'asc')->get();
        ?>

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <?php
            foreach ($Data as $key => $value) {
                ?>
                <li data-target="#demo" data-slide-to="{{$key}}" class="{{!($key)? 'active':''}}"></li>
                <?php
            }
            ?>

        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            foreach ($Data as $key => $value) {
                ?>
                <div class="carousel-item {{!($key)? 'active':''}}">
                    <img src="{{asset('assets/slider/'.$value->file)}}" alt="BIG-2020">
                </div>
                <?php
            }
            ?>


        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        <a href="{{route('register')}}" id="register_now">APPLY NOW</a>


        <div class="col-12" id="countdown_section">
            <div class="timer">
                <h3 class="day">00</h3>
                <p>Day</p>
            </div>
            <div class="timer">
                <h3 class="hour">00</h3>
                <p>Hour</p>
            </div>
            <div class="timer">
                <h3 class="min">00</h3>
                <p>Min</p>
            </div>
            <div class="timer">
                <h3 class="sec">00</h3>
                <p>Sec</p>
            </div>
        </div>

    </div>



</section>



<!-- ======= Clients Section ======= -->
<section class="section-bg" id="organizer" >
    <div class="container">

        <div class="row ">
            <div class="col-12 d-flex justify-content-center" >
                <div>
                    <a href="javascript:;"><img src="assets/logo/digital-bd.png" alt=""></a>
                </div>
                <div>
                    <a href="https://ictd.gov.bd/" target="_blank"><img src="assets/organizer/ict.png" alt=""></a>

                </div>    
                <div>
                    <a href="https://bcc.gov.bd/" target="_blank"><img src="assets/organizer/bcc.png"  alt=""></a>
                </div>
                <div>
                    <a href="#" target="_blank"><img src="assets/organizer/idea.png" alt=""></a>
                </div>
            </div>





        </div>

    </div>
</section><!-- End Clients Section -->


<style>

    #countdown-mobile{
        padding: 20px;
    }
    #countdown-mobile::after{
        background-image:  url(/assets/bg/bg-image.jpg);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        opacity: 0.1;
        content: "";

        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: -1;   
    }


    #countdown_mobile_section .timer{
        width: 70px;
        padding: 5px 5px;
        background-color: rgb(255,236,29);
        margin: 5px;
        border-radius: 10px;
        display: inline-block;
    }

    #countdown_mobile_section .timer h3,#countdown_mobile_section .timer p{
        text-align: center;
        margin: 0px auto;
    } 

    #countdown_mobile_section .timer h3{
        font-size: 1.5rem;
        font-family: 'Lato', sans-serif;
        font-weight: 900;
    }

    #countdown-mobile{
        display: none;
    }
</style>


<section id="countdown-mobile">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center" id="countdown_mobile_section">
                <div class="timer">
                    <h3 class="day">00</h3>
                    <p>Day</p>
                </div>
                <div class="timer">
                    <h3 class="hour">00</h3>
                    <p>Hour</p>
                </div>
                <div class="timer">
                    <h3 class="min">00</h3>
                    <p>Min</p>
                </div>
                <div class="timer">
                    <h3 class="sec">00</h3>
                    <p>Sec</p>
                </div>
            </div>
        </div>
    </div>

</section>


<section id="at_a_glance">
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center" style=" margin-top: 0.5em; margin-bottom: 50px">THE BIGGEST INITIATIVE OF THE YEAR FOR THE STARTUP</h1>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3 data-toggle="counter-up">13</h3>
                                <p class=" text-secondary">TV Episodes</p>
                                <img src="assets/icon/tv.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3 data-toggle="counter-up">100</h3>
                                <p class=" text-secondary">Startup Funds</p>
                                <img src="assets/icon/fund.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3>100K</h3>
                                <p class=" text-secondary">USD Award</p>
                                <img src="assets/icon/event.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3>10+</h3>
                                <p class=" text-secondary">International Roadshow</p>
                                <img src="assets/icon/roadshow.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3 data-toggle="counter-up">8</h3>
                                <p class=" text-secondary">Divisional Activation</p>
                                <img src="assets/icon/campus.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="glance">
                                <h3 data-toggle="counter-up">4</h3>
                                <p class=" text-secondary">Days Boot Camp</p>
                                <img src="assets/icon/training.png" class=" img-fluid"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="go_big" class=" section-bg">
    <div class="container">
        <div class="row" style="padding-top: 0.5em">
            <div class="col-md-6 go-big-content">
                <h1>GO BIG</h1>
                <p style="margin-top: 2em">
                    BIG is a platform for the future entrepreneurs and aspiring young minds of the country to motivate, recognize and share their innovations in a national and international level for the brighter future of Bangladesh. Young minds such as students, young professionals will be able to share their innovation and ideas in the field of information and technology. 36 startups will be selected through the competition. Among them top one(01) startup will get 100,000 USD and the rest thirty five(35) startups will get 10,00,000 BDT grant from Innovation Design and Entrepreneurship Academy (iDEA) of Information and Communication Technology Division.
                </p>
                <p>&nbsp;</p>
                <!--                <a href="#" class="read-more">Read More</a>-->
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/img/go-big-image.png" class="img-fluid"/>
            </div>
        </div>
    </div>
</section>

<!--<section id="why_perticipate">
    <div class=" container">
        <div class="row" style=" margin-top: 0.5em">
            <div class="col-12">
                <h1 class=" text-center">LET US HELP YOUR BUSINESS GROW</h1>
            </div>
        </div>

        <div class="row" style="margin-top: 2em" >

            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Funding</h3>
                    <p>
                        Startup Bangladesh – iDEA provides
                        pre- seed (idea), seed and growth stage
                        fund to startups. Depending on the stage,
                        it can be up to 5 Crore BDT.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Mentoring</h3>
                    <p>
                        Startup Bangladesh – iDEA provides
                        mentoring to its portfolio startups by
                        a pool of expert mentors from various
                        sectors.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Networking</h3>
                    <p>
                        Startup Bangladesh – iDEA collaborates
                        with national and international
                        stakeholders who are working with startups
                        and arrange sessions among them.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Academic Program</h3>
                    <p>
                        The iDEA academy provides different
                        courses to train up entrepreneurs
                        working in different industries. The
                        academy provides long term and short
                        -term courses.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Legal & IP Support</h3>
                    <p>
                        Startup Bangladesh – iDEA guides and
                        helps startups to protect their legal and
                        intellectual property rights.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="participate-content">
                    <h3>Co-working Space</h3>
                    <p>
                        Startup Bangladesh – iDEA has a great
                        co-working space for startups. 51 desks
                        have been furnished for the startups.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>-->



<!-- ======= Counts Section ======= -->
<section id="advisory_board">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center" >
                <div class="embed-responsive embed-responsive-16by9" id="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/zisVdDBG0wg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!--        <div class="row" style="margin:100px 0px">
                    <div class="col-12">
                        <h1 class="text-center">ADVISORY BOARD</h1>
                    </div>
                </div>
                <div class="row text-center" id="advisors">
                    <div class="col-md-4">
                        <div class="advisor">
                            <img src="assets/img/team/team-1.jpg" class="rounded-circle"/>
                            <h3>Walter White</h3>
                            <p>Chief Executive Officer</p>
                            <div class="advisor-social">
                                <a href="https://www.facebook.com/Bangabandhu-Innovation-Grant-BIG-101241788454724" ><img src="assets/icon/Facebook.png"/></a>
                                <a href="#"><img src="assets/icon/Twitter.png"/></a>
                                <a href="https://www.instagram.com/GOBIGWITHBIG2020/" ><img src="assets/icon/Instagram.png"/></a>
                                <a href="#" ><img src="assets/icon/Linkedin.png"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="advisor">
                            <img src="assets/img/team/team-2.jpg" class="rounded-circle"/>
                            <h3>Walter White</h3>
                            <p>Chief Executive Officer</p>
                            <div class="advisor-social">
                                <a href="https://www.facebook.com/Bangabandhu-Innovation-Grant-BIG-101241788454724"><img src="assets/icon/Facebook.png"/></a>
                                <a href="#"><img src="assets/icon/Twitter.png"/></a>
                                <a href="https://www.instagram.com/GOBIGWITHBIG2020/" ><img src="assets/icon/Instagram.png"/></a>
                                <a href="#"><img src="assets/icon/Linkedin.png"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="advisor">
                            <img src="assets/img/team/team-3.jpg" class="rounded-circle"/>
                            <h3>William Anderson</h3>
                            <p>Chief Executive Officer</p>
                            <div class="advisor-social">
                                <a href="https://www.facebook.com/Bangabandhu-Innovation-Grant-BIG-101241788454724" ><img src="assets/icon/Facebook.png"/></a>
                                <a href="#"><img src="assets/icon/Twitter.png"/></a>
                                <a href="https://www.instagram.com/GOBIGWITHBIG2020/" ><img src="assets/icon/Instagram.png"/></a>
                                <a href="#"><img src="assets/icon/Linkedin.png"/></a>
                            </div>
                        </div>
                    </div>
                </div>-->


        <div class="row " style="padding-top: 50px;">

            <div class="col-12"  id="brand">
                
                
                <div class="brand-img"><a href="https://moi.gov.bd/" target="_blank"><img src="assets/brand/doict.jpg" alt=""></a></div>
                <div class="brand-img"><a href="http://bhtpa.gov.bd/" target="_blank"><img src="assets/brand/high-tech-park.jpg"  alt=""></a></div>
                <div class="brand-img"><img src="assets/brand/cca.jpg"  alt=""></div>
                <div class="brand-img"><a href="https://a2i.gov.bd/" target="_blank"><img src="assets/brand/a2i-new.jpg"  alt=""></a></div>
                
                <div class="brand-img"><a href="https://startupbangladesh.gov.bd/" target="_blank"a><img src="assets/brand/STARTUP-LOGO.png" alt=""></a></div>
                <div class="brand-img"><a href="https://basis.org.bd/" target="_blank"><img src="assets/brand/basis.jpg"  alt=""></a></div>
                <div class="brand-img"><img src="assets/brand/bcs.jpg"  alt=""></div>
                <div class="brand-img"><img src="assets/brand/bacco.jpg"  alt=""></div>
                <div class="brand-img"><a href="https://e-cab.net/" target="_blank"><img src="assets/brand/e-cab.jpg" alt=""></a></div>
                <div class="brand-img"><img src="assets/brand/ispab.jpg"  alt=""></div>
                <div class="brand-img"><img src="assets/brand/bisf.jpg"  alt=""></div>
            </div>


        </div>


    </div>
</section>

<section id="contact_us">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h1 style="text-align: center">CONTACT US</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact">
                            <i class="icofont-google-map"></i>
                            <h3> Address: </h3>
                            <p id="google_map" style="cursor: pointer">
                                Innovation Design and Entrepreneurship Academy (iDEA) project<br/>
                                Bangladesh Computer Council (BCC)<br/> ICT Division<br/>
                                Government of the People's Republic of Bangladesh<br/>

                                E-14/X, ICT Tower (14<sup>th</sup> Floor), Agargaon, Dhaka - 1207.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact">
                            <i class="icofont-envelope"></i>
                            <h3>Email:</h3>
                            <p><a href="mailto:info@big.gov.bd" style="color: #000">info@big.gov.bd</a><br/><a href="mailto:iquery@big.gov.bd" style="color: #000">iquery@big.gov.bd (For international participant)</a></p>
                        </div>
                        <div class="contact">
                            <i class="icofont-phone"></i>
                            <h3>Call:</h3>
                            <p><a href="tel:+8809638200400">+88 09638 200 400</a></p>
                        </div>
                        <div class="contact">
                            <i class="icofont-web"></i>
                            <h3>Website:</h3>
                            <p><a href="https://startupbangladesh.gov.bd/" target="_blank">www.startupbangladesh.gov.bd</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">

                    </div>
                </div>






            </div>
            <!--            <div class="col-md-8">
                            <div class="row">
                                <div class="col-12">
                                    <form id="message_form" onsubmit="return false;">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" placeholder="Full Name"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" placeholder="Email Address"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" placeholder="Subject"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <input type="submit" value="SEND MESSAGE">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>-->
        </div>
    </div>
</section>


<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255,255,0)">
                <h5 class="modal-title" id="exampleModalLabel">FIND US IN GOOGLE MAP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer" style="background-color: rgb(255,255,0)">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





@endsection