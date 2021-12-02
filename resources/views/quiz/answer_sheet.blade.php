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
    <h2 class="text-center">উত্তরপত্র</h2>
</section>

<?php
$English = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
$Bangla = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
?>


<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">

        <div class="row">

            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <div style="width: 150px; margin: 0px auto">
                            <span class='text-success'><i class='icofont-tick-mark'></i></span> প্রদত্ত সঠিক উত্তর<br/>
                            <span class='text-dark'><i class='icofont-tick-mark'></i></span> সঠিক উত্তর<br/>
                            <span class='text-danger'><i class='icofont-close-line'></i></span> প্রদত্ত ভুল উত্তর<br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">&nbsp;</div>




            <div class="col-12 question">


                <?php
                $Data = \App\TemporaryExam::find($id);

                if ($Data != null) {

                    if ($Data->user_id == auth()->id()) {

                        $QuestionIds = explode(",", $Data->questions);

                        $Question = \App\Question::whereIn('id', $QuestionIds)
                                ->orderByRaw(\DB::raw("FIELD(id, " . $Data->questions . ")"))
                                ->get();

                        if ($Question->count()) {
                            $Sl = 0;

                            $Answer = json_decode($Data->answer_submitted, true);

                            if (count($Answer)) {
                                $Answer = $Answer['answer'];
                            }

                            //dd($Answer);

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
                                            //shuffle($OptionOrder);
                                            foreach ($OptionOrder as $option) {
                                                $OptionName = "option_" . $option;

                                                $icon = "";

                                                if ($option == $value->answer) {
                                                    //option is answer
                                                    if (isset($Answer[$value->id]) && $Answer[$value->id] == $option) {
                                                        $icon = "<span class='text-success'><i class='icofont-tick-mark'></i></span>";
                                                    } else {
                                                        $icon = "<span class='text-dark'><i class='icofont-tick-mark'></i></span>";
                                                    }
                                                } else {
                                                    //option is not answer
                                                    if (isset($Answer[$value->id]) && $Answer[$value->id] == $option) {
                                                        $icon = "<span class='text-danger'><i class='icofont-close-line'></i></span>";
                                                    }
                                                }

//                                                if (isset($Answer[$value->id])) {
//                                                    if ($option == $value->answer) {
//                                                        if ($option == $Answer[$value->id]) {
//                                                            //right answer given
//                                                            $icon = "<span class='text-success'><i class='icofont-tick-mark'></i></span>";
//                                                        } else {
//                                                            //wrong answer given
//                                                            $icon = "<span class='text-danger'><i class='icofont-close-line'></i></span>";
//                                                        }
//                                                    } else {
//                                                        if ($option == $Answer[$value->id]) {
//                                                            //wrong answer given
//                                                            $icon = "<span class='text-danger'><i class='icofont-close-line'></i></span>";
//                                                        }
//                                                    }
//                                                } else {
//                                                    if ($option == $value->answer) {
//                                                        $icon = "<span class='text-dark'><i class='icofont-tick-mark'></i></span>";
//                                                    }
//                                                }
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {!! $icon !!}{{$value->$OptionName}}
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
                    } else {
                        ?>
                        <h3 class="text-center w-100">আপনার এই উত্তরপত্র দেখার কোন অনুমতি নাই।</h3>
                        <?php
                    }
                } else {
                    ?>
                    <h3 class="text-center w-100">কোন ডাটা পাওয়া যায় নাই।</h3>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>
</section><!-- End Cta Section -->




@endsection