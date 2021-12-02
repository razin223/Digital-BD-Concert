@extends("quiz_template")

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
    <h2 class="text-center">অনুশীলন</h2>
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
                    url: "{{route('practice_new')}}",
                    method: "POST",
                    data: $("#form").serializeArray(),
                    success: function (data) {
                        if (data.status) {
                            window.location = window.location.href;
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
<!--                        <h5>মূল ইভেন্ট শুরু হবার আগে বারবার অনুশীলন করুন। অনুশীলনের মাধ‌্যমে নিজেকে যাচাই করে নিন। &nbsp;&nbsp;<input type="submit" class="btn btn-primary btn-lg" value="অনুশীলন করুন"/></h5>-->
                    </form>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="text-center">অনুশীলনসমূহ</h4>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>পরীক্ষার দেওয়ার সময়</th>
                                <th>প্রাপ্ত নম্বর</th>
                                <th>সময় নিয়েছেন</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $TemporatyResult = \App\TemporaryExam::where('user_id', auth()->id())
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(50);

                            if ($TemporatyResult->count()) {
                                $Sl = ($TemporatyResult->currentPage() - 1) * $TemporatyResult->perPage();
                                foreach ($TemporatyResult as $Data) {


                                    $Sl++;

                                    $Min = floor($Data->time_taken / 60);
                                    $Second = $Data->time_taken % 60;
                                    $TimeTaken = $Min > 0 ? $Min . " মিনিট " . $Second . " সেকেন্ড" : $Second . " সেকেন্ড";
                                    ?>
                                    <tr>
                                        <td>{{str_replace($English, $Bangla,$Sl)}}</td>
                                        <td>{{str_replace($English, $Bangla, date("d-m-Y h:i:A", strtotime($Data->created_at))) }}</td>
                                        <td>{{str_replace($English, $Bangla, (float) $Data->mark_obtained) }}</td>
                                        <td>{{str_replace($English, $Bangla, $TimeTaken) }}</td>
                                        <td class="text-center">
                                            <a href="{{route('answer_sheet',$Data->id)}}" data-id="{{$Data->id}}" class="btn btn-info exam-detail">উত্তরপত্র দেখুন</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center text-danger">কোন ডাটা পাওয়া যায় নাই।</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if ($TemporatyResult->count()) {
                        ?>
                        {{ $TemporatyResult->links() }}
                        <?php
                    }
                    ?>
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
                    <h5>পেজ রিফ্রেস/রিলোড করবেন না। পেজ রিফ্রেস/রিলোড করলে সকল দাগানো উত্তর মুছে যাবে। <br/>সকল উত্তর দাগানো শেষে <strong>“সাবমিট করুন”</strong> বাটনটি চাপুন।</h5>
                </div>


                <div class="col-12 d-flex justify-content-center" style="width: 100%">

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
                    <form id="form">
                        @csrf

                        <?php
                        $QuestionIds = explode(",", session('questions'));

                        $Question = \App\Question::whereIn('id', $QuestionIds)
                                ->orderByRaw(\DB::raw("FIELD(id, " . session('questions') . ")"))
                                ->get();

                        if ($Question->count()) {
                            $Sl = 0;

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
                                                $OptionName = "option_" . $option;
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="answer[{{$value->id}}]" value="{{$option}}"> {{$value->$OptionName}}
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

            $("#form").submit(function (e) {
                e.preventDefault();

                $("#submit").attr("disabled", true).val("সাবমিট করা হচ্ছে");

                var Data = $(this).serializeArray();

                $.ajax({
                    url: "{{route('answer_submit')}}",
                    method: "POST",
                    data: Data,
                    success: function (data) {
                        $("#submit").attr("disabled", false).val("সাবমিট করুন");
                        if (data.status) {
                            window.location = window.location.href;
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

                    $("#form").submit();
                }
            }, 1000);
        });
    </script>

    <?php
}
?>


@endsection