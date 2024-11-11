<x-layouts.base>
@auth

@if (in_array(request()->route()->getName(),['login'],))
{{ $slot }}


@elseif(in_array(request()->route()->getName(),['hr.dashboard'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')
@include('components.layouts.hrnavbars.right-sidebar')
@elseif(in_array(request()->route()->getName(),['employee-record'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')
@include('components.layouts.hrnavbars.right-sidebar')
@elseif(in_array(request()->route()->getName(),['add-employee'],))
@include('components.layouts.hrnavbars.sidebar')
@include('components.layouts.hrnavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.hrfooters.footer')
@include('components.layouts.hrnavbars.right-sidebar')
@endif



<!-- super admin -->
@if(in_array(request()->route()->getName(),['dashboard'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')
@include('components.layouts.supernavbars.right-sidebar')

@elseif(in_array(request()->route()->getName(),['addcompany'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')
@include('components.layouts.supernavbars.right-sidebar')

@elseif(in_array(request()->route()->getName(),['company.employeerecords'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')
@include('components.layouts.supernavbars.right-sidebar')

@elseif(in_array(request()->route()->getName(),['addemployee'],))
@include('components.layouts.supernavbars.sidebar')
@include('components.layouts.supernavbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.superfooters.footer')
@include('components.layouts.supernavbars.right-sidebar')


@endif






@endauth

@guest
      
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
           
            {{ $slot }}
       
        @endif
    @endguest



</x-layouts.base>