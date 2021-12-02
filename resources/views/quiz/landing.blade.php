@extends("quiz_template")

@section("og_content")
<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="শেখ রাসেল কুইজ" />
<meta property="og:description"        content="" />
<meta property="og:image"              content="{{asset('assets/img/russel-logo.jpeg')}}" />
@endsection

@section("content")
<!-- ======= Cta Section ======= -->



<style>
    .landing_image{

        border-bottom-left-radius: 50px 50px;
        overflow: hidden;

    }

    @media only screen and (max-width: 960px) {
        .landing_image{
            border-bottom-left-radius: 0px;
        }
        #landing_image_container{
            padding: 0px;
        }
        .time{
            padding: 5px !important;
            margin: 5px !important;
            width: 65px !important;
            border-radius: 10px !important;
            border: solid rgb(255,255,255) 2px !important;
            text-shadow: 2px 2px 5px rgb(0,0,0) !important;
        }

        .time h4{
            font-size: 1rem;
        }

        .time p{
            font-size: 0.7rem;
        }
    }

    .landing_image img{
        width: 100%;
        height: auto;
    }

    .time{
        text-align: center;
        display: inline-block;
        width: 75px;
        padding: 10px;
        margin: 10px;
        background: rgb(207, 148, 53) linear-gradient(rgb(207, 148, 53) 0%, rgb(207, 148, 53) 100%) repeat scroll 0% 0%;
        color: rgb(255,255,255);
        border-radius: 20px;
        border: solid rgb(255,255,255) 3px;
        text-shadow: 2px 2px 5px rgb(0,0,0);
    }

    .time p{
        margin-bottom: 0px;
        color: rgb(255,255,255);

    }

    #lead_content:before {
        content: ' ';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0.2;
        background-image: url('{{asset("assets/img/historic-march-7.png")}}');
        background-repeat: no-repeat;
        background-position: 50% 0;
        background-size: cover;
        overflow: hidden;
    }

</style>
<section id="cta" class="cta" style="background-color: #fff; padding-top: 0px; position: relative; padding-bottom: 0px;">
    <div id="lead_content">
        <div class="container">
            <!--            <div class="row">-->
            <!--                <div class="col-md-6" id="">-->
            <!--                    <div class="row text-center" >
                                    <div class="text-center landing_image" style="height: 380px; overflow: hidden">
                                        <img src='{{asset("assets/img/prize.jpeg")}}'/>
                                    </div>-->
            <!--                        <div class="col-12 mt-3"  style=" font-family: 'Hind Siliguri'">
                                        <h3 class="text-dark">মুজিব অলিম্পিয়াড</h3>
                                        <h4>বঙ্গবন্ধু ও বাংলাদেশ চর্চা</h4>
                                    </div>-->
            <?php
            if (time() < strtotime("2021-06-25 14:55:00+06:00") || time() > strtotime("2021-06-25 23:59:59+06:00")) {
                ?>
                <!--                            <div class="col-12 text-center" style=" font-family: 'Hind Siliguri'">
                                                <h5 class="text-dark w-100 text-center">অংশগ্রহণ করতে রেজিস্ট্রেশন করুন</h5> 
                                                <a href="{{route('register')}}" class="btn btn-info btn-lg text-white shadow-lg" style=" font-size: 1.75rem">রেজিস্ট্রেশন</a>
                                            </div>-->
                <?php
            } else {
                ?>
                <!--                            <div class="col-12 text-center" style=" font-family: 'Hind Siliguri'">
                                                <h5 class="text-dark w-100 text-center">কুইজে অংশগ্রহণ করুন</h5> 
                                                <a href="{{route('quiz')}}" class="btn btn-info btn-lg text-white shadow-lg" style=" font-size: 1.75rem">কুইজ</a>
                                            </div>-->
                <?php
            }
            ?>
            <!--                            <div class="col-12 text-center mt-5" style=" font-family: 'Hind Siliguri'">
                                            <h3 class=" w-100 text-center text-info">কুইজ সফলভাবে সম্পন্ন হয়েছে। ফলাফল খুব শীঘ্রই জানিয়ে দেওয়া হবে।</h3> 
                                            <a href="{{route('quiz')}}" class="btn btn-info btn-lg text-white shadow-lg" style=" font-size: 1.75rem">কুইজ</a>
                                        </div>-->

            <!--                        <div class="col-12 text-center mt-4" >
            
                                        <p style="margin-bottom: 0px"><span style="font-size: 1.5rem">২৫ জুন</span>&nbsp;&nbsp;&nbsp;দুপুর ৩ টা থেকে রাত ১২টা পর্যন্ত কুইজ অনুষ্ঠিত হবে</p>
                                    </div>-->
            <!--                        <div class="col-12 text-center">
                                        <div>
                                            <div class="time">
                                                <div class="icon-box">
                                                    <h4 class="day">২২</h4>
                                                    <p>দিন</p>
                                                </div>
                                            </div>
                                            <div class="time">
                                                <div class="icon-box">
                                                    <h4 class="hour">২২</h4>
                                                    <p>ঘন্টা</p>
                                                </div>
                                            </div>
                                            <div class="time">
                                                <div class="icon-box">
                                                    <h4 class="min">২২</h4>
                                                    <p>মিনিট</p>
                                                </div>
                                            </div>
                                            <div class="time">
                                                <div class="icon-box">
                                                    <h4 class="sec">২২</h4>
                                                    <p>সেকেন্ড</p>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>-->

            <!--                    </div>-->
            <!--                </div>
                            <div class="col-md-6" id="landing_image_container">
            
                                <div class="text-center landing_image" style="height: 380px; overflow: hidden">
                                    <img src='{{asset("assets/img/mujib.png")}}'/>
                                </div>
                            </div>-->
            <!--            </div>-->
            <img src="{{asset('assets/slider/mujib_olympiad_cover.jpeg')}}" class=" img-fluid"/>
        </div>
