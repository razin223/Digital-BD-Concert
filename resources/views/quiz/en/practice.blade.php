@extends("quiz_en_template")

@section("content")

<style>



    .btn-learn-more {
        font-family: 'Hind Siliguri', sans-serif;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 32px;
        border-radius: 5px;
        transition: 0.3s;
        line-height: 1;
        color: rgb(68, 68, 68);
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;
        margin-top: 6px;
        border: 2px solid rgb(68, 68, 68);
    }

    .btn-learn-more:hover {
        background: rgb(68, 68, 68);
        color: #fff;
        text-decoration: none;
    }

    .question span{
        margin-right: 10px;
    }

    .icon-box{
        padding: 5px 15px !important;
        width: 70px;
        margin: 10px;
    }

    .icon-box p{
        margin-bottom: 0px;
    }




</style>

<section class="breadcrumbs">
    <h2 class="text-center">ক‌্যাটাগরি</h2>
    <p class="text-center">হোম / অনুশীলন</p>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">


        <div class="container">

            <div class="row">

                <h3 class="text-center mb-5" style="width: 100%">বঙ্গবন্ধুর শৈশব পরিচিতির উপর অনুশীলন</h3>

                <div class="row d-flex justify-content-center" style="width: 100%">

                    <div class="icon-box">
                        <h4 class="hour">২২</h4>
                        <p>ঘন্টা</p>
                    </div>


                    <div class="icon-box">
                        <h4 class="min">২২</h4>
                        <p>মিনিট</p>
                    </div>


                    <div class="icon-box">
                        <h4 class="sec">২২</h4>
                        <p>সেকেন্ড</p>
                    </div>

                </div>

                <div class="col-12 question">
                    <div class="row p-3 border-bottom">
                        <div class="col-2 col-sm-1 text-right">
                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">১।</span>
                        </div>
                        <div class="col-10 col-sm-11 text-left">বঙ্গবন্ধু কোথায় জন্মগ্রহণ করেন?</div>
                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> ফরিদপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> গোপালগঞ্জ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> মাদারীপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> খুলনা
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 border-bottom">
                        <div class="col-2 col-sm-1 text-right">
                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">২।</span>
                        </div>
                        <div class="col-10 col-sm-11 text-left">বঙ্গবন্ধু কোথায় জন্মগ্রহণ করেন?</div>
                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> ফরিদপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> গোপালগঞ্জ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> মাদারীপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> খুলনা
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 border-bottom">
                        <div class="col-2 col-sm-1 text-right">
                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">৩।</span>
                        </div>
                        <div class="col-10 col-sm-11 text-left">বঙ্গবন্ধু কোথায় জন্মগ্রহণ করেন?</div>
                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> ফরিদপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> গোপালগঞ্জ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> মাদারীপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> খুলনা
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 border-bottom">
                        <div class="col-2 col-sm-1 text-right">
                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">৪।</span>
                        </div>
                        <div class="col-10 col-sm-11 text-left">বঙ্গবন্ধু কোথায় জন্মগ্রহণ করেন?</div>
                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> ফরিদপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> গোপালগঞ্জ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> মাদারীপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> খুলনা
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3 border-bottom">
                        <div class="col-2 col-sm-1 text-right">
                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">৫।</span>
                        </div>
                        <div class="col-10 col-sm-11 text-left">বঙ্গবন্ধু কোথায় জন্মগ্রহণ করেন?</div>
                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> ফরিদপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> গোপালগঞ্জ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> মাদারীপুর
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio"> খুলনা
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-12">
                            <a href="/quiz/content/1" class="btn-learn-more text-center" style="margin:  0xp auto">সাবমিট করুন</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
</section><!-- End Cta Section -->


<script type="text/javascript">
    $(document).ready(function () {
        var countDownDate = new Date("{{date("M d, Y H:i:s",(time()+3600))}}").getTime();

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