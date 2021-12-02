<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট: @yield('title','ইমেইল ভেরিফিকেশন ')</title>
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
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}"/> <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('assets/digital-bd.png')}}" />
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
                                <h4 class="text-center" style="color: #006622">ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট</h4>
                                <h6 class="font-weight-light text-center">ভেরিফিকেশন ইমেইল হারিয়ে গেছে? ইমেইল অ‌্যাকাউন্ট দিন</h6>
                                @include('new-admin.fixed-layout.message')
                                <form class="pt-3" method="POST" action="<?php echo route('email_verify_resend') ?>">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" id="exampleInputEmail1" placeholder="ইমেইল ">
                                    </div>

                                    @include("new-admin.fixed-layout.captcha")
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="পুনরায় ভেরিফিকেশন ইমেইল পাঠান" style="background-color: #3333cc; border-radius: 10px"/>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light"><a href="{{route('registration')}}" class="text-primary"> রেজিস্ট্রেশন করুন</a>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        <button type="button" onclick="window.location = 'https://digitalbangladesh.gov.bd'" class="btn btn-block btn-warning auth-form-btn" style="background-color: #006622; border-radius: 10px">
                                            <i class="icon-home mr-2"></i>ওয়েবসাইটে ফিরে যান </button>
                                    </div>
                                </form>
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