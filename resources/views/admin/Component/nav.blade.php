<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element logo">

                    <a href="{{ route('trangchu.index') }}" class="d-none d-lg-block" style="font-size: 16px"> WEBSITE</a>
                </div>
                <div class="logo-element">
                    <img src="{{ asset('backend') }}/img/logo.png" alt="" srcset="">
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Quản lí bài viết</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('quantri.posts.index') }}">Quản lí bài viết</a></li>
                    <li><a href="{{ route('quantri.categories.index') }}">Quản lí tdanh mục</a>
                    </li>

                </ul>
            </li>
            <li><a href="{{ route('noti.index') }}">Quản lí thông báo</a></li>

            <li>
                <a href="{{ route('quantri.user.index') }}"><span class="nav-label">Quản lí người dùng</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Quản lí
                        chung</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('quantri.majors.index') }}">Quản lí ngành</a></li>
                    <li><a href="{{ route('quantri.years.index') }}">Quản lí năm học</a></li>
                    <li><a href="{{ route('quantri.subject_blocks.index') }}">Quản lí Khối</a></li>
                    <li><a href="{{ route('quantri.cutoff_scores.years') }}">Quản lí điểm chuẩn</a></li>
                    <li><a href="{{ route('quantri.province.index') }}">Quản lí khu vực</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Quản lí thí
                        sinh</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('applicants.index') }}">Quản lí thí sinh</a></li>
                    <li><a href="{{ route('quantri.applicants.withCutoffScores') }}">Quản lí thí sinh trúng
                            tuyển</a>
                    </li>

                </ul>
            </li>
            <li><a href="{{ route('login') }}">Đăng nhập</a></li>

        </ul>
    </div>
</nav>
