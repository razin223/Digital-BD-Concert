@extends("quiz_template")

@section("content")'

<?php
$ExamBladeSetting = $ExamSetting;
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
    .hidden{
        display: none;
    }



</style>

<section class="breadcrumbs">
    <h2 class="text-center">প্রোফাইল</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">
        <?php
        $Data = \App\User::find(auth()->id());
        $CountryId = $DivisionId = $DistrictId = null;
        if (!empty($Data->district_id)) {
            $DistrictId = $Data->district_id;
            $DivisionId = $Data->getDistrict->division_id;
            $CountryId = $Data->getDistrict->getDivision->country_id;
        } else {
            $CountryId = 1;
        }
        ?>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 hidden" id="profile_edit">
                <h6 class="w-100 text-center font-weight-bold"> <span class="text-danger">*</span> চিহ্নিত ঘরগুলো অবশ‌্যই পূরণ করতে হবে।</h6>
                <?php
                if (\Session::has('error')) {
                    ?>
                    <p class="w-100 text-center text-danger">{{\Session::get('error')}}</p>
                    <?php
                }
                ?>
                <div class="card card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="message_zone"></div>
                        </div>
                        <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> নাম: </label>
                                <div class="col-12">
                                    <input type="text" name="name" value="{{$Data->name}}" class="form-control" placeholder="আপনার পূর্ণ নাম লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> শিক্ষাগত যোগ‌্যতা: </label>
                                <div class="col-12">
                                    <select name="class" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        $Class = [
                                            '3' => "৩য় শ্রেণী",
                                            "4" => "৪র্থ শ্রেণী",
                                            "5" => "৫ম শ্রেণী",
                                            "6" => "৬ষ্ঠ শ্রেণী",
                                            "7" => "৭ম শ্রেণী",
                                            "8" => "৮ম শ্রেণী",
                                            "9" => "৯ম শ্রেণী",
                                            "10" => "১০ম শ্রেণী",
                                            "11" => "১১তম শ্রেণী",
                                            "12" => "১২তম শ্রেণী",
                                            "13"=>"স্নাতক",
                                            "14"=>"স্নাতকোত্তর",
                                            "15"=>"অন‌্যান‌্য"
                                        ];
                                        foreach ($Class as $key => $value) {
                                            echo "<option value='{$key}'";
                                            echo ($Data->class == $key) ? "selected" : "";
                                            echo ">{$value}</option>";
                                        }
                                        ?>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> শিক্ষাপ্রতিষ্ঠান: </label>
                                <div class="col-12">
                                    <input type="text" name="school" value="{{$Data->school}}" class="form-control" placeholder="আপনার শিক্ষাপ্রতিষ্ঠানের নাম লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> লিঙ্গ: </label>
                                <div class="col-12">
                                    <select name="gender" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        $Gender = ['Male' => 'পুরুষ', 'Female' => 'মহিলা', 'Others' => 'অন‌্যান‌্য'];
                                        foreach ($Gender as $key => $value) {
                                            echo "<option value='{$key}'";
                                            echo ($Data->gender == $key) ? "selected" : "";
                                            echo ">{$value}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> ঠিকানা: </label>
                                <div class="col-12">
                                    <input type="text" name="address" value="{{$Data->address}}" class="form-control" placeholder="আপনার ঠিকানা (বাড়ি নং, রোড নং, থানা ইত‌্যাদি) লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> দেশ: </label>
                                <div class="col-12">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <?php
                                        foreach (\App\Country::orderBy('bn', 'asc')->get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($CountryId == $value->id) ? "selected" : "";
                                            echo ">{$value->bn}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> বিভাগ: </label>
                                <div class="col-12">
                                    <select name="division_id" id="division_id" class="form-control">
                                        <?php
                                        if (!empty($CountryId)) {
                                            ?>
                                            <option value=""></option>
                                            <?php
                                            foreach (\App\Division::where('country_id', $CountryId)->orderBy('bn', 'asc')->get() as $value) {
                                                echo "<option value='{$value->id}'";
                                                echo ($DivisionId == $value->id) ? "selected" : "";
                                                echo ">{$value->bn}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> জেলা/শহর: </label>
                                <div class="col-12">
                                    <select name="district_id" id="district_id" class="form-control">
                                        <?php
                                        if (!empty($DivisionId)) {
                                            ?>
                                            <option value=""></option>
                                            <?php
                                            foreach (\App\District::where('division_id', $DivisionId)->orderBy('bn', 'asc')->get() as $value) {
                                                echo "<option value='{$value->id}'";
                                                echo ($DistrictId == $value->id) ? "selected" : "";
                                                echo ">{$value->bn}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> জন্ম তারিখ: </label>
                                <div class="col-12">
                                    {{date("d-m-Y",strtotime($Data->date_of_birth))}} <span class="text-danger">&nbsp;&nbsp;&nbsp;(পরিবর্তন করা সম্ভব নয়)</span>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> জাতীয়তা: </label>
                                <div class="col-12">
                                    <select name="nationality" class="form-control">
                                        <<?php
                                        foreach (\App\Country::orderBy('bn', 'asc')->get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($Data->nationality == $value->id) ? "selected" : "";
                                            echo ">{$value->nationality_bn}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> মোবাইল নম্বর (যোগাযোগের জন‌্য): </label>
                                <div class="col-12">
                                    <input type="text" name="mobile_number" value="{{$Data->mobile_number}}" class="form-control" placeholder="আপনার মোবাইল নম্বর লিখুন"/>
                                    <span class="text-info">মোবাইল নং ইংরেজিতে লিখুন</span>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"> ছবি: </label>
                                <div class="col-12">
                                    <input type="file" name="file" value="" class="form-control" placeholder="আপনার ছবি দিন" accept="image/png, image/jpeg"/>
                                    <span class="text-info">ছবি অবশ‌্যই jpg/jpeg/png হতে হবে এবং 512KB এর নিচে হতে হবে।</span><br/>
                                    <?php
                                    if (!empty($Data->picture)) {
                                        ?>
                                        <img src="{{$Data->picture}}" style="width: 200px"/>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <div class="col-12 text-center">
                                    <input type="submit" value="আপডেট করুন" class="btn btn-info"/>
                                    <a class="btn btn-outline-dark close-button"  href="javascript:;" data-target="profile_edit">বন্ধ করুন</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 offset-md-2 mt-5 hidden" id="password_change">
                <div class="card">
                    <div class="card-body">
                        <form id="form_password">
                            @csrf
                            <h4 class="w-100 text-center font-weight-bold">পাসওয়ার্ড পরিবর্তন</h4>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> বর্তমান পাসওয়ার্ড: </label>
                                <div class="col-12">
                                    <input type="password" name="current_password"  class="form-control reset-password" placeholder="আপনার বর্তমান পাসওয়ার্ড লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> নতুন পাসওয়ার্ড: </label>
                                <div class="col-12">
                                    <input type="password" name="new_password"  class="form-control reset-password" placeholder="আপনার নতুন পাসওয়ার্ড লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> পুনরায় নতুন পাসওয়ার্ড দিন: </label>
                                <div class="col-12">
                                    <input type="password" name="new_password_confirmation" class="form-control reset-password" placeholder=" পুনরায় আপনার নতুন পাসওয়ার্ড লিখুন"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <div class="col-12 text-center">
                                    <input type="submit" value="পরিবর্তন করুন" class="btn btn-info"/>
                                    <a class="btn btn-outline-dark close-button"  href="javascript:;" data-target="password_change">বন্ধ করুন</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <div class="col-12 col-md-8 offset-md-2 mt-5">
                <h6 class="bg-warning text-center text-danger w-100 p-2 m-2 mb-5">প্রোফাইলের সকল তথ‌্য আপডেট না করা থাকলে দয়া করে আপডেট করুন। অন‌্যথায় কুইজে অংশগ্রহন করতে পারবেন না।</h6>
                @include('new-admin.fixed-layout.message')
                <?php
                $Data = \App\User::find(auth()->id());

                if ((time() >= strtotime($ExamBladeSetting[auth()->user()->group]['start']) && time() < strtotime($ExamBladeSetting[auth()->user()->group]['end']))) {
                    ?>

                    <h5 class="text-center m-3"><a href="{{route('quiz')}}" class="btn btn-primary">কুইজে অংশগ্রহণ করুন</a></h5>

                    <?php
                }
                ?>
                <?php
                $Group = ['Ka' => 'ক', 'Kha' => 'খ', 'Ga' => 'গ'];
                ?>
                <h4 class="text-center"><?php echo $Group[$Data->group] ?> গ্রুপ</h4>
                <div class="table-responsive">
                    <table class="table" style="border: solid lightgray 1px">
                        <tbody>
                            <tr>
                                <td rowspan="4" style="border: solid lightgray 1px" class="text-center">
                                    <?php
                                    if ($Data->picture != null) {
                                        ?>
                                        <img src="{{$Data->picture}}" style="max-width: 200px; max-height: 200px"/>
                                        <?php
                                    } else {
                                        ?>
                                        <h6>ছবি দেওয়া হয় নাই</h6>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>নাম: {{($Data->name != null)? $Data->name:"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>মোবাইল নম্বর: {{$Data->mobile_number != null? $Data->mobile_number: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>ইমেইল: {{$Data->email}}</td>
                            </tr>
                            <tr>
                                <td>শিক্ষাগত যোগ‌্যতা: {{$Data->class != null? $Class[$Data->class]: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td> শিক্ষাপ্রতিষ্ঠান: </td>
                                <td>{{$Data->school != null? $Data->school: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>ঠিকানা: </td>
                                <td>
                                    <?php
                                    if ($Data->address != null) {
                                        ?>
                                        {{$Data->address}},
                                        <?php
                                    }
                                    if ($Data->district_id != null) {
                                        ?>
                                        {{$Data->getDistrict->bn}}, {{$Data->getDistrict->getDivision->bn}}, {{$Data->getDistrict->getDivision->getCountry->bn}}
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>জন্ম তারিখ: </td>
                                <td>{{$Data->date_of_birth != null ? date("d-M-Y",strtotime($Data->date_of_birth)):"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>লিঙ্গ: </td>
                                <td>{{$Data->gender != null ? $Gender[$Data->gender]:"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>জাতীয়তা: </td>
                                <td>{{$Data->nationality != null ? $Data->getNationality->nationality_bn:"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr class="text-center">

                                <td colspan="2">
                                    <button class="btn btn-primary edit" data-target="profile_edit">প্রোফাইল পরিবর্তন করুন</button> &nbsp; &nbsp;
                                    <button class="btn btn-info edit" data-target="password_change">পাসওয়ার্ড পরিবর্তন করুন</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Cta Section -->

<script type="text/javascript">
    $(document).ready(function () {


        $(".edit").click(function () {
            var ID = $(this).data('target');

            $("#" + ID).show();

            $('html, body').animate({
                scrollTop: $("#" + ID).offset().top - 120
            }, 1000);
        });

        $(".close-button").click(function () {
            var ID = $(this).data('target');

            $("#" + ID).hide();
        });


        $('#date_of_birth').attr('readonly', true).datepicker({format: 'yyyy-mm-dd', uiLibrary: 'bootstrap4'});

        $("#country_id").change(function () {
            $("#division_id,#district_id").html("");
            if ($(this).val() != "") {
                $("#division_id").html("<option value=''>(লোড হচ্ছে)</option>");
                $.ajax({
                    url: "{{route('division_get')}}",
                    data: {'country_id': $(this).val(), 'order_by': 'bn'},
                    success: function (data) {
                        if (data.length) {
                            var HTML = "<option value=''>(বিভাগ/স্টেট)</option>";
                            for (var i in data) {
                                HTML += "<option value='" + data[i].id + "'>" + data[i].bn + "</option>";
                            }
                            $("#division_id").html(HTML);
                        }
                    },
                    error: function (error) {
                        alert("Error occured." + error.responseText);
                    }
                });
            }
        });




        $("#division_id").change(function () {
            $("#district_id").html("");
            if ($(this).val() != "") {
                $("#district_id").html("<option value=''>(লোড হচ্ছে)</option>");
                $.ajax({
                    url: "{{route('district_get')}}",
                    data: {'division_id': $(this).val(), 'order_by': 'bn'},
                    success: function (data) {
                        if (data.length) {
                            var HTML = "<option value=''>(জেলা/শহর)</option>";
                            for (var i in data) {
                                HTML += "<option value='" + data[i].id + "'>" + data[i].bn + "</option>";
                            }
                            $("#district_id").html(HTML);
                        }
                    },
                    error: function (error) {
                        alert("Error occured." + error.responseText);
                    }
                });
            }
        });

        $("#form").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('profile_update')}}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status) {
                        alert('আপনার প্রোফাইল আপডেট হয়েছে।');
                        window.location = window.location.href;
                    }
                },
                error: function (error) {
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

                    if (typeof message.errors != 'undefined') {
                        var ErrorMessages = message.errors;
                        for (var i in ErrorMessages) {
                            Error += "\n" + ErrorMessages[i][0];
                        }
                    }

                    alert("প্রোফাইল আপডেট করা সম্ভব হয় নাই।\n" + Error);
                }
            });
        });



        $("#form_password").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('profile_password_update')}}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status) {
                        alert('আপনার পাসওয়ার্ড আপডেট হয়েছে।');
                        $(".reset-password").val("");
                    }
                },
                error: function (error) {
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

                    if (typeof message.errors != 'undefined') {
                        var ErrorMessages = message.errors;
                        for (var i in ErrorMessages) {
                            Error += "\n" + ErrorMessages[i][0];
                        }
                    }

                    alert("পাসওয়ার্ড আপডেট করা সম্ভব হয় নাই।\n" + Error);
                }
            });
        });

    });
</script>




@endsection