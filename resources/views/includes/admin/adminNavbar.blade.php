<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/admin/users" class="logo d-flex align-items-center">
            <img src="" alt="">
            <span class="d-none d-lg-block">E-COMMERCE</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            @auth('admin')
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-3" href="#" data-bs-toggle="dropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span class="fs-5 text-danger bold">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    </a><!-- End Profile Iamge Icon -->




            </li><!-- End Profile Nav -->
            @endauth
        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
