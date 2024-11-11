<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::currentRouteName() == 'dashboard' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                 
                </li>

                

                <li class="menu-title" key="t-apps">Records</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-company.employeerecords">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a wire:navigate href="{{ route('company.employeerecords') }}" key="t-company.employeerecords">Employee Records</a></li>
                        <li><a wire:navigate href="{{ route('addemployee') }}" key="t-addemployee">Add Employee</a></li>
                   
                    </ul>
                </li>
                

                <li>
                    <a wire:navigate href="{{ route('attendance-records') }}">
                        <i class="bx bx-calendar"></i>
                        <span key="t-calendar">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-time"></i>
                        <span key="t-time">Work Schedule</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="calendar.html" key="t-tui-calendar">Schedule Record</a></li>
                        <li><a href="calendar-full.html" key="t-full-calendar">Add Schedule</a></li>
                    </ul>
                </li>

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->


