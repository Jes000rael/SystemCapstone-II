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
        // Check sidebar state on page load
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            document.body.classList.add('vertical-collpsed');
            document.body.classList.remove('sidebar-enable');
        } else {
            document.body.classList.add('sidebar-enable');
            document.body.classList.remove('vertical-collpsed');
        }

        // Function to toggle sidebar state
        function toggleSidebar() {
            const isCurrentlyCollapsed = document.body.classList.toggle('vertical-collpsed');
            document.body.classList.toggle('sidebar-enable', !isCurrentlyCollapsed); // Ensure the other class is removed/added correctly
            
            // Save the current state to localStorage
            localStorage.setItem('sidebar-collapsed', isCurrentlyCollapsed);

            // Optional: Update UI elements or run animations here
        }

        // Attach click event to toggle button
        document.getElementById('vertical-menu-btn').addEventListener('click', function(event) {
            event.preventDefault();
            toggleSidebar();
        });
    </script>

<script>
    const apiUrl = 'http://localhost:8000/api/employee-records';

    async function fetchEmployeeRecords() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');

            const data = await response.json();
            const tableBody = document.getElementById('employee-records');
            tableBody.innerHTML = ''; // Clear existing records

            if (data.employees && data.employees.length > 0) {
                data.employees.forEach(employee => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${employee.company ? employee.company.description : 'N/A'}</td>
                        <td>${employee.first_name}</td>
                        <td>${employee.last_name}</td>
                        <td>${employee.middle_name}</td>
                        <td>${employee.suffix}</td>
                        <td>${employee.blood_type}</td>
                        <td>${employee.address}</td>
                        <td>${employee.contact_number}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-secondary btn-sm view" data-bs-toggle="modal" data-bs-target=".transaction-detailModal" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="9">No employee records found.</td></tr>'; // Adjust colspan if needed
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            document.getElementById('employee-records').innerHTML = '<tr><td colspan="9">Failed to load employee records.</td></tr>'; // Adjust colspan if needed
        }
    }

    // Fetch employee records when the Livewire component loads
    document.addEventListener('livewire:load', fetchEmployeeRecords);

    // Fetch employee records again after the Livewire component updates
    Livewire.on('componentUpdated', fetchEmployeeRecords);
</script>

@stack('scripts')

    @livewireScripts
   
</body>

</html>


