@extends("quiz_template")

@section("content")


<?php
$KaStart = "2021-10-12 19:00:00+06:00";
$KaEnd = "2021-10-12 20:00:00+06:00";

$KhaStart = "2021-10-13 19:00:00+06:00";
$KhaEnd = "2021-10-13 20:00:00+06:00";
?>

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
    <h2 class="text-center">কুইজ</h2>
</section>

<?php
$English = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
$Bangla = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];

if ($type == 'list') {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('quiz_start')}}",
                    method: "POST",
                    data: $("#form").serializeArray(),
                    success: function (data) {
                        if (data.status) {
                            window.location = window.location.href;
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function (error) {
                        alert(error.responseText);
                    }
                });
            });
        });
    </script>
    <section class="services" style="background-color: #fff">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="form">
                        @csrf
                        <h3 class="w-100 text-center">নিয়মাবলি</h3>
                        <p class="text-justify">
                            * কুইজে মাত্র ১ (এক) বার অংশ নেওয়া যাবে।<br/>
                            * কুইজের মোট সময় ১০ মিনিট। {{str_replace($English,$Bangla,$ExamSetting['question'])}}টি প্রশ্ন থাকবে। প্রতি প্রশ্নের মান সমান।<br/>
                            * কুইজ এক বার শুরু হয়ে গেলে শেষ না করে বের হয়ে আসা যাবে না। একবার ”কুইজ শুরু করুন” বাটন প্রেস করলে সম্পূর্ণ কুইজ শেষ করে তারপর বের হতে হবে।<br/>
                            * নিরবিচ্ছিন্ন ইন্টারনেট সংযোগ নিশ্চিৎ করুন। কুইজের মধ‌্যে ইন্টারনেট সংযোগজনিত সমস‌্যা গ্রহণ করা হবে না।<br/>
                            * কিছু সময় পর পর উত্তর ”সেভ” বাটনে প্রেস করে আপনার প্রদত্ত উত্তর সংরক্ষন করুন। যদি কোন কারণে আপনার ইন্টারনেট সংযোগ বিচ্ছিন্ন হয়ে যায়, তবে যত দ্রুত সম্ভব আপনি আবার 
                            ইন্টারনেট সংযোগ স্থাপন করে পুনরায় আগের সংরক্ষিত অংশ থেকেই শুরু করতে পারবেন। তবে কাউন্টডাউন চলতে থাকবে। অর্থাৎ পুনরায় ইন্টারনেট সংযোগ স্থাপন করতে যে পরিমান সময় যাবে, 
                            তা পরীক্ষার সময়ের মধ‌্যে ধরা হবে।<br/>
                            * যদি কোন কারণে পরীক্ষার উত্তর সাবমিট না করতে পারেন, তবে সেক্ষেত্রে সর্বশেষ সেভ করা উত্তর থেকে নম্বর গণনা করা হবে। এক্ষেত্রে সাবমিশন সময় ধরা হবে পূর্ণ ১০ মিনিট।<br/>
                            * সবচেয়ে কম সময়ে সবচেয়ে বেশি মার্ক যিনি পাবেন, তাকে বিজয়ী ঘোষনা করা হবে।<br/>
                        </p>
                        <p>&nbsp;</p>

                        <?php
                        $Data = \App\Exam::where('user_id', auth()->id())->first();
                        if ($Data == null) {

                            if (time() < strtotime($ExamSetting['start'])) {
                                ?>
                                <h4 class="w-100 text-center text-danger">কুইজের সময় এখনো শুরু হয় নাই ।</h4>
                                <?php
                            } else if (time() > strtotime($ExamSetting['end'])) {
                                ?>
                                <h4 class="w-100 text-center text-danger">কুইজের সময় শেষ।</h4>
                                <?php
                            } else {
                                ?>
                                <p class="text-center">

                                </p>
                                <h5 class="w-100 text-center"><input type="submit" class="btn btn-primary btn-lg" value="কুইজ শুরু করুন"/></h5>
                                <?php
                            }
                        } else {
                            ?>
                            <h4 class="w-100 text-center">আপনি ইতিমধ‌্যে কুইজে অংশগ্রহণ করেছেন। অংশগ্রহণের জন‌্য ধন‌্যবাদ। ফলাফল পরবর্তীতে জানিয়ে দেওয়া হবে। </h4>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
}

