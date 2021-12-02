<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
<!--        <img src="{{asset('assets/img/BIG.png')."?".time()}}" alt="BIG Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8; background-color: white" >-->
        <span class="brand-text font-weight-light">Digital Bangladesh Quiz</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php
        $User = \Auth::user();
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{($User->picture == NULL)? asset('assets/icon/default_profile.png'): $User->picture}}" class="img-circle" style="width: 50px" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="padding: 7px 0px; font-size: 1rem; overflow: hidden">{{$User->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">Admin</li>
                <li class="nav-item">
                    <a href="{{route('admin.password_change')}}" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
               
                <?php
                if (auth()->user()->user_type == 'Admin') {
                    ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                User
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('User.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('User.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>




            </ul>
        </nav>
        <!--/.sidebar-menu -->
    </div>
    <!--/.sidebar -->
</aside>
