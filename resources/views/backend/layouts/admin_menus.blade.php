{{-- <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
    <a href="{{ route('admin.dashboard') }}" class="kt-menu__link ">
        <span class="kt-menu__link-icon">
        </span>
        <span class="kt-menu__link-text">Dashboard</span></a>
</li> --}}

<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
        data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--open" aria-haspopup="true"
                data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon">
                        <i class="la la-users">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Users</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu " kt-hidden-height="400" style="">
                    <span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.admin.index') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="la la-user">
                                    </i>
                                </span>
                                <span class="kt-menu__link-text">Admin</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.teacher.index') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="la la-user">
                                    </i>
                                </span>
                                <span class="kt-menu__link-text">Teacher</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.student.index') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="la la-user">
                                    </i>
                                </span>
                                <span class="kt-menu__link-text">Student</span>
                            </a>
                        </li>

                    </ul>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class=" la la-align-justify">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Faculty</span>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-bars">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Semester</span>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-graduation-cap">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Batch</span>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Note</span>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Assignment</span>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('faculty.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-gear">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">settings</span>
                </a>
            </li>
    </div>
    </li>
</div>
</div>
