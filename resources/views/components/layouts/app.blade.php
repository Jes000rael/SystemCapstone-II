<x-layouts.base>
    @auth
        @php

            $roleLayouts = [
                'hr' => [
                    'admin-Dashboard', 'employee-Record', 'add-Employee', 'seniority-Level', 'department',
                    'jobtitle', 'employee-Status', 'shifts', 'deduction', 'off-Duty', 'hand-Book',
                    'anouncements', 'Employee-Edit', 'attendance-Records', 'breaktime-log', 'overtime-log',
                    'merit-log', 'edit-Department','edit-Status','edit-Jobtitle','edit-Seniority','edit-Shift',
                    'edit-Duty','edit-Handbook','add-Deduction','edit-Deduction','edit-Announcement','add-Schedule',
                    'edit-Schedule','chats','contacts','contact-Us'
                ],
                'super' => [
                    'dashboard', 'addcompany', 'company-Employees', 'addemployee', 'department-Super', 
                    'seniority-Super', 'employment-Super', 'job-Super', 'shift-Super', 'employee-Edit-Super', 
                    'department-Edit', 'send-Email','company-Edit','job-Edit','senior-Edit','employment-Edit',
                    'shift-Edit'
                ],
                'employee' => [
                    'employee-Dashboard', 'attendance-Log', 'work-Schedule', 'hand-Books'
                ]
            ];

          
            $layout = null;
            $navbar = null;
            $footer = null;

    
            foreach ($roleLayouts as $role => $routes) {
                if (in_array(request()->route()->getName(), $routes)) {
                    $layout = $role;
                    break;
                }
            }

      
            if ($layout === 'hr') {
                $navbar = 'hrnavbars';
                $footer = 'hrfooters';
            } elseif ($layout === 'super') {
                $navbar = 'supernavbars';
                $footer = 'superfooters';
            } elseif ($layout === 'employee') {
                $navbar = 'empnavbars';
                $footer = 'empfooters';
            }
        @endphp


        @if ($layout)
            @include("components.layouts.$navbar.sidebar")
            @include("components.layouts.$navbar.topbar")
            <div>
                {{ $slot }}

            </div>
            @include("components.layouts.$footer.footer")
    
        @elseif (in_array(request()->route()->getName(),['attendance-Page'],))
       
            {{ $slot }}
        @endif
    @endauth

    @guest
        @if (request()->routeIs('login'))
            {{ $slot }}
        
        @elseif (request()->routeIs('forgot-Password'))
            {{ $slot }}
        @endif
    @endguest
</x-layouts.base>
