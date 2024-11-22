<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::currentRouteName() == 'employee-Dashboard' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('employee-Dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                 
                </li>

                

                <li class="menu-title" key="t-apps">Records</li>
                

                <li class="{{ Route::currentRouteName() == 'attendance-Log' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('attendance-Log') }}">
                        <i class="bx bx-calendar"></i>
                        <span key="t-calendar">Attendance</span>
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'work-Schedule' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('work-Schedule') }}">
                        <i class="bx bx-time"></i>
                        <span key="t-time">Work Schedule</span>
                    </a>
                </li>
                
                <li class="{{ Route::currentRouteName() == 'hand-Books' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('hand-Books') }}">
                        <i class="bx bx-book"></i>
                        <span key="t-book">Handbooks</span>
                    </a>
                </li>

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->


