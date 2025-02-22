<!--=========================*
               Sidebar
   *===========================-->
   {{-- <style>
    .vz_main_container{
        margin-left: 126px;
    }
    .vz_navbar{
        width:125px;
    }
   </style> --}}


     <nav class="vz_navbar">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="vz_navigation">
                <ul class="sidebar nav flex-column">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link text-center" href="{{ route('dashboard') }}" data-nav="dashboard"><i class="feather ft-home"></i><span>Dashboard</span></a></li>
                    
                    @can('user.view')
                    <li class="{{ request()->route()->named('user.*') || request()->route()->named('role.*') ? 'active' : '' }}"><a class="nav-link text-center" href="{{ route('user.index') }}" data-nav="ui_features"><i class="feather ft-gitlab"></i><span>Users</span></a></li>
                    @endcan

                    <li class="{{ request()->routeIs('follow_up.*') || request()->route()->named('admission.*') ||  request()->route()->named('student.*')||request()->route()->named('domain_class.*')|| request()->route()->named('priority.*') ? 'active' : '' }}"><a class="nav-link text-center" href="javascript:void(0);" data-nav="advance_kit"><i class="feather ft-clipboard"></i><span>Follow Up</span></a></li>
                    <li class="{{request()->route()->named('calendar.*')||request()->route()->named('event.*') || request()->route()->named('student-fees-dashboard.*') ||  request()->routeIs('student-fees.*') ? 'active' : '' }}"><a class="nav-link text-center" href="javascript:void(0);"  data-nav="apps"><i class="fas fa-hand-holding-usd"></i><span>Fees</span></a></li>
                    {{-- <li><a class="nav-link text-center" href="javascript:void(0);" data-nav="forms"><i class="feather ft-clipboard"></i><span>Forms</span></a></li>
                    <li><a class="nav-link text-center" href="javascript:void(0);" data-nav="maps"><i class="feather ft-map-pin"></i><span>Maps</span></a></li>
                    <li><a class="nav-link text-center" href="javascript:void(0);" data-nav="data"><i class="feather ft-file-text"></i><span>Data</span></a></li> --}}
                    <li class="{{ request()->routeIs('menu.*') || request()->routeIs('user-profile.*') ? 'active' : '' }}"><a class="nav-link text-center" href="javascript:void(0);" data-nav="pages"><i class="fas fa fa-cog"></i><span>Setting</span></a></li>
                </ul>
                <div class="sidebar_content">
                    <div class="vz_sidebar_link dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>Versions</label>
                            </li>
                            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}" class="nav-link"><i class="feather ft-activity mr-2"></i>Dashboard</a>
                            </li>
                          
                        </ul>
                    </div>
                   
                    <div class="vz_sidebar_link ui_features {{ request()->route()->named('user.*') || request()->route()->named('role.*') ? 'active' : '' }}">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>User Settings</label>
                            </li>
                           
                            @can('user.view')
                            <li class="nav-item {{ request()->route()->named('user.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="menu_icon ti-user"></i><span>{{ ucwords( $menuNames['user_' . $company_id] ?? 'Users') }}</span></a></li>
                            @endcan

                            {{-- @can('role.view')
                            <li class="nav-item {{ request()->route()->named('role.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('role.index') }}"><i class="menu_icon ti-layout-accordion-separated"></i><span>Role</span></a></li>
                            @endcan --}}
                        </ul>
                       
                    </div>
                    <div class="vz_sidebar_link advance_kit {{ request()->routeIs('follow_up.*') ||  request()->route()->named('admission.*')|| request()->route()->named('student-class-type.*') || request()->route()->named('priority.*') || request()->route()->named('student.*') || request()->route()->named('domain_class.*') ? 'active' : '' }}">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>Follow Up</label>
                            </li>
                            

                            @can('follow_up.edit')
                            <li class="nav-item {{ (request()->route()->named('follow_up.index') || request()->route()->named('follow_up.edit')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('follow_up.index') }}"><i class="menu_icon ti-layout-cta-left"></i> <span>{{ ucwords( $menuNames['follow_up_' . $company_id] ?? 'Follow Up' )}}</span></a></li>
                            @endcan

                            @if(Auth::user()->role != 'admin')

                          
                            @can('follow_up.create')

                            <li class="nav-item {{ request()->route()->named('follow_up.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('follow_up.create') }}"><i class="menu_icon ti-layout-media-overlay-alt-2"></i> <span>{{ ucwords($menuNames['create_follow_up_' . $company_id] ?? 'Create Follow Up' )}}</span></a></li>
                            @endcan
                            @endif

                            @if(Auth::user()->role != 'user')
                           
                        
                        <li class="nav-item {{ request()->route()->named('domain_class.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('domain_class.index') }}">
                                <i class="menu_icon ion-crop"></i>
                                <span>{{ $menuNames['domain_class_' . $company_id] ?? 'Add Domain / Class' }}</span>
                            </a>
                        </li>
                        
                           
                        
                           
                            <li class="nav-item {{ request()->route()->named('priority.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('priority.index') }}"><i class="menu_icon ion-load-a"></i> <span>{{ucwords( $menuNames['priority_' . $company_id] ?? 'Priority') }}</span></a></li>
                           
                           
                            @endif
                            @can('student.view')
                            <li class="nav-item {{ request()->route()->named('student.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('student.index') }}"><i class="menu_icon ti-flag-alt"></i> <span>{{ ucwords($menuNames['student_' . $company_id] ?? 'Student' )}}</span></a></li>
                            @endcan
                            @can('admission.view')
                            <li class="nav-item {{ request()->route()->named('admission.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admission.index') }}"><i class="menu_icon ion-load-b"></i> <span>{{ucwords( $menuNames['admission_' . $company_id] ?? 'Admission') }}</span></a></li>
                            @endcan
                            {{-- <li class="nav-item"><a class="nav-link" href="app-tour.html"><i class="menu_icon ti-flag-alt"></i> <span>App Tour</span></a></li>
                          
                            <li class="nav-item"><a class="nav-link" href="dropzone.html"><i class="menu_icon ti-layout-placeholder"></i> <span>Dropzone</span></a></li> --}}
                        </ul>
                    </div>
                    {{-- <div class="vz_sidebar_link forms">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>Forms</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="form-basic.html"><i class="menu_icon ion-edit"></i><span>Basic ELements</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="form-layouts.html"><i class="menu_icon ti-layout-grid2-thumb"></i><span>Form Layouts</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="form-groups.html"><i class="menu_icon ion-ios-paper"></i><span>Input Groups</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="form-validation.html"><i class="menu_icon ion-android-cancel"></i><span>Form Validation</span></a></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="vz_sidebar_link maps">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>Maps</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="google-maps.html"><i class="menu_icon icon-map"></i><span>Google Maps</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="am-maps.html"><i class="menu_icon icon-map-pin"></i><span>AM Chart Maps</span></a></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="vz_sidebar_link data">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>Table</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="basic-table.html"><i class="menu_icon ion-ios-grid-view"></i><span>Basic Tables</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="datatable.html"><i class="menu_icon ti-layout-slider-alt"></i><span>Datatable</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="js-grid.html"><i class="menu_icon ti-view-list-alt"></i><span>Js Grid Table</span></a></li>

                            <li class="nav-item menu_title">
                                <label>Editors</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="text-editor.html"><i class="menu_icon ti-uppercase"></i><span>Text Editor</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="code-editor.html"><i class="menu_icon ion-code"></i><span>Code Editor</span></a></li>

                            <li class="nav-item menu_title">
                                <label>Charts</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="chart-js.html"><i class="menu_icon feather ft-bar-chart"></i><span>Chart Js</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="morris-charts.html"><i class="menu_icon feather ft-bar-chart-2"></i><span>Morris Chart Js</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="c3-chart.html"><i class="menu_icon feather ft-bar-chart-line"></i><span>C3 Chart Js</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="chartist.html"><i class="menu_icon feather ft-bar-chart-line-"></i><span>Chartist Js</span></a></li>
                        </ul>
                    </div> --}}
                    <div class="vz_sidebar_link pages {{ request()->routeIs('menu.*') || request()->routeIs('user-profile.*') ? 'active' : '' }}">
                       
                        <ul class="nav vz_inner_nav">
                          
                            <li class="nav-item menu_title">
                                <label>Other Pages</label>
                            </li>
                            <li class="nav-item {{ request()->route()->named('user-profile.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user-profile.index') }}"><i class="menu_icon feather ft-user-check"></i><span>Profile</span></a></li>
                            @if(Auth::user()->role != 'user' && Auth::user()->role != 'super-admin')
                            <li class="nav-item {{ request()->route()->named('menu.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('menu.create') }}"><i class="menu_icon feather ft-layers"></i><span>Menu</span></a></li>
                            @endif
                            @if(Auth::user()->role != 'user' && Auth::user()->role != 'super-admin')
                            <li class="nav-item {{ request()->route()->named('menu.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('menu.index') }}"><i class="menu_icon feather ft-clock"></i><span>Subscriptions</span></a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="invoice.html"><i class="menu_icon feather ft-paperclip"></i><span>Invoice</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="pricing.html"><i class="menu_icon feather ft-dollar-sign"></i><span>Pricing</span></a></li>
                          
                           
                        </ul>
                    </div>

                    <div class="vz_sidebar_link apps {{request()->route()->named('calendar.*')||request()->route()->named('event.*')||request()->route()->named('student-fees-dashboard.*') || request()->route()->named('student-fees.*')  ? 'active' : '' }}">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title" >
                                <label>Fees Managment</label>
                            </li>
                            @can('student-fees-dashboard.view')
                            <li class="nav-item {{ request()->route()->named('student-fees-dashboard.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('student-fees-dashboard.index') }}">
                                    <i class="menu_icon feather ft-image"></i>
                                    <span>Fees Dashboard</span>
                                </a>
                            </li>
                            @endcan
                            @can('student-fees.view')
                            <li class="nav-item {{ request()->route()->named('student-fees.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('student-fees.index') }}"><i class="menu_icon feather ft-calendar"></i><span>{{ ucwords($menuNames['student_fees_' . $company_id] ?? 'Manage Fees' )}}</span></a></li>
                            @endcan
                            @can('student-fees-dashboard.create')
                            <li class="nav-item {{ request()->route()->named('student-fees-dashboard.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('student-fees-dashboard.create') }}" aria-expanded="true"><i class="menu_icon ti-layers-alt"></i><span>{{ ucwords($menuNames['student_fees_dashboard_create_' . $company_id] ?? 'Outstanding Fees' )}}</span></a></li>
                            @endcan
                            @can('calendar.view')
                            <li class="nav-item {{ request()->route()->named('calendar.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('calendar.index') }}" aria-expanded="true"><i class="menu_icon feather ft-mail"></i><span>{{ ucwords($menuNames['calendar_' . $company_id] ?? 'Calendar') }}</span></a></li>
                            @endcan

                            @can('event.view')
                            <li class="nav-item {{ request()->route()->named('event.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('event.index') }}"><i class="menu_icon ti-layout-cta-left"></i><span>{{ucwords( $menuNames['event_' . $company_id] ?? 'Add Event') }}</span></a></li>
                            @endcan
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--=========================*
           End Sidebar
*===========================-->