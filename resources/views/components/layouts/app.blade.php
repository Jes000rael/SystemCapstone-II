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
@else
@include('components.layouts.navbars.sidebar')
@include('components.layouts.navbars.topbar')
<div>   
{{ $slot }}
</div>
@include('components.layouts.footers.footer')
@include('components.layouts.navbars.right-sidebar')
@endif







@endauth

@guest
      
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
           
            {{ $slot }}
       
        @endif
    @endguest



</x-layouts.base>