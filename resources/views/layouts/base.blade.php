<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    @if (env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon"  href="//enopolybrands.com/cdn/shop/files/logo_7874e451-68ed-4ed5-ad7c-be1c82de9218.png?crop=center&amp;height=32&amp;v=1701147004&amp;width=32" type="image/png">
    <title>
    Enopoly Marketplace
    </title>


    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->




    <style>
    /* Blurred backdrop effect for SweetAlert overlay */
    .swal2-overlay {
        backdrop-filter: blur(5px); /* Adjust the blur level as needed */
        background: rgba(0, 0, 0, 0.5); /* Optional: semi-transparent background */
    }

    /* Optional: Custom styles for the modal itself */
    .custom-swal {
        background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
        border: none; /* Remove border */
        box-shadow: none; /* Remove shadow */
    }
     /* Custom button styles */
     .dataTables_wrapper .dt-button {
            /* background-color: #233142; */
            color: #233142;
            border: none;
            padding: 0px 10px;
            border-radius: 10px;
            margin: 0px 0px;
            margin-bottom:10px;
            margin-top:10px;
            
            
        }

        .dataTables_wrapper .dt-button:hover {
            background-color: #5C60F6;
        }

        /* Pagination styles */
        .dataTables_wrapper .dataTables_paginate {
            margin: 0px 0;
            font-size:15px;
            
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px 10px;
            margin: 0 5px;
            background-color: transparent;

        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: transparent;
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: transparent;
            color: white;
        }
        .dataTables_length {
            text-align: center;
            margin-bottom: 20px; /* Add some space below the length menu */
            margin-right: 20px;
        }
        .dataTables_filter {
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }

        .dataTables_filter label {
            display: flex;
            align-items: center;
            font-size:12px;
            margin-top:10px;
        }

        .dataTables_filter input {
            margin-left: 5px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
            font-size:12px;
        }

        .dataTables_filter input:hover {
            border-color: #ccc;
        }
        .dataTables_length {
            font-family: Arial, sans-serif;
            margin-bottom: 10px;
        }

        .dataTables_length label {
            display: flex;
            align-items: center;
            font-size: 12px;
            margin-top: 10px;
            
        }

        .dataTables_length select {
            margin-left: 5px;
            margin-right: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s, background-color 0.3s;
            background-color: red;
            font-size:12px;
        }

        .dataTables_length select:hover {
            border-color: #007bff;
            background-color: #e9ecef;
        }

        .dataTables_length select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #e9ecef;
        }
</style>
@stack('styles')
    

    @livewireStyles

</head>

<body class="g-sidenav-show bg-gray-100">

    {{ $slot }}

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<script>
  
$(document).ready(function() {
    $('#myTable').DataTable({
      
      pageLength: 10,
      
        dom: 'lfBrtip',
        buttons: [
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: 'custom-button'
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'custom-button'
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'custom-button'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'custom-button'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'custom-button'
                }
            ],
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [ 
                    [1, 5, 10, 15, 25, 50, 100],
                    [1, 5, 10, 15, 25, 50, 100]
                ]
       
    });
});




</script>

    
  



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>




@stack('scripts')




    @livewireScripts
</body>

</html>
