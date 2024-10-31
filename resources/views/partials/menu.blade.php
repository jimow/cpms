<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('project_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.project.title') }}
                </a>
            </li>
        @endcan
        @can('feedback_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.feedbacks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/feedbacks") || request()->is("admin/feedbacks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.feedback.title') }}
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/counties*") ? "c-show" : "" }} {{ request()->is("admin/sub-counties*") ? "c-show" : "" }} {{ request()->is("admin/wards*") ? "c-show" : "" }} {{ request()->is("admin/ministries*") ? "c-show" : "" }} {{ request()->is("admin/departments*") ? "c-show" : "" }} {{ request()->is("admin/financial-years*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('county_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.counties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/counties") || request()->is("admin/counties/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-closed-captioning c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.county.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sub_county_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sub-counties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-counties") || request()->is("admin/sub-counties/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subCounty.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ward_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wards") || request()->is("admin/wards/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-angle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ward.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ministry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ministries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ministries") || request()->is("admin/ministries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ministry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('department_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.department.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('financial_year_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.financial-years.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/financial-years") || request()->is("admin/financial-years/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-affiliatetheme c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.financialYear.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>