<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mujib Olympiad: @yield('title','Sign Up')</title>
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
        <link rel="shortcut icon" href="{{asset('assets/img/mujib_olympiad_logo.png')}}" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo text-center">
                                    <a href="{{route('en.landing')}}">
                                        <img src="{{asset('assets/img/mujib_olympiad_logo.png')}}">
                                    </a>
                                </div>
                                <h4 class="text-center">Mujib Olympiad</h4>
                                <h6 class="font-weight-light text-center">Sign up is very easy. It will take a minute.</h6>
                                <?php
                                if (time() < strtotime("2021-06-25 15:00:00+06:00")) {
                                ?>
                                <form class="pt-3" method="post" action="<?php echo route('en.register') ?>">
                                    @csrf
                                    @include("template-admin.fixed-layout.message")
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" id="exampleInputEmail1" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Re-enter password again" required>
                                    </div>
                                    @include("new-admin.fixed-layout.en_captcha")
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" name="agree" value="1" class="" style="border: solid gray 1px" required/><a href="#"> I agree with all terms and conditions.</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Sign Up" style="background-color: #1B783C; border-radius: 10px"/>
                                    </div>
                                </form>
                                <?php
                                }else{
                                    ?>
                                <h5 class="text-center text-danger">Registration Time is up.</h4>
                                <?php
                                }
                                ?>
                                <div class="text-center mt-4 font-weight-light">
                                    <button type="button" onclick="window.location = '{{route('en.landing')}}'" class="btn btn-block btn-warning auth-form-btn" style="background-color: #916226; border-radius: 10px">
                                        <i class="icon-home mr-2"></i>Go back to website </button>
                                </div>
                                <!--                                <div class="text-center mt-4 font-weight-light">
                                                                    <h5>অথবা </h5><br/>
                                                                    <button type="button" onclick="window.location = '#/auth/google'" class="btn btn-block btn-google auth-form-btn">
                                                                        <i class="icon-social-google mr-2"></i>গুগল দিয়ে সাইন আপ করুন </button>
                                
                                                                    <button type="button" onclick="window.location = '#/auth/facebook'" class="btn btn-block btn-facebook auth-form-btn">
                                                                        <i class="icon-social-facebook mr-2"></i>ফেসবুক দিয়ে সাইন আপ করুন </button>
                                                                </div>-->
                                <div class="text-center mt-4 font-weight-light"> Have an account? <a href="<?php echo route('en.login') ?>" class="text-primary">Sign In</a></div>
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
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-S40SWR6RJT"></script>
        <script>
                                        window.dataLayer = window.dataLayer || [];
                                        function gtag() {
                                            dataLayer.push(arguments);
                                        }
                                        gtag('js', new Date());

                                        gtag('config', 'G-S40SWR6RJT');
        </script>
    </body>
</html>