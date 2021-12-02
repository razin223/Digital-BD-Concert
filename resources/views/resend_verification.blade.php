<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ডিজিটাল বাংলাদেশ কুইজ: @yield('title','ইমেইল ভেরিফিকেশন ')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="admin/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="admin/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="admin/css/style.css"> <!-- End layout styles -->
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
                                    <img src="{{asset('assets/digital-bd-day.jpeg')}}">
                                </div>
                                <h4 class="text-center">ডিজিটাল বাংলাদেশ কুইজ</h4>
                                <h6 class="font-weight-light text-center">Signing up is easy. It only takes a few minutes</h6>
                                <form class="pt-3" method="post" action="<?php echo route('register') ?>">
                                    @csrf
                                    @include("template-admin.fixed-layout.message")
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" id="exampleInputEmail1" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Password Again" required>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" name="agree" value="1" class="form-check-input" required/> I agree to all Terms & Conditions </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP"/>
                                    </div>
                                </form>
                                <div class="text-center mt-4 font-weight-light">
                                    <h5>Or </h5><br/>
                                    <button type="button" onclick="window.location = '/auth/google'" class="btn btn-block btn-google auth-form-btn">
                                        <i class="icon-social-google mr-2"></i>Connect using Google </button>

                                    <button type="button" onclick="window.location = '/auth/facebook'" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?php echo route('login') ?>" class="text-primary">Login</a></div>
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
        <script src="admin/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="admin/js/off-canvas.js"></script>
        <script src="admin/js/misc.js"></script>
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