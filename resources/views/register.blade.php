<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট: @yield('title','সাইন আপ')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}"> <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('assets/digital-bd.png')}}" />
        <style>
            select{
                width: 100px;
                padding: 10px;
                color: #000 !important;
            }
            select option{
                color: #000;
            }

            b{
                color: #006622;
            }
            .text-danger{
                color: darkred !important;
            }

            .bg-danger{
                background-color: darkred !important;
            }

            @media only screen and (max-width: 576px) {
                select{
                    width: 68px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-8 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo text-center">
                                    <a href="{{route('landing')}}">
                                        <img src="{{asset('assets/digital-bd-day.jpeg')}}">
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <h4 class="text-center" style="color: #006622">ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট</h4>
                                        <h5 class=" text-center" style="color: red">রেজিস্ট্রেশন</h5>
                                        <p class="text-center bg-danger text-white p-2"> * চিহ্নিত ফিল্ড গুলো অবশ‌্যই পূরণ করতে হবে। </p>
                                    </div>
                                </div>

                                <?php
                                if (time() < strtotime($RegistrationEnd . "+06:00") && time() > strtotime($RegistrationStart . "+06:00")) {
                                    ?>
                                    <form class="pt-3" method="post" action="<?php echo route('registration') ?>">
                                        @csrf
                                        @include("template-admin.fixed-layout.message")
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <b style="">নাম</b><span class="text-danger">*</span><br/>
                                                    <input type="text" name="name" class="form-control form-control-lg" value="{{old('name')}}" id="exampleInputEmail1" placeholder="পূর্ণ নাম" required>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">ইমেইল</b><span class="text-danger">*</span><br/>
                                                    <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" id="exampleInputEmail1" placeholder="ইমেইল" required>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">মোবাইল নম্বর (১১ ডিজিট)</b><span class="text-danger">*</span><br/>
                                                    <input type="number" name="mobile_number" class="form-control form-control-lg" value="{{old('mobile_number')}}" id="exampleInputEmail1" maxlength="11" placeholder="মোবাইল নম্বর ইংরেজিতে লিখুন" required>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">জন্মতারিখ</b><span class="text-danger">*</span><br/>
                                                    <select name="day" required class="form-conrol">
                                                        <option value="">দিন</option>
                                                        <?php
                                                        for ($i = 1; $i <= 31; $i++) {
                                                            echo "<option value='{$i}'";
                                                            echo (old('day') == $i) ? " selected" : "";
                                                            echo ">{$i}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select name="month" required>
                                                        <option value="">মাস</option>
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            echo "<option value='{$i}'";
                                                            echo (old('month') == $i) ? " selected" : "";
                                                            echo ">{$i}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select name="year" required>
                                                        <option value="">বছর</option>
                                                        <?php
                                                        for ($i = 2015; $i >= 1960; $i--) {
                                                            echo "<option value='{$i}'";
                                                            echo (old('year') == $i) ? " selected" : "";
                                                            echo ">{$i}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">পেশা</b><span class="text-danger">*</span><br/>
                                                    <select name="occupation" id="occupation" required class="form-conrol" style="width: 100%">
                                                        <option value="">পেশা নির্বাচন করুন</option>
                                                        <?php
                                                        foreach (\App\User::$Occupation as $key => $value) {
                                                            echo "<option value='{$key}'";
                                                            echo (old('occupation') == $key) ? " selected" : "";
                                                            echo ">{$value}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <b style="" id="institute_name_header">প্রতিষ্ঠান</b><span class="text-danger">*</span><br/>
                                                    <input type="text" name="institute" id="institute" class="form-control form-control-lg" value="{{old('institute')}}" id="exampleInputEmail1" placeholder="প্রতিষ্ঠান এর নাম লিখুন" required>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <b style="">লিঙ্গ</b><span class="text-danger">*</span><br/>
                                                    <select name="gender"  required class="form-conrol" style="width: 100%">
                                                        <option value="">লিঙ্গ নির্বাচন করুন</option>
                                                        <?php
                                                        foreach (\App\User::$Gender as $key => $value) {
                                                            echo "<option value='{$key}'";
                                                            echo (old('gender') == $key) ? " selected" : "";
                                                            echo ">{$value}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <b style="">জেলা</b><span class="text-danger">*</span><br/>
                                                    <select name="district_id" required class="form-conrol" style="width: 100%">
                                                        <option value="">জেলা নির্বাচন করুন</option>
                                                        <?php
                                                        foreach (\App\District::orderBy('bn', 'asc')->get() as $value) {
                                                            echo "<option value='{$value->id}'";
                                                            echo (old('district_id') == $value->id) ? " selected" : "";
                                                            echo ">{$value->bn}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">ঠিকানা</b><span class="text-danger">*</span><br/>
                                                    <input type="text" name="address" class="form-control form-control-lg" value="{{old('address')}}" id="exampleInputEmail1" placeholder="ঠিকানা লিখুন" required>
                                                </div>
                                                <div class="form-group">
                                                    <b style="">জাতীয় পরিচয় পত্র নম্বর</b><br/>
                                                    <input type="number" name="nid" class="form-control form-control-lg" value="{{old('nid')}}" id="exampleInputEmail1" placeholder="জাতীয় পরিচয় পত্র নম্বর লিখুন">
                                                </div>
                                                @include("new-admin.fixed-layout.captcha")
                                            </div>
                                            <div class="col-md-4 offset-md-2">
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="agree" value="1" class="" style="border: solid gray 1px" required/><a href="#"> আমি সকল শর্তাবলী মেনে নিচ্ছি।</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="সাইন আপ" style="background-color:  #3333cc; border-radius: 10px"/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <h5 class="text-center text-danger">রেজিস্ট্রেশনের সময় শেষ।</h4>
                                        <?php
                                    }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="text-center mt-4 font-weight-light"> <a href="<?php echo route('email_verify_resend') ?>" class="text-primary">পুনরায় ভেরিফিকেশন ইমেইল পাঠান</a></div>

                                            <div class="text-center mt-4 font-weight-light">
                                                <button type="button" onclick="window.location = 'https://digitalbangladesh.gov.bd'" class="btn btn-block btn-warning auth-form-btn" style="background-color: #006622; border-radius: 10px">
                                                    <i class="icon-home mr-2"></i>ওয়েবসাইটে ফিরে যান </button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/js/misc.js')}}"></script>
        <script src="{{asset('admin/js/jquery.js')}}"></script>
        <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $("#captcha").click(function () {
                                                            $.ajax({
                                                                url: "/captcha_img",
                                                                data: {},
                                                                success: function (data) {
                                                                    console.log(data);
                                                                    $("#captcha_img").attr("src", data.src);
                                                                },
                                                                error: function (error) {
                                                                    alert(error.responseText);
                                                                }
                                                            });
                                                        });
                                                    });
        </script>
        <!-- endinject -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1R8EWLC6Z5"></script>
        <script>
                                                    window.dataLayer = window.dataLayer || [];
                                                    function gtag() {
                                                        dataLayer.push(arguments);
                                                    }
                                                    gtag('js', new Date());

                                                    gtag('config', 'G-1R8EWLC6Z5');
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#occupation").change(function () {
                    var Value = $(this).val();

                    if (Value != "") {
                        $("#institute_name_header").html("প্রতিষ্ঠান");
                        if (Value == 'Student') {
                            $("#institute").attr("placeholder", "শিক্ষা প্রতিষ্ঠানের এর নাম লিখুন");
                        } else if (Value == 'Service') {
                            $("#institute").attr("placeholder", "চাকুরিরত প্রতিষ্ঠানের এর নাম লিখুন");
                        } else if (Value == 'Business') {
                            $("#institute").attr("placeholder", "ব‌্যবসায়িক প্রতিষ্ঠানের এর নাম লিখুন");
                        } else if (Value == 'Others') {
                            $("#institute").attr("placeholder", "পেশার নাম লিখুন ");
                            $("#institute_name_header").html("পেশার নাম");
                        }

                    } else {
                        $("#institute").attr("placeholder", "প্রতিষ্ঠানের এর নাম লিখুন");
                        $("#institute_name_header").html("প্রতিষ্ঠান");
                    }
                });
            });
        </script>
    </body>
</html>