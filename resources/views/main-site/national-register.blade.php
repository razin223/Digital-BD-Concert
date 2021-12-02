@extends("landing_template")

@section("content")



@include("main-site.page-css")




<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">

        <div class="section-title">
            <h2>National Startup Registration</h2>
        </div>

        <div class="row content">

            <div class="col-lg-12 pt-4 pt-lg-0">
                <h4 class="text-center">Want To Register</h4>
                <p class="text-center">
                    <a href="{{route('register')}}" class="btn btn-warning border border-white">Get Registered</a>
                </p>
                <!--<a href="#" class="btn-learn-more">Learn More</a>-->
            </div>

        </div>

    </div>
</section><!-- End About Section -->


<!-- ======= Counts Section ======= -->
<section id="counts" class="counts" style="padding: 60px 0px">
    <div class="container">

        <div class="row counters">

            <div class="col-lg-4 col-6 text-center">
                <span >1st </span>
                <p>Round Project Submission</p>

            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">200</span>
                <p>Top Team at Regional Round</p>

            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-toggle="counter-up">65</span>
                <p>Top Team at TV Show Round</p>

            </div>
            <div class="col-lg-12 col-12 text-center">
                <span data-toggle="counter-up">26</span>
                <p>Winner at Final Round</p>

            </div>


        </div>

    </div>
</section><!-- End Counts Section -->


<!-- ======= Counts Section ======= -->
<section id="counts" class="about" >
    <div class="container">

        <!--        <div class="section-title" style="padding-top: 40px">
                    <h2>BIG GRANT - 2020</h2>
                </div>-->

        <div class="row content">

            <div class="col-12">

                <div class="card text-black" >

                    <div class="card-header text-center">
                        <h2>Who Can Apply</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp; Anyone who is a Bangladeshi Citizen will be able to apply in the national category.<br/>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp; Bangladeshi Citizens who are residing in foreign country but are not a citizen of that country will be able to apply in the national category.<br/>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp; Anyone who is of the age 18-35 years will be able to apply in the national category.<br/>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp; Anyone who either has a Startup idea or has a business that is still in the Startup stage will be able to compete in the national category.<br/>


                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->




@endsection