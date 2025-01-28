      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li class="">
                                <a href="{{route('admin')}}" class="waves-effect {{ request()->is("admin")|| request()->is("admin/*") ? "mm active" : "" }}">
                                    <i class="ti-home"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            

                            <li>
                                <a href="/students" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}">
                                    <i class="ti-user"></i><span> Students </span>
                                </a>
                                <!-- <ul class="submenu">
                                    <li>
                                        <i class="dripicons-view-apps"></i><span>Employees List</span></a>
                                    </li>
                                   
                                </ul> -->
                            </li>
                            <li class="menu-title">Management</li>

                            <li class="">
                                <a href="/lectures" class="waves-effect {{ request()->is("schedule") || request()->is("schedule/*") ? "mm active" : "" }}">
                                    <i class="ti-time"></i> <span> Schedule </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
