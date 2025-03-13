<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::currentRouteName() == 'admin-Dashboard' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('admin-Dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                 
                </li>

                <li class="menu-title" key="t-apps">User</li>
                <li >
                    <a  href="{{ route('user-Attendance') }}">
                    <i class="bx bx-calendar-event"></i>
                        <span key="t-list">Attendance</span>
                    </a>
                </li>
                <li >
                    <a wire:navigate href="{{ route('user-Schedule') }}">
                        <i class="bx bx-time"></i>
                        <span key="t-time">Work Schedule</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Records</li>

                <li class="{{ Route::currentRouteName() == 'Employee-Edit' ? 'mm-active' : 'text-light fw-bold' }} {{ Route::currentRouteName() == 'add-Deduction' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-employee-records">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ Route::currentRouteName() == 'Employee-Edit' ? 'mm-active' : 'text-light fw-bold' }} {{ Route::currentRouteName() == 'add-Deduction' ? 'mm-active' : 'text-light fw-bold' }} {{ Route::currentRouteName() == 'add-Schedule' ? 'mm-active' : 'text-light fw-bold' }} {{ Route::currentRouteName() == 'edit-Schedule' ? 'mm-active' : 'text-light fw-bold' }}"><a wire:navigate href="{{ route('employee-Record') }}" key="t-employee-record">Employee Records</a></li>
                        <li><a wire:navigate href="{{ route('add-Employee') }}" key="t-add-employee">Add Employee</a></li>
                   
                    </ul>
                </li>
                
                

                <li >
                    <a wire:navigate href="{{ route('attendance-Records') }}">
                    <i class="bx bx-calendar"></i>
                        <span key="t-calendar">Attendance Records</span>
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'time-Adjustment' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('time-Adjustment') }}" class="waves-effect ">
                    <i class="bx bx-reset"></i>
                         <span key="t-starter-page"> Time Adjustment</span>
                     </a>
                  </li>
               
                
                   
                  <li class="{{ Route::currentRouteName() == 'edit-Duty' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('off-Duty') }}" class="waves-effect ">
                    <i class="bx bx-sleepy"></i>
                         <span key="t-starter-page"> Off Duty</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'edit-Cutoff' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('cutoff') }}" class="waves-effect ">
                    <i class="bx bx-calendar-alt"></i>
                         <span key="t-starter-page">Cutoff</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'edit-Handbook' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('hand-Book') }}" class="waves-effect ">
                    <i class="bx bx-book"></i>
                         <span key="t-starter-page"> Handbook</span>
                     </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'edit-Deduction' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('deduction') }}" class="waves-effect ">
                    <i class="bx bx-receipt"></i>
                         <span key="t-starter-page"> Deduction Log</span>
                     </a>
                  </li>
                  
              
                  <!-- <li class="{{ Route::currentRouteName() == 'merit-log' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('merit-log') }}" class="waves-effect ">
                    <i class="bx bx-medal"></i>
                         <span key="t-starter-page"> Merit Log</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'overtime-log' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('overtime-log') }}" class="waves-effect ">
                    <i class="bx bx-briefcase"></i>
                         <span key="t-starter-page"> Overtime Log</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'breaktime-log' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('breaktime-log') }}" class="waves-effect ">
                    <i class="bx bx-coffee"></i>
                         <span key="t-starter-page"> Breaktime Log</span>
                     </a>
                  </li> -->
                  <li class="{{ Route::currentRouteName() == 'edit-Announcement' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('anouncements') }}" class="waves-effect ">
                    <i class="bx bx-volume-full"></i>


                         <span key="t-starter-page"> Announcement</span>
                     </a>
                  </li>

                  <li class="menu-title" key="t-apps">Employee Attributes</li>
                  <li class="{{ Route::currentRouteName() == 'edit-Department' ? 'mm-active' : 'text-light fw-bold' }} 
                {{ Route::currentRouteName() == 'edit-Jobtitle' ? 'mm-active' : 'text-light fw-bold' }}
                 {{ Route::currentRouteName() == 'edit-Seniority' ? 'mm-active' : 'text-light fw-bold' }}
                  {{ Route::currentRouteName() == 'edit-Status' ? 'mm-active' : 'text-light fw-bold' }}
                   {{ Route::currentRouteName() == 'edit-Shift' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-employee-records">Attributes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                    <li class="{{ Route::currentRouteName() == 'edit-Department' ? 'mm-active' : 'text-light fw-bold' }}">
                     <a wire:navigate href="{{ route('department') }}" class="waves-effect ">

                                    <span key="t-starter-page"> Department</span>
                       </a>
                   </li>

                   <li class="{{ Route::currentRouteName() == 'edit-Jobtitle' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('jobtitle') }}" class="waves-effect ">

                         <span key="t-starter-page"> Job Title</span>
                     </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'edit-Seniority' ? 'mm-active' : 'text-light fw-bold' }}">
                      <a wire:navigate href="{{ route('seniority-Level') }}" class="waves-effect ">
                         <span key="t-starter-page"> Seniority Level</span>
                      </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'edit-Status' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('employee-Status') }}" class="waves-effect ">
            
                         <span key="t-starter-page"> Employee Status</span>
                     </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'edit-Shift' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('shifts') }}" class="waves-effect ">

                         <span key="t-starter-page"> Shifts</span>
                     </a>
                  </li>
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Contact</li>

                  <li>
                    <a  href="{{ route('contact-Us') }}" class="waves-effect ">
                    <i class="bx bx-chat"></i>
                         <span key="t-starter-page">Contact Us</span>
                     </a>
                  </li>
                  
               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->