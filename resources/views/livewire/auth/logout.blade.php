<div>
<a  href="#" class="dropdown-item text-danger"onclick="confirmLogout()"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>


<script>
    function confirmLogout() {
        Swal.fire({
            title: '<strong>Are you sure?</strong>',
            text: 'You want to Logout!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Logout',
           
            width: '450px', 
            height: '200px',
        }).then((result) => {
            if (result.isConfirmed) {
                @this.logout(); 
            }
        });
    }
</script>


</div>
