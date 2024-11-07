<x-layouts.base>
@auth
@if (in_array(request()->route()->getName(),['login'],))
{{ $slot }}

@elseif(in_array(request()->route()->getName(),['add-employee'],))
@include('components.layouts.navbars.sidebar')
@include('components.layouts.navbars.topbar')
<div>
<div id="layout-wrapper">
            <div class="main-content">
     

                <div class="page-content">
                    <div class="container-fluid">

@include('components.layouts.navbars.page-title')
{{ $slot }}



@include('components.layouts.footers.footer')

@include('components.layouts.navbars.right-sidebar')
@else
@include('components.layouts.navbars.sidebar')
@include('components.layouts.navbars.topbar')
{{ $slot }}



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