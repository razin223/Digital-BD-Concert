@extends("landing_template_2")

@section("content")


<section id="slider">
    <img class="d-block w-100" src="assets/slider/1.png" >
    <a href="{{route('register')}}" id="register_now">REGISTER NOW</a>
</section>



<!-- ======= Clients Section ======= -->
<section class="section-bg" >
    <div class="container">

        <div class="row ">
            <div class="col-12 d-flex justify-content-center" id="organizer" >
                <div>
                    <a href="javascript:;"><img src="assets/logo/digital-bd.png" class="img-fluid " alt=""></a>
                </div>
                <div>
                    <a href="https://ictd.gov.bd/" target="_blank"><img src="assets/logo/ict.png" alt=""></a>

                </div>    
                <div>
                    <a href="https://bcc.gov.bd/" target="_blank"><img src="assets/logo/bcc.png"  alt=""></a>
                </div>
                <div>
                    <a href="http://www.idea.org.bd/" target="_blank"><img src="assets/logo/idea.png" alt=""></a>
                </div>
            </div>





        </div>

    </div>
</section><!-- End Clients Section -->


<section id="at_a_glance">
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center" style=" margin-top: 0.5em; margin-bottom: 50px">Background</h1>
            </div>

            <div class="col-12">
                <p style="text-align: justify">
                    On the occasion of the birth centenary of Father of the Nation Bangabandhu Sheikh Mujibur Rahman, the period from 17 March 2020 to 18 March 2021 has been declared as Mujib Year. As part of the Mujib Year celebrations, the Department of Information and Communication Technology will provide ‘Bangabandhu Innovation Grant’ to ICT-based innovative startups from domestic and international circles in the two (two) fiscal years 2020-21 and 2021-22. We encourage participation in innovative activities of the country's young generation, increase employment and reduce unemployment, develop the country's social and economic infrastructure, increase IT-based digital services, increase exports of IT-based products and above all, encourage Bangabandhu Innovation Grants in the country. 
                </p>
            </div>
        </div>
    </div>

</section>

<section id="go_big" class=" section-bg">
    <div class="container d-flex h-100">
        <div class="row h-100" style="padding-top: 0.5em">
            <div class="col-md-6 go-big-content">
                <h1>About Us</h1>
                <p style="margin-top: 2em; ">
                    BIG is a platform for the future entrepreneurs and aspiring young minds of the country to motivate, recognize and share their innovations in a national and international level for the brighter future of Bangladesh. Young minds such as students, young professionals will be able to share their innovation and ideas in the field of information and technology. The top 36 startups will be given a grant worth One lakh and twelve thousand USD. ICT ministry along with Access to Information (A2I) and Corporate houses will fund the grant. Our Goal is to establish a transparent platform by ensuring maximum use of information and communication technology and building digital Bangladesh through creating positive change in the quality of life of people from all walks of life including delivery of government services to the doorsteps of the people. Under the visionary leadership of Hon'ble Prime Minister Sheikh Hasina, the Department of Information and Communication Technology has been working relentlessly for the construction of Digital Bangladesh and development of ICT industry in fulfilling the dream of Father of the Nation Bangabandhu Sheikh Mujibur Rahman in implementing Vision-2021 and Vision-2041 of the government. 
                </p>
                <p>&nbsp;</p>

            </div>

            <div class="col-md-6 d-flex flex-wrap align-items-center">
                <img src="assets/img/about-us.png" class="img-fluid"/>
            </div>
        </div>
    </div>
</section>





@endsection