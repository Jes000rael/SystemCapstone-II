<x-layouts.base>
@auth
@if (in_array(request()->route()->getName(),['login'],))
{{ $slot }}

@else
@include('components.layouts.navbars.sidebar')
@include('components.layouts.navbars.topbar')
{{ $slot }}

@include('components.layouts.footers.footer')
@include('components.layouts.navbars.right-sidebar')
@endauth
@endif
@guest
      
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
           
            {{ $slot }}
       
        @endif
    @endguest



</x-layouts.base>