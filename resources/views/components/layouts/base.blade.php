<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">
  <!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style> 
  /* Basic body styles */
body {
    background-color: white; /* Default background */
    color: black; /* Default text color */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
}

/* Dark mode styles */
body[data-layout-mode="dark"] {
    background-color: #121212; /* Dark background */
    color: white; /* Light text color */
}

</style>



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


<script src="assets/js/app.js"></script>


<script>
 function initSettings() {
    const themeToggle = document.getElementById("theme-toggle");
    const lightIcon = document.getElementById("lightIcon");
    const darkIcon = document.getElementById("darkIcon");
    const body = document.body;

    // Check for user's preference in sessionStorage
    const alreadyVisited = sessionStorage.getItem("is_visited");

    if (alreadyVisited === "dark-mode") {
        // Apply dark mode
        themeToggle.checked = true; // Set toggle to checked for dark mode
        darkIcon.style.display = "inline"; // Show dark icon
        lightIcon.style.display = "none"; // Hide light icon
        body.classList.add("dark-mode"); // Add dark mode class to body
        body.setAttribute("data-layout-mode", "dark"); // Update layout mode to dark
    } else {
        // Default to light mode
        themeToggle.checked = false; // Set toggle to unchecked for light mode
        darkIcon.style.display = "none"; // Hide dark icon
        lightIcon.style.display = "inline"; // Show light icon
        body.classList.remove("dark-mode"); // Remove dark mode class from body
        body.setAttribute("data-layout-mode", "light"); // Update layout mode to light
    }

    themeToggle.addEventListener("change", function() {
        if (this.checked) {
            // Dark Mode
            darkIcon.style.display = "inline"; // Show dark icon
            lightIcon.style.display = "none"; // Hide light icon
            body.classList.add("dark-mode"); // Add dark mode class to body
            body.setAttribute("data-layout-mode", "dark"); // Update layout mode to dark
            sessionStorage.setItem("is_visited", "dark-mode"); // Store preference
        } else {
            // Light Mode
            darkIcon.style.display = "none"; // Hide dark icon
            lightIcon.style.display = "inline"; // Show light icon
            body.classList.remove("dark-mode"); // Remove dark mode class from body
            body.setAttribute("data-layout-mode", "light"); // Update layout mode to light
            sessionStorage.setItem("is_visited", "light-mode"); // Store preference
        }
    });
}

// Initialize settings on page load
document.addEventListener("DOMContentLoaded", initSettings);


</script>
@stack('scripts')

    @livewireScripts
   
</body>

</html>


