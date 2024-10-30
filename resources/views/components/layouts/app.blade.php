<x-layouts.base>
@auth

@include('components.layouts.navbars.sidebar')
@include('components.layouts.navbars.topbar')
{{ $slot }}
@endauth

@guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
           
            {{ $slot }}
          

       
        @endif
    @endguest



</x-layouts.base>