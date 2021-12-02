<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo" href="{{route('admin_dashboard')}}">
            <img src="{{asset('logo-s2s.png')}}" alt="logo" class="logo-dark" />
            <span style="color: white">S2S</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('admin_dashboard')}}"><img src="{{asset('logo-s2s.png')}}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome to S2S dashboard!</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
            <!--<form class="search-form d-none d-md-block" action="#">
                <i class="icon-magnifier"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>-->
            <!--<li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>-->
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="icon-speech"></i>
                    <span class="count">7</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                        <span class="badge badge-pill badge-primary float-right">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{asset('admin/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic"> </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                            <p class="font-weight-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="admin/images/faces/face12.jpg" alt="image" class="img-sm profile-pic"> </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                            <p class="font-weight-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="admin/images/faces/face1.jpg" alt="image" class="img-sm profile-pic"> </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                            <p class="font-weight-light small-text"> The meeting is cancelled </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                <a class="nav-link"  href="{{route('profile_edit')}}" >
                    <?php
                    if (\Auth::user()->picture == NULL) {
                        \Auth::user()->picture = "default.jpg";
                    }
                    ?>
                    <img class="img-xs rounded-circle ml-2" src="{{asset('profile_pictures/'.\Auth::user()->picture)}}" alt="Profile image"></a>
            </li>
            <li class="nav-item dropdown">
                <form id="logout" method="POST" action="/logout">
                    @csrf
                </form>
                <button href="javascript:;" onclick="document.getElementById('logout').submit();" class="btn btn-danger btn-rounded btn-icon"><i class="icon-power"></i></button>
            </li>
            <!--<li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
                <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="d-inline-flex mr-3">
                        <i class="flag-icon flag-icon-us"></i>
                    </div>
                    <span class="profile-text font-weight-normal">English</span>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                    <a class="dropdown-item">
                        <i class="flag-icon flag-icon-us"></i> English </a>
                    <a class="dropdown-item">
                        <i class="flag-icon flag-icon-fr"></i> French </a>
                    <a class="dropdown-item">
                        <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                    <a class="dropdown-item">
                        <i class="flag-icon flag-icon-ru"></i> Russian </a>
                </div>
            </li>-->

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>