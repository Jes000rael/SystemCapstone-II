<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>  {{ ucfirst(str_replace('-', ' ', Route::currentRouteName())) }}  | Enopoly Commerce</title>


    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

<!-- App favicon -->
<link rel="shortcut icon" href="https://app.enopolyautomation.com/assets/images/favicon.ico">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css') }}"  rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  .dataTables_length {
          margin-bottom: -1.5%;
        }
  .dataTables_info {
   
    margin-bottom: -1.8%;
}     
.dt-button-info h2 {
    color: #555;
   
}
.dt-button-info{
    color: #555;
}


</style>
<script>
        // Immediately apply dark mode if preferred
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
  




@stack('styles')
    
    @livewireStyles
    
</head>
<body data-sidebar="dark" data-layout-mode="light" >


  {{ $slot }}



<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        
<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> 



<script>
  
$(document).ready(function() {
    $('#akontable').DataTable({
      pageLength: 10,
        dom: 'lfBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' 
        ],
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [ 
                    [5, 10, 15, 25, 50, 100],
                    [5, 10, 15, 25, 50, 100]
                ]
    });
});



</script>





<script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('employee-added', event => {
                Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Add Employee</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
            });
        });
    </script>


<script>

    
if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
    document.getElementById("darkIcon").style.display = "inline";
    document.getElementById("lightIcon").style.display = "none";
} else {
    document.getElementById("darkIcon").style.display = "none";
    document.getElementById("lightIcon").style.display = "inline";
}

function toggleDarkMode() {
   
    const isDarkMode = document.documentElement.classList.toggle('dark');

    
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

  
    const darkIcon = document.getElementById("darkIcon");
    const lightIcon = document.getElementById("lightIcon");

    if (isDarkMode) {
        darkIcon.style.display = "inline";
        lightIcon.style.display = "none";
    } else {
        darkIcon.style.display = "none";
        lightIcon.style.display = "inline";
    }

  
    const activeIcon = isDarkMode ? darkIcon : lightIcon;
    activeIcon.classList.add("active");

    
    activeIcon.addEventListener("animationend", () => {
        activeIcon.classList.remove("active");
    }, { once: true });
}

    </script>


<script>
      
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            document.body.classList.add('vertical-collpsed');
            document.body.classList.remove('sidebar-enable');
        } else {
            document.body.classList.add('sidebar-enable');
            document.body.classList.remove('vertical-collpsed');
        }

  
        function toggleSidebar() {
            const isCurrentlyCollapsed = document.body.classList.toggle('vertical-collpsed');
            document.body.classList.toggle('sidebar-enable', !isCurrentlyCollapsed);
            
      
            localStorage.setItem('sidebar-collapsed', isCurrentlyCollapsed);

        
        }

       
        document.getElementById('vertical-menu-btn').addEventListener('click', function(event) {
            event.preventDefault();
            toggleSidebar();
        });
    </script>



@stack('scripts')

    @livewireScripts
   
</body>

</html>


