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

                

                <li class="menu-title" key="t-apps">Records</li>

                <li class="{{ Route::currentRouteName() == 'Employee-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-employee-records">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ Route::currentRouteName() == 'Employee-Edit' ? 'mm-active' : 'text-light fw-bold' }}"><a wire:navigate href="{{ route('employee-Record') }}" key="t-employee-record">Employee Records</a></li>
                        <li><a wire:navigate href="{{ route('add-Employee') }}" key="t-add-employee">Add Employee</a></li>
                   
                    </ul>
                </li>
                

                <li>
                    <a wire:navigate href="{{ route('attendance-Records') }}">
                        <i class="bx bx-calendar"></i>
                        <span key="t-calendar">Attendance Records</span>
                    </a>
                </li>
               
                <li class="{{ Route::currentRouteName() == 'department' ? 'mm-active' : 'text-light fw-bold' }}">
                     <a wire:navigate href="{{ route('department') }}" class="waves-effect ">
                      <i class="bx bx-buildings"></i>
                                    <span key="t-starter-page"> Department</span>
                       </a>
                   </li>
                   <li class="{{ Route::currentRouteName() == 'jobtitle' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('jobtitle') }}" class="waves-effect ">
                    <i class="bx bx-briefcase"></i>
                         <span key="t-starter-page"> Job Title</span>
                     </a>
                  </li>
                
                <li class="{{ Route::currentRouteName() == 'seniority-Level' ? 'mm-active' : 'text-light fw-bold' }}">
                      <a wire:navigate href="{{ route('seniority-Level') }}" class="waves-effect ">
                          <i class="bx bx-badge"></i>
                         <span key="t-starter-page"> Seniority Level</span>
                      </a>
                  </li>

               
                            
              

                  <li class="{{ Route::currentRouteName() == 'employee-Status' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('employee-Status') }}" class="waves-effect ">
                    <i class="bx bx-badge-check"></i>
                         <span key="t-starter-page"> Employee Status</span>
                     </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'shifts' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('shifts') }}" class="waves-effect ">
                    <i class="bx bx-calendar"></i>
                         <span key="t-starter-page"> Shifts</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'off-Duty' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('off-Duty') }}" class="waves-effect ">
                    <i class="bx bx-sleepy"></i>
                         <span key="t-starter-page"> Off Duty</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'hand-Book' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('hand-Book') }}" class="waves-effect ">
                    <i class="bx bx-book"></i>
                         <span key="t-starter-page"> Handbook</span>
                     </a>
                  </li>

                  <li class="{{ Route::currentRouteName() == 'deduction' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('deduction') }}" class="waves-effect ">
                    <i class="bx bx-receipt"></i>
                         <span key="t-starter-page"> Deduction Log</span>
                     </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'merit-log' ? 'mm-active' : 'text-light fw-bold' }}">
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
                  </li>
                  <li class="{{ Route::currentRouteName() == 'anouncements' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('anouncements') }}" class="waves-effect ">
                    <i class="bx bx-volume-full"></i>


                         <span key="t-starter-page"> Announcement</span>
                     </a>
                  </li>
                  
               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->