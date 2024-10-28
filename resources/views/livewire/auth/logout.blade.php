<div>
<a class="btn bg-gradient-dark w-100 {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}" onclick="confirmLogout()"
target="_blank"> <i class="fa fa-sign-out me-sm-1 {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}"></i> Sign Out</a>
    
    <!-- <span class="d-sm-inline d-none {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}" onclick="confirmLogout()">Sign Out</span> -->

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