if ($type == 'exam') {
    ?>
    <!-- ======= Cta Section ======= -->
    <section class="services" style="background-color: #fff">
        <div class="container">

            <div class="row">

                <div class="col-12 text-center">
                    <h5>পেজ রিফ্রেস/রিলোড করবেন না। <br/>সকল উত্তর দাগানো শেষে <strong>“সাবমিট করুন”</strong> বাটনটি চাপুন।</h5>

                </div>


                <div class="col-12 d-flex justify-content-center" style="width: 100%">

                    <div class="icon-box">
                        <h4 class="hour">--</h4>
                        <p>ঘন্টা</p>
                    </div>


                    <div class="icon-box">
                        <h4 class="min">--</h4>
                        <p>মিনিট</p>
                    </div>


                    <div class="icon-box">
                        <h4 class="sec">--</h4>
                        <p>সেকেন্ড</p>
                    </div>

                </div>

                <div class="col-12 question">
                    <form id="form">
                        <span class="float-right" id="message_zone"></span><br/><a href="javascript:;" class="btn btn-outline-info float-right" id="save-answer">সেভ করুন</a>
                        <div style=" height: 75vh; overflow-y: auto; width: 100%; overflow-x: hidden" class=" border p-3 m-3">
                            @csrf

                            <?php
                            $QuestionIds = explode(",", session('questions'));

                            $Question = \App\Question::whereIn('id', $QuestionIds)
                                    ->orderByRaw(\DB::raw("FIELD(id, " . session('questions') . ")"))
                                    ->get();

                            if ($Question->count()) {
                                $Sl = 0;

                                $Data = \App\Exam::where('user_id', auth()->id())->first();

                                $Answer = json_decode($Data->answer_submitted, true);


                                foreach ($Question as $value) {
                                    $Sl++;
                                    ?>
                                    <div class="row p-3 border-bottom">
                                        <div class="col-2 col-sm-1 text-right">
                                            <span style=" background-color: #fafafa; border: solid rgb(68, 68, 68) 1px; border-radius: 25px; padding: 10px 15px; font-size: 0.9em">{{str_replace($English,$Bangla,(string)$Sl)}}।</span>
                                        </div>
                                        <div class="col-10 col-sm-11 text-left">{{$value->question}}</div>
                                        <div class="col-10 col-sm-11 offset-2 offset-sm-1 pt-2">
                                            <div class="row">
                                                <?php
                                                $OptionOrder = range(1, 4);
                                                shuffle($OptionOrder);
                                                foreach ($OptionOrder as $option) {
                                                    $Checked = "";
                                                    $Ticked = "";
                                                    if (isset($Answer[$value->id]) && (int) $Answer[$value->id] == $option) {
                                                        $Checked = " checked";
                                                        $Ticked = $Answer[$value->id];
                                                    }
                                                    $OptionName = "option_" . $option;
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="answer[{{$value->id}}]" value="{{$option}}" {{$Checked}} autocomplete="off"> {{$value->$OptionName}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>


                        </div>
                        <div class="row text-center">
                            <div class="col-12">
                                <input type="submit" id="submit" value="সাবমিট করুন" class="btn-learn-more text-center" style="margin:  0xp auto"/>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Cta Section -->


    <script type="text/javascript">
        $(document).ready(function () {


            $("#save-answer").click(function () {
                $("#save-answer").html("সেভিং হচ্ছে...");
                $("#message_zone").html("");
                var Data = $("#form").serializeArray();
                $.ajax({
                    url: "{{route('quiz_save')}}",
                    method: "POST",
                    data: Data,
                    success: function (data) {
                        $("#save-answer").html("সেভ করুন");
                        if (data.status) {
                            $("#message_zone").html("সেভ হয়েছে।");
                        } else {
                            $("#message_zone").html("সেভ হয় নাই।" + data.message);
                        }
                    },
                    error: function (error) {
                        $("#save-answer").html("সেভ করুন");
                        $("#message_zone").html("সেভ হয় নাই।" + error.responseText);
                    }
                });
            });


            $("#form").submit(function (e) {
                e.preventDefault();

                $("#submit").attr("disabled", true).val("সাবমিট করা হচ্ছে");

                var Data = $(this).serializeArray();

                $.ajax({
                    url: "{{route('quiz_submit')}}",
                    method: "POST",
                    data: Data,
                    success: function (data) {
                        $("#submit").attr("disabled", false).val("সাবমিট করুন");
                        if (data.status) {
                            alert("আপনার পরীক্ষার রেজাল্ট সেভ করা হয়েছে। রেজাল্ট পরবর্তীতে জানিয়ে দেওয়া হবে।");
                            window.location = window.location.href;
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function (error) {
                        $("#submit").attr("disabled", false).val("সাবমিট করুন");

                        if (error.status == 422) {
                            alert("অসংগতিপূর্ণ ডাটা দেওয়া হয়েছে। পরীক্ষা বাতিল হয়েছে। আবার চেষ্টা করুন।");
                            window.location = window.location.href;
                        } else if (error.status == 408) {
                            alert("রিকুয়েস্টটি টাইম আউট হয়েছে। দয়া করে আবার চেষ্টা করুন।");
                        } else if (error.status == 401) {
                            alert("আপনি সাইন আউট হয়ে গিয়েছেন। দয়া করে আবার সাইন ইন করুন।");
                            window.location = window.location.href;
                        } else if (error.status >= 500) {
                            alert("সার্ভার এরর। দয়া করে আবার চেষ্টা করুন।");
                        } else {
                            alert(error.responseText);
                        }
                    }
                });
            });


            var countDownDate = new Date("{{date("M d, Y H:i:s",session('exam_end'))}}").getTime();
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
                    $(".day").html(days);
                    $(".hour").html(hours);
                    $(".min").html(minutes);
                    $(".sec").html(seconds);
                } else { // If the count down is finished, write some text
                    clearInterval(x);
                    var Text = "00";
                    $(".hour").html(Text);
                    $(".min").html(Text);
                    $(".sec").html(Text);

                    $("#form").submit();
                }
            }, 1000);
        });
    </script>

    <?php
}
?>


@endsection