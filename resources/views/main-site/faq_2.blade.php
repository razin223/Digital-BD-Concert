@extends("landing_template_2")

@section("content")

<style>

    #accordion .card{
        margin: 10px 0px;
        border: none;
    }

    #accordion .card .card-header{
        background-color: rgb(255,255,255);
        border-bottom: none;
    }

    #accordion .card .card-header .card-link{
        color: #000;
        font-weight: bold;
        margin-right: 25px;
    }

    #accordion .card .card-header .card-link::before{
        content: "\2192";
        font-size: 1.2rem;
    }

    #accordion .card .card-header .sign{

        float: right;
        color: #000;
    }

    #accordion .card .card-header .sign:hover{
        text-decoration: none;
    }

    #accordion .card .card-header .sign::after{
        content: "\271A";
        color: #000;
    }

    #accordion .card .card-body{
        font-weight: 500;
        color: gray;
        padding-left: 40px;
    }

</style>


<section class="before-footer section-bg">
    <div class="container d-flex h-100">
        <div class="row" style="padding-top: 0.5em; ">
            <div class="col-md-8 offset-md-2 text-center">
                <img src="assets/img/faq.png" style="width: 100%; max-width: 450px; display: none" />
                <h1 style=" margin: 40px 0px">FREQUENTLY ASK QUESTION</h1>
            </div>
            
            
            <div class="col-md-8 offset-md-2">
                <div id="accordion">



                    <?php
                    $FAQ = [
                        [
                            'q' => "What is BIG?",
                            'a' => "Big is a platform for the innovators of the future. This platform is designed to encourage Startups from all over the world via providing the winners with financial support.",
                        ],
                        [
                            'q' => 'Who can participate?',
                            'a' => "<ul>"
                            . "<li>The startup must have an innovative product or service. The startup can have:"
                            . "<ul>"
                            . "<li>An idea</li>"
                            . "<li>A prototype</li>"
                            . "<li>Minimum viable product</li>"
                            . "</ul>"
                            . "</li>"
                            . "<li>The startup should solve a problem in a faster, better and/or, cheaper way</li>"
                            . "<li>The proposed business model should be repeatable and scalable</li>"
                            . "<li>ICT should be the core enabling component of the service or product</li>"
                            . "<li>There should be fast growth potential</li>"
                            . "<li>If the startup has already raised any (series A, B or C) round of investment from national or international venture capital company, they will not qualify for BIG.</li>"
                            . "<li>Maximum legal age of the startup will be 5</li>"
                            . "<li>If the startup has a Bangladeshi legal entity (or going to create a Bangladeshi legal entity), one or more founders are Bangladeshi and, the startup is operating in Bangladesh; then the startup will be considered as a Bangladeshi startup. If any of the 3 conditions mentioned above is missing, then they will be considered as an international startup.</li>"
                            . "<li>Sister concerns of large companies will not be allowed</li>"
                            . "<li>Maximum founder number can be 5. But only 3 of the founders can participate in the events.</li>"
                            . "</ul>",
                        ],
                        [
                            'q' => 'How to participate?',
                            'a' => "Log on to our website - <a target='_blank' href='https://www.big.gov.bd/about'>https://www.big.gov.bd/about</a>",
                        ],
                        [
                            'q'=>'What do I need to register aside from my Startup?',
                            'a'=>'If you are a national participant, you will require your birth certificate or your national ID to register. If you are an international participant, you will need your passport number to register.'
                        ],
                        [
                            'q' => "Can one person register multiple times?",
                            'a' => "No, one team leader can only register once.",
                        ],
                        [
                            'q' => "Do I need a successful startup to participate?",
                            'a' => "No, even if your Startup does not exist yet but you have an idea for the startup, you can participate with your idea.",
                        ],
                        [
                            'q' => "How many startups will win?",
                            'a' => "10 International Startups and 26 National Startups.",
                        ],
                        [
                            'q' => "Do I have to be a Bangladeshi citizen to apply?",
                            'a' => "You need to be a Bangladeshi citizen to apply as a national participant. Nonresident Bangladeshi (NRB) will also have to register as national participants. International participants who hold international passports can apply under the international category. ",
                        ],
                        [
                            'q' => "How many Startups will be selected for the Reality show round?",
                            'a' => "Top 65 Startups from the national level will be selected for the reality show.",
                        ],
                        [
                            'q' => "Can I apply if I am not a student?",
                            'a' => "Yes, non-students may apply as well.",
                        ],
                        [
                            'q' => "How many phase will be there?",
                            'a' => "We will have 3 phase - Activation Program, TV Reality Show and International Road Show.",
                        ],
                        [
                            'q' => "Will BIG take place online?",
                            'a' => "Considering the present COVID 19 situations, both online and offline program will be organized.",
                        ],
                        [
                            'q' => "When is the deadline for registering?",
                            'a' => "Student and General Category: February 28, 2021.<br/> International Category: February 28, 2021.",
                        ],
                        [
                            'q' => "Can startups from any industry category apply?",
                            'a' => "Yes, Startups from any industry are welcomed.",
                        ],
                        [
                            'q' => "Do national and international participants compete in the same category?",
                            'a' => "No, national and international participants will be competing in different categories and the allocation of prize money will also be done accordingly.",
                        ],
                        [
                            'q' => "Will we be given any training?",
                            'a' => "Startups that have passed the first round will go through 4 days of intense bootcamp and receive training from the best of the best in the industry. But this bootcamp will be organized only for National participants.",
                        ],
                        [
                            'q' => "When does the TV round start?",
                            'a' => "TBD",
                        ],
                        [
                            'q' => "Startup from which phases can take part?",
                            'a' => "Pre seed and idea stage startups who are looking for grants, seed-funding or angle investment are welcomed to participate. ",
                        ],
                        [
                            'q' => "Is there a registration fee?",
                            'a' => "No, there is no registration fee.",
                        ],
                        
                    ];
                    ?>


                    <?php
                    foreach ($FAQ as $key => $value) {
                        ?>

                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse{{$key}}">
                                    {{$value['q']}}
                                </a>
                                <a data-toggle="collapse" href="#collapse{{$key}}" class="sign"></a>
                            </div>
                            <div id="collapse{{$key}}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    {!! $value['a'] !!}
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div> 
            </div>
        </div>
    </div>
</section>







@endsection