<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>S2S: @yield('title','Management Portal')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
        
        <link rel="stylesheet" href="{{asset('admin/vendors/daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/summernote/summernote-bs4.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}"> <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('logo-s2s-.png')}}" />
        
        
        <!-- container-scroller -->
        <!-- plugins:js -->
        
        
        
        <script type="text/javascript" src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script type="text/javascript" src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/misc.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/vendors/moment/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/vendors/daterangepicker/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/vendors/summernote/summernote-bs4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/core.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->
        
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:admin/partials/_navbar.html -->
            @include("template-admin._navbar")
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:admin/partials/_sidebar.html -->
                @include("template-admin._sidebar")
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield("content")
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:admin/partials/_footer.html -->
                    @include("template-admin._footer")
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        
    </body>
</html>