</section>

<?php
if (time() > strtotime("2021-07-05 13:30:00+06:00")) {
    ?>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <h2 class="section-title w-100 text-center text-bold"><strong>মুজিব অলিম্পিয়াড বিজয়ী</strong></h2>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-1.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-1.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-2.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-2.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-3.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-3.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-4.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-4.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-5.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-5.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-6.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-6.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-7.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-7.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-8.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-8.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 offset-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-9.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-9.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="width: 96%; padding: 5px 2%" class="text-center">
                        <a href="{{asset('winner/Winner-10.jpg')}}" data-toggle="lightbox" data-gallery="10" data-max-height="600">
                            <img src="{{asset('winner/Winner-10.jpg')}}" class=" img-fluid"/>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php
}
?>


<section class="testimonials section-bg" style="padding: 25px 0px;">
    <div class="container">
        <div class="row">
            <h2 class="section-title w-100 text-center text-bold"><strong>জাতির পিতাকে জানুন</strong></h2>
            <?php
            $Data = \App\Category::whereIn('id', function($query) {
                        $query->select('category_id')
                        ->from(with(new \App\Content)->getTable())
                        ->where('contents.featured', 'Yes')
                        ->where('contents.display', 'Yes')
                        ->groupBy('category_id');
                    })
                    ->where('display', 'Yes')
                    ->orderBy('category_order', 'asc')
                    ->get();
            if ($Data->count()) {
                foreach ($Data as $value) {
                    ?>
                    <div class="col-md-6 mb-2 mt-2 p-4">
                        <div class="row  bg-white">
                            <a href="{{route('content_list',$value->id)}}" class="text-dark w-100"><h5 class="m-4 p-2" style="border-bottom:solid lightgrey 2px;font-weight: bold">{{$value->category_name}}</h5></a>
                            <?php
                            $Take = 3;
                            $Content = $value->getContent()->where('featured', 'Yes')->where('language', 'Bn')->orderBy('display_order', 'asc')->take($Take)->get();
                            foreach ($Content as $key => $newvalue) {
                                $Text = implode(' ', array_slice(explode(' ', str_replace(["\r\n", '\n', '&nbsp;'], [' ', ' ', ' '], strip_tags($newvalue->content))), 0, 8));
                                if ($key < 1) {
                                    $Text = implode(' ', array_slice(explode(' ', str_replace(["\r\n", '\n', '&nbsp;'], [' ', ' ', ' '], strip_tags($newvalue->content))), 0, 20));
                                    ?>
                                    <div class="col-12 mb-2 border-bottom">
                                        <a href="{{route('content_guest',$newvalue->id)}}" class="text-info">
                                            <div class="w-100">
                                                <img src="{{\Storage::url($newvalue->cover_image)}}" class="w-100 img-fluid"/>
                                                <h5 class="w-100 mt-2">{{$newvalue->title}}</h5>
                                                <p class="text-dark">{{$Text}}</p>
                                            </div>
                                        </a>
                                    </div>

                                    <?php
                                } else {
                                    ?>
                                    <div class="col-12 mb-2 {{($key != $Take-1)? 'border-bottom':''}}">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{route('content_guest',$newvalue->id)}}" class="text-info">
                                                    <div class="media p-1">
                                                        <img src="{{\Storage::url($newvalue->cover_image_resized)}}" class="img-fluid" style="width:120px;">
                                                        <div class="media-body pl-3">
                                                            <h6 class="w-100">{{$newvalue->title}}</h6>
                                                            <p class="text-dark">{{$Text}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="row">
            <h2 class="section-title w-100 text-center text-bold"><strong>ফটো গ্যালারি</strong></h2>
            <div class="col-md-8 offset-md-2">
                <div class="card-columns">
                    <?php
                    foreach (\App\Photo::where('display', 'Yes')->where('featured', 'Yes')->orderBy('display_order', 'asc')->get() as $value) {
                        ?>
                        <div class="card rounded-lg image-card">
                            <a href="{{\Storage::url($value->file_name)}}" data-toggle="lightbox" data-gallery="1" data-max-height="600" data-footer="{{$value->title}}">
                                <img class="card-img-top" src="{{\Storage::url($value->file_name_resized)}}" alt="Card image cap" >
                                <!--                                <div class="card-body">
                                                                    <h6 class="card-title text-dark">{{$value->title}}</h6>
                                                                </div>-->
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="{{(auth()->check())?route('photo_gallery'):route('photo_gallery')}}" class="btn btn-info rounded-lg p-3">আরো দেখুন </a>
            </div>
        </div>
    </div>
</section>

<style>
    .image-card{
        opacity: 1;
    }

    .image-card:hover{
        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    }
</style>

<section class=" testimonials section-bg">
    <div class="container">
        <div class="row">
            <h2 class="section-title w-100 text-center text-bold"><strong>ভিডিও গ্যালারি</strong></h2>
            <div class="col-12">
                <div class="row">
                    <?php
                    foreach (\App\Video::where('display', 'Yes')->where('featured', 'Yes')->get() as $value) {
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$value->link}}" allowfullscreen></iframe></div>
                            <h5 class="w-100 pt-1">{{$value->title}}</h5>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <a href="{{(auth()->check())?route('video_gallery'):route('video_gallery')}}" class="btn btn-info rounded-lg p-3">আরো দেখুন </a>
            </div>
        </div>
    </div>
</section>

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients bg-white">
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/img/clients/Digital_Bangladesh.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/img/clients/ICT.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-4 col-sm-4 col-4 d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/img/clients/doICT.jpg')}}" class="img-fluid" alt="">
            </div>



        </div>

    </div>
</section><!-- End Clients Section -->


<script type="text/javascript">
    $(document).ready(function () {
        var countDownDate = new Date("Jun 25, 2021 15:00:00").getTime();

// Update the count down every 1 second

        var now = new Date("{{date("M d, Y H:i:s")}}").getTime();
        var x = setInterval(function () {

            // Get today's date and time

            var mapObj = {"1": "১", "2": "২", "3": "৩", "4": "৪", "5": "৫", "6": "৬", "7": "৭", "8": "৮", "9": "৯", "0": "০"};

            var re = new RegExp(Object.keys(mapObj).join("|"), "gi");

            now = now + 1000;

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            if (distance >= 0) {

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                days = (days > 9) ? "" + days : "0" + days;
                hours = (hours > 9) ? "" + hours : "0" + hours;
                minutes = (minutes > 9) ? "" + minutes : "0" + minutes;
                seconds = (seconds > 9) ? "" + seconds : "0" + seconds;





                $(".day").html(days.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".hour").html(hours.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".min").html(minutes.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".sec").html(seconds.replace(re, function (matched) {
                    return mapObj[matched];
                }));
            } else { // If the count down is finished, write some text
                clearInterval(x);

                var Text = "00";
                $(".day").html(Text.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".hour").html(Text.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".min").html(Text.replace(re, function (matched) {
                    return mapObj[matched];
                }));
                $(".sec").html(Text.replace(re, function (matched) {
                    return mapObj[matched];
                }));
            }
        }, 1000);
    });





</script>



@endsection