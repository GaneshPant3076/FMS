<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
    <a href="{{ route('admin.dashboard') }}" class="kt-menu__link ">
            <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
            </span>
        <span class="kt-menu__link-text">Dashboard</span>
    </a>
</li>
<li class="kt-menu__item kt-menu__item--submenu kt-menu__item--open" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
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
                <a href="{{ route('admin.teacher.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-user">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Teacher</span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ route('admin.teacher.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-user">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Student</span>
                </a>
            </li>
        </ul>
    </div>
</li>
