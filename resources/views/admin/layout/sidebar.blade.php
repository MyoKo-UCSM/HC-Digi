<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="#">
            <img alt="Logo" src="{{ asset('backend/images/GRG-Logo.png') }}" class="logo" style="width: 170px; height: 65px;object-fit:contain" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="{{ asset('bootstrap-icons') }}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <div class="menu-content pt-2 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                <div class="menu-item menu-accordion">
                    <a class=" menu-link {{ isset($page) && $page == 'dashboard' ? 'active' : ''}}" href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-2 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Main</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion
                    @isset($page) 
                        @if($page == 'grade' || $page == 'employee' ||  $page  == 'department' ||  $page  == 'sub-department' ||  $page  == 'blood-group' || $page == 'position' || $page == 'location') hover show @endif                
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Master Data</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'location' ? 'active' : '' }}" href="{{ route('location.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Location</span>
                            </a>
                        </div>                        
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'department' ? 'active' : '' }}" href="{{ route('department.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Department</span>
                            </a>
                        </div>                        
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'sub-department' ? 'active' : '' }}" href="{{ route('sub-department.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">SubDepartment</span>
                            </a>
                        </div>                        
                    </div>                    
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'grade' ? 'active' : '' }}" href="{{ route('grade.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Job Grade</span>
                            </a>
                        </div>                        
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'position' ? 'active' : '' }}" href="{{ route('position.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Job Position</span>
                            </a>
                        </div>                        
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'blood-group' ? 'active' : '' }}" href="{{ route('blood-group.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Blood Group</span>
                            </a>
                        </div>                        
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'employee' ? 'active' : '' }}" href="{{ route('employee.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Employee</span>
                            </a>
                        </div>                        
                    </div>
                                        
                </div>
                {{--
                <div class="menu-item">
                    <div class="menu-content pt-2 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Media</span>
                    </div>
                </div>
                <div class="menu-item menu-accordion">
                    <a class="menu-link {{ isset($page) && $page == 'filemanager' ? 'active' : '' }}" href="{{ route('admin.filemanager') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Media Library</span>
                    </a>
                </div>
                --}}
                <div class="menu-item">
                    <div class="menu-content pt-2 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">General Setting</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion
                    @isset($page) 
                        @if($page == 'user' || $page  == 'role' || $page == 'permission') hover show @endif                
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Backend User</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'user' ? 'active' : '' }}" href="{{ route('user.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">User</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'role' ? 'active' : '' }}" href="{{ route('role.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Role</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'permission' ? 'active' : '' }}" href="{{ route('permission.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-line"></span>
                                </span>
                                <span class="menu-title">Permission</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="sticky-sidebar">
                    <div class="menu-item">
                        <div class="">
                            <div class="separator mx-1 my-4"></div>
                        </div>
                    </div>
                    <!-- <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                                        <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Look For Support?</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Contact Developer</span>
                        </a>
                    </div> -->
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                        <path d="M7.5 1v7h1V1h-1z" />
                                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title sidebar-text">Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>