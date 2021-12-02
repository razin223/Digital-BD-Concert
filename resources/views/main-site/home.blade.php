@extends("landing_template")

@section("content")


<style>
    .top-text h3{
        font-size: 2rem;
    }

    .top-text h3 a{
        font-size: 1.5rem;
    }


    @media screen and (max-width: 600px) {
        .top-text h3{
            font-size: 1rem;
        }

        .top-text h3 a{
            font-size: 0.75rem;
        }
    }
</style>


<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
    <div class="container-fluid">

        <div class="text-center top-text">
            <h3>REGISTRATION GOING ON  <a href="{{route('register')}}" class="btn btn-warning pull-right">Register</a></h3>
        </div>

    </div>
</section><!-- End Cta Section -->



<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg" style="padding-top: 60px">
    <div class="container">
        <div class="section-title">
            <h2>AT A GLANCE</h2>
        </div>

        <div class="row counters">

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">13</span>
                <p>TV Episode</p>
                <p class="text-center"><img src="assets/img/tv_show.png" style="width: 50px"/></p>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">100</span>
                <p>Startups Funded</p>
                <p class="text-center"><img src="assets/img/fund.png" style="width: 50px"/></p>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">30</span>
                <p>Events</p>
                <p class="text-center"><img src="assets/img/event.png" style="width: 50px"/></p>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">20</span>
                <p>Training/Workshop</p>
                <p class="text-center"><img src="assets/img/workshop.png" style="width: 50px"/></p>
            </div>
            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">120</span>
                <p>Campus Activation</p>
                <p class="text-center"><img src="assets/img/university.png" style="width: 50px"/></p>
            </div>
            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">4400</span>
                <p>Teams</p>
                <p class="text-center"><img src="assets/img/team.png" style="width: 50px"/></p>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->

<!-- ======= Our Values Section =======
<section id="our-values" class="our-values">
    <div class="container">
        

        <div class="row">
<!--                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card" style='background-image: url("assets/img/chapter-1.jpg");'>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">S2S: Chapter 1</a></h5>
                                    <p class="card-text">The very first step to achieve a bigger goal.</p>
                                    <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                            <div class="card" style='background-image: url("assets/img/chapter-2.jpg");'>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">S2S: Chapter 2</a></h5>
                                    <p class="card-text">Achieving the bigger goal is in progress.</p>
                                    <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
                                </div>
                            </div>

                        </div>
<div class="col-md-6 d-flex align-items-stretch mt-4">
    <div class="card" style='background-image: url("assets/img/gallery.jpg");'>
        <div class="card-body">
            <h5 class="card-title"><a href="">Photo Gallery</a></h5>
            <p class="card-text">See the memorable moments of the journey.</p>
            <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
        </div>
    </div>
</div>
<div class="col-md-6 d-flex align-items-stretch mt-4">
    <div class="card" style='background-image: url("assets/img/videogallery.jpg");'>
        <div class="card-body">
            <h5 class="card-title"><a href="">Video Gallery</a></h5>
            <p class="card-text">See some video shot on the way.</p>
            <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
        </div>
    </div>
</div>
</div>

</div>
</section><!-- End Our Values Section -->




<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title">
            <h2>WHY SHOULD YOU PARTICIPATE?</h2>
            <!--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>-->
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/fund.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Funding</a></h4>
                    <p class="description">Startup Bangladesh – iDEA provides pre-seed (idea), seed and growth stage fund to startups. Depending on the stage, it can be up to 5 Crore BDT. </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/mentoring.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Mentoring</a></h4>
                    <p class="description">Startup Bangladesh – iDEA provides mentoring to its portfolio startups by a pool of expert mentors from various sectors.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/networking.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Networking</a></h4>
                    <p class="description">Startup Bangladesh – iDEA collaborates with national and international stakeholders who are working with startups and arrange sessions among them.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/education.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Academic Program</a></h4>
                    <p class="description">The iDEA academy provides different courses to train up entrepreneurs working in different industries. The academy provides long term and short-term courses in different levels considering entrepreneur’s need.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/law.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Legal & IP Support</a></h4>
                    <p class="description">Startup Bangladesh – iDEA guides and helps startups to protect their legal and intellectual property rights. </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="icon-box">
                    <div class="icon"><img src="assets/img/cowork.png" style="width: 60%"/></div>
                    <h4 class="title"><a href="">Co-working Space</a></h4>
                    <p class="description">Startup Bangladesh – iDEA has a great coworking space for startups. 51 desks have been furnished for the startups.</p>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Testimonials Section ======= 
<section id="testimonials" class="testimonials section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Testimonials</h2>
        </div>

        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    The only reason to take this project is that no student can say that he could not take his idea forward due to lack of funds.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/palak.jpg" class="testimonial-img" alt="">
                <h3>Zunaid Ahmed Palak MP</h3>
                <h4>State Minister for Information and Communication Technology Division</h4>
            </div>
<!--
<div class="testimonial-item">
    <p>
        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
    </p>
    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
    <h3>Sara Wilsson</h3>
    <h4>Designer</h4>
</div>

<div class="testimonial-item">
    <p>
        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
    </p>
    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
    <h3>Jena Karlis</h3>
    <h4>Store Owner</h4>
</div>

<div class="testimonial-item">
    <p>
        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
    </p>
    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
    <h3>Matt Brandon</h3>
    <h4>Freelancer</h4>
</div>

<div class="testimonial-item">
    <p>
        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
    </p>
    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
    <h3>John Larson</h3>
    <h4>Entrepreneur</h4>
</div>
-->
</div>

</div>
</section><!-- End Testimonials Section -->


<section id="portfolio" class="portfolio  section-bg">
    <div class="container">
        <div class="row">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/E216EkJWtQU?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>



<!-- ======= Portfolio Section ======= 
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Portfolio</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <ul class="portfolio-flters d-flex justify-content-center">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
        </ul>

        <div class="row portfolio-container">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 1</h4>
                    <p>App</p>
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2>Advisory Board</h2>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Team Section -->

<!-- ======= Pricing Section ======= 
<section id="pricing" class="pricing">
    <div class="container">

        <div class="section-title">
            <h2>Pricing</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="box">
                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                <div class="box featured">
                    <h3>Business</h3>
                    <h4><sup>$</sup>19<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                <div class="box">
                    <h3>Developer</h3>
                    <h4><sup>$</sup>29<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                <div class="box">
                    <span class="advanced">Advanced</span>
                    <h3>Ultimate</h3>
                    <h4><sup>$</sup>49<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->


<!-- ======= Frequently Asked Questions Section =======  
<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
            <ul>
                <li data-aos="fade-up">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="400">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                        </p>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</section><!-- End Frequently Asked Questions Section -->


<!-- ======= Clients Section ======= -->
<section id="clients" class="clients  section-bg">
    <div class="container">


        <div class="section-title">
            <h2 style="margin-top: 60px">PARTNERS</h2>
        </div>

        <div class="row">

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/1.jpg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/2.jpg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/3.jpg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/4.jpg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/5.jpg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="assets/img/clients/6.jpg" class="img-fluid" alt="">
            </div>

        </div>

    </div>
</section><!-- End Clients Section -->



<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>

        </div>

        <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%20ICT%20Tower%20(14th%20Floor%20Plot:%20E-14/X,%20Agargaon,%20Dhaka%201207+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p>ICT Tower (14th Floor Plot: E-14/X, Agargaon, Dhaka 1207</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>info@example.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Call:</h4>
                        <p>+1 5589 55488 55s</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>

            </div>

        </div>

    </div>
</section>

@endsection