<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('template-new-admin.fixed-layout.head')


    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">





            @include('template-new-admin.fixed-layout.navbar')

            @include('template-new-admin.fixed-layout.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">{{$title}}</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <!--                                <ol class="breadcrumb float-sm-right">
                                <?php
                                foreach (request()->segments() as $value) {
                                    ?>
                                                                                <li class="breadcrumb-item"><a href="#">{{ucfirst($value)}}</a></li>
                                    <?php
                                }
                                ?>
                                                                </ol>-->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @include('template-admin.fixed-layout.message')
                        @yield("content")
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('template-new-admin.fixed-layout.footer')
        </div>
        <!-- ./wrapper -->
        <div class="modal" id="loading-Modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">


                    <div class="modal-body text-center">
                        <div class="spinner-border text-warning"></div>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>
