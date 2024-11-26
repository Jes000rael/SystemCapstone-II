<x-layouts.base>
    @auth
        @php
            // Define the routes for each role
            $roleLayouts = [
                'hr' => [
                    'admin-Dashboard', 'employee-Record', 'add-Employee', 'seniority-Level', 'department',
                    'jobtitle', 'employee-Status', 'shifts', 'deduction', 'off-Duty', 'hand-Book',
                    'anouncements', 'Employee-Edit', 'attendance-Records', 'breaktime-log', 'overtime-log',
                    'merit-log', 'edit-Department'
                ],
                'super' => [
                    'dashboard', 'addcompany', 'company-Employees', 'addemployee', 'department-Super', 
                    'seniority-Super', 'employment-Super', 'job-Super', 'shift-Super', 'employee-Edit-Super', 
                    'department-Edit', 'send-Email'
                ],
                'employee' => [
                    'employee-Dashboard', 'attendance-Log', 'work-Schedule', 'hand-Books'
                ]
            ];

            // Initialize layout variables
            $layout = null;
            $navbar = null;
            $footer = null;

            // Identify which role the route belongs to
            foreach ($roleLayouts as $role => $routes) {
                if (in_array(request()->route()->getName(), $routes)) {
                    $layout = $role;
                    break;
                }
            }

            // Assign the respective layout components based on role
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

        <!-- Include role-specific layout components if a layout is determined -->
        @if ($layout)
            @include("components.layouts.$navbar.sidebar")
            @include("components.layouts.$navbar.topbar")
            <div>{{ $slot }}</div>
            @include("components.layouts.$footer.footer")
        @else
            <!-- Default content (if no role match) -->
            {{ $slot }}
        @endif
    @endauth

    @guest
        @if (request()->routeIs('login'))
            {{ $slot }}
        @endif
    @endguest
</x-layouts.base>
