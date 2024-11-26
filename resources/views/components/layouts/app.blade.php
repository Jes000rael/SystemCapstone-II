<x-layouts.base>
@auth
 <!-- admin/hr  -->
@if (in_array(request()->route()->getName(),['login'],))
{{ $slot }}
@elseif(in_array(request()->route()->getName(),['admin-Dashboard'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')

@elseif(in_array(request()->route()->getName(),['employee-Record'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')

@elseif(in_array(request()->route()->getName(),['add-Employee'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['seniority-Level'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['department'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['jobtitle'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['employee-Status'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['shifts'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['deduction'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['off-Duty'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['hand-Book'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['anouncements'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['Employee-Edit'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['attendance-Records'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['breaktime-log'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['overtime-log'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@elseif(in_array(request()->route()->getName(),['merit-log'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')

@elseif(in_array(request()->route()->getName(),['edit-Department'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')


@endif



<!-- super admin -->
@if(in_array(request()->route()->getName(),['dashboard'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['addcompany'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['company-Employees'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['addemployee'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')



@elseif(in_array(request()->route()->getName(),['department-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')




@elseif(in_array(request()->route()->getName(),['seniority-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')



@elseif(in_array(request()->route()->getName(),['employment-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['job-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['shift-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['employee-Edit-Super'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['department-Edit'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@elseif(in_array(request()->route()->getName(),['send-Email'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')


@endif

<!-- employee  -->
@if(in_array(request()->route()->getName(),['employee-Dashboard'],))
@include('components.layouts.empnavbars.sidebar')
@include('components.layouts.empnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.empfooters.footer')


@elseif(in_array(request()->route()->getName(),['attendance-Log'],))
@include('components.layouts.empnavbars.sidebar')
@include('components.layouts.empnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.empfooters.footer')


@elseif(in_array(request()->route()->getName(),['work-Schedule'],))
@include('components.layouts.empnavbars.sidebar')
@include('components.layouts.empnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.empfooters.footer')


@elseif(in_array(request()->route()->getName(),['hand-Books'],))
@include('components.layouts.empnavbars.sidebar')
@include('components.layouts.empnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.empfooters.footer')


@endif



@endauth

@guest
      
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
           
            {{ $slot }}
       
        @endif
    @endguest



</x-layouts.base>