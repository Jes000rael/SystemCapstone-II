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
                <li class="{{ Route::currentRouteName() == 'company-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('addcompany') }}">
                        <i class="bx bx-building"></i>
                        <span key="t-calendar">Company</span>
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'employee-Edit-Super' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-company-Employees">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ Route::currentRouteName() == 'employee-Edit-Super' ? 'mm-active' : 'text-light fw-bold' }}"><a wire:navigate href="{{ route('company-Employees') }}" key="t-company-Employees">Employee Records</a></li>
                        <li><a wire:navigate href="{{ route('addemployee') }}" key="t-addemployee">Add Employee</a></li>
                   
                    </ul>
                </li>
                
             
                <li class="{{ Route::currentRouteName() == 'department-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('department-Super') }}">
                        <i class="bx bx-building"></i>
                        <span key="t-building">Department</span>
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'job-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('job-Super') }}" class="waves-effect ">
                    <i class="bx bx-briefcase"></i>
                         <span key="t-starter-page"> Job Title</span>
                     </a>
                  </li>
                <li class="{{ Route::currentRouteName() == 'senior-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                      <a wire:navigate href="{{ route('seniority-Super') }}" class="waves-effect ">
                          <i class="bx bx-badge"></i>
                         <span key="t-starter-page"> Seniority Level</span>
                      </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'employment-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                      <a wire:navigate href="{{ route('employment-Super') }}" class="waves-effect ">
                      <i class="bx bx-badge-check"></i>
                         <span key="t-starter-page"> Employment Status </span>
                      </a>
                  </li>
                  <li class="{{ Route::currentRouteName() == 'shift-Edit' ? 'mm-active' : 'text-light fw-bold' }}">
                    <a wire:navigate href="{{ route('shift-Super') }}" class="waves-effect ">
                    <i class="bx bx-calendar"></i>
                         <span key="t-starter-page"> Shifts</span>
                     </a>
                  </li>
                  <li class="menu-title" key="t-apps">Email</li>
                  <li>
                    <a wire:navigate href="{{ route('send-Email') }}">
                        <i class="bx bx-paper-plane"></i>
                        <span key="t-mail">Send an Email</span>
                    </a>
                </li>

               

            </ul>
        </div>
     
    </div>
</div>



