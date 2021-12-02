<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ডিজিটাল বাংলাদেশ কুইজ: @yield('title','সাইন আপ')</title>
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
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo text-center">
                                    <a href="{{route('landing')}}">
                                        <img src="{{asset('assets/digital-bd-day.jpeg')}}">
                                    </a>
                                </div>
                                <h3 class="text-center">ডিজিটাল বাংলাদেশ কুইজ</h3>
                                <h5 class=" text-center"> গ্রুপ ক রেজিস্ট্রেশন (৮-১২ বছর)</h5>
                                <?php
                                if (time() < strtotime($RegistrationEnd . "+06:00") && time() > strtotime($RegistrationStart . "+06:00")) {
                                    ?>
                                    <form class="pt-3" method="post" action="<?php echo route('ka_group_registration') ?>">
                                        @csrf
                                        @include("template-admin.fixed-layout.message")
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-lg" value="{{old('name')}}" id="exampleInputEmail1" placeholder="পূর্ণ নাম" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" id="exampleInputEmail1" placeholder="ইমেইল" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="পাসওয়ার্ড" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="পুনরায় পাসওয়ার্ড দিন" required>
                                        </div>
                                        <div class="form-group">
                                            <b style="font-size: 0.75em; color: #c9c8c8">জন্মতারিখ</b><br/>
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
                                                for ($i = 2015; $i >= 2000; $i--) {
                                                    echo "<option value='{$i}'";
                                                    echo (old('year') == $i) ? " selected" : "";
                                                    echo ">{$i}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        @include("new-admin.fixed-layout.captcha")
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <label>
                                                    <input type="checkbox" name="agree" value="1" class="" style="border: solid gray 1px" required/><a href="#"> আমি সকল শর্তাবলী মেনে নিচ্ছি।</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="সাইন আপ" style="background-color: #1B783C; border-radius: 10px"/>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <h5 class="text-center text-danger">রেজিস্ট্রেশনের সময় শেষ।</h4>
                                        <?php
                                    }
                                    ?>
                                    <div class="text-center mt-4 font-weight-light"> অ‌্যাকাউন্ট আছে? <a href="<?php echo route('login') ?>" class="text-primary">সাইন ইন করুন</a></div>
                                    <div class="text-center mt-4 font-weight-light"> সাইন আপ করুন &rarr; <a href="{{route('ka_group_registration')}}" class="text-primary"> গ্রুপ ক</a> <a href="{{route('kha_group_registration')}}" class="text-primary"> গ্রুপ খ</a> <a href="{{route('ga_group_registration')}}" class="text-primary"> গ্রুপ গ</a>

                                        <div class="text-center mt-4 font-weight-light">
                                            <button type="button" onclick="window.location = 'https://digitalbangladesh.gov.bd'" class="btn btn-block btn-warning auth-form-btn" style="background-color: #916226; border-radius: 10px">
                                                <i class="icon-home mr-2"></i>ওয়েবসাইটে ফিরে যান </button>
                                        </div>
                                        <!--                                <div class="text-center mt-4 font-weight-light">
                                                                            <h5>অথবা </h5><br/>
                                                                            <button type="button" onclick="window.location = '#/auth/google'" class="btn btn-block btn-google auth-form-btn">
                                                                                <i class="icon-social-google mr-2"></i>গুগল দিয়ে সাইন আপ করুন </button>
                                        
                                                                            <button type="button" onclick="window.location = '#/auth/facebook'" class="btn btn-block btn-facebook auth-form-btn">
                                                                                <i class="icon-social-facebook mr-2"></i>ফেসবুক দিয়ে সাইন আপ করুন </button>
                                                                        </div>-->
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
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-TQHXC1MMX1"></script>
            <script>
                                                            window.dataLayer = window.dataLayer || [];
                                                            function gtag() {
                                                                dataLayer.push(arguments);
                                                            }
                                                            gtag('js', new Date());

                                                            gtag('config', 'G-TQHXC1MMX1');
            </script>
    </body>
</html>