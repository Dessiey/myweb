<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav" style="background-color:#001940">
            @can('varification_access')
                <li class="nav-item">

                </li>

            @endcan
            <li class="nav-item">

                <a href="{{ route('admin.home') }}" class="nav-link">
                    &nbsp;
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            

            @can('settings_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <img src="{{ asset('logo/settingsicon.png') }}" alt="Jimma University Logo" width="20"
                            height="20" />&nbsp;
                        Settings
                    </a>
                    <ul class="nav-dropdown-items">
                        
                        @can('publication_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.publications.index') }}"
                                    class="nav-link {{ request()->is('admin/publications') || request()->is('admin/publications/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/settingsicon.png') }}" width="15" height="15" />&nbsp;

                                    </i>
                                    {{ trans('cruds.publication.title') }}
                                </a>
                            </li>
                        @endcan

                        @can('item_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.items.index') }}"
                                    class="nav-link {{ request()->is('admin/items') || request()->is('admin/items/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/settingsicon.png') }}" width="15" height="15" />&nbsp;

                                    </i>
                                    Items
                                </a>
                            </li>
                        @endcan
                       
                        @can('supporter_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.supporters.index') }}"
                                    class="nav-link {{ request()->is('admin/supporters') || request()->is('admin/supporters/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/icons-certificate.png') }}" width="15"
                                        height="15" />&nbsp;
                                    supporters
                                </a>
                            </li>
                        @endcan
                 @can('facility_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.facilities.index') }}"
                                class="nav-link {{ request()->is('admin/facilities') || request()->is('admin/facilities/*') ? 'active' : '' }}">
                                &nbsp; <img src="{{ asset('logo/settingsicon.png') }}" width="15" height="15" />&nbsp;

                                </i>
                                Facilities
                            </a>
                        </li>
                    @endcan
                    



                    </ul>
                </li>
            @endcan

            @can('user_management_access')

                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <img src="{{ asset('logo/icons-user-rights.png') }}" width="20" height="20" />&nbsp;
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions.index') }}"
                                    class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/icons-user-rights.png') }}" width="15" height="15" />

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan

                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}"
                                    class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/icons-user-rights.png') }}" width="15" height="15" />

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    &nbsp; <img src="{{ asset('logo/icons-user-rights.png') }}" width="15" height="15" />

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('activitytrace_access')
                            <li class="nav-item">
                                <a href="admin/user-activity" target="_blank">
                                    &nbsp; &nbsp; &nbsp; <img src="{{ asset('logo/icons-user-rights.png') }}" width="15"
                                        height="15" />

                                    </i>
                                    User Activities
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{-- @can('about_access') --}}
                <li class="nav-item">
                    <a href="{{ route('admin.contactus.index') }}"
                        class="nav-link {{ request()->is('admin/contactus') || request()->is('admin/contactus/*') ? 'active' : '' }}">
                        <img src="{{ asset('logo/icon-request.png') }}" width="20" height="20" />&nbsp;
                        Messages
                    </a>
                </li>
            {{-- @endcan --}}
          
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <img src="{{ asset('logo/icons-logout.png') }}" width="20" height="20" />&nbsp;
                    {{ trans('global.logout') }}
                </a>
            </li>

        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
