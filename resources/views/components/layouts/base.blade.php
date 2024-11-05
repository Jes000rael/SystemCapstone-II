<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Dashboards  | Enopoly Commerce</title>
<!-- App favicon -->
<link rel="shortcut icon" href="https://app.enopolyautomation.com/assets/images/favicon.ico">
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  .dataTables_length {
          margin-bottom: -1.5%;
        }
  .dataTables_info {
   
    margin-bottom: -1.8%;
}     
</style>
<script>
        // Immediately apply dark mode if preferred
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
    <link href="assets/css/apas.css" rel="stylesheet">




@stack('styles')
    
    @livewireStyles
    
</head>
<body data-sidebar="dark" data-layout-mode="light" >


  {{ $slot }}



<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script> 

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


<script src="assets/js/app.js"></script>



 


<script>

    // Immediately apply dark mode and set icon based on stored theme preference
if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
    document.getElementById("darkIcon").style.display = "inline";
    document.getElementById("lightIcon").style.display = "none";
} else {
    document.getElementById("darkIcon").style.display = "none";
    document.getElementById("lightIcon").style.display = "inline";
}

function toggleDarkMode() {
    // Toggle dark mode on the <html> element
    const isDarkMode = document.documentElement.classList.toggle('dark');

    // Update localStorage to remember theme preference
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

    // Toggle icon visibility
    const darkIcon = document.getElementById("darkIcon");
    const lightIcon = document.getElementById("lightIcon");

    if (isDarkMode) {
        darkIcon.style.display = "inline";
        lightIcon.style.display = "none";
    } else {
        darkIcon.style.display = "none";
        lightIcon.style.display = "inline";
    }

    // Add animation to the visible icon
    const activeIcon = isDarkMode ? darkIcon : lightIcon;
    activeIcon.classList.add("active");

    // Remove the animation class after it ends
    activeIcon.addEventListener("animationend", () => {
        activeIcon.classList.remove("active");
    }, { once: true });
}

    </script>
@stack('scripts')

    @livewireScripts
   
</body>

</html>


