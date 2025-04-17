

<header id="page-topbar">
    <style>
        .dark {
    --bg-color: #000000;
    --text-color: #ffffff;
  
  --bs-gray-100: #212529;
  --bs-gray-200: #2a3042;
  --bs-gray-300: #32394e;
  --bs-gray-400: #a6b0cf;
  --bs-gray-500: #bfc8e2;
  --bs-gray-600: #c3cbe4;
  --bs-gray-700: #f6f6f6;
  --bs-gray-800: #eff2f7;
  --bs-gray-900: #f8f9fa;
  --bs-body-bg: #222736;
  --bs-body-bg-rgb: rgb(34, 39, 54);
  --bs-body-color-rgb: 166, 176, 207;
  --bs-body-color: #a6b0cf;
  --bs-heading-color: #f6f6f6;
  --bs-border-color: #32394e;
  --bs-custom-white: #2a3042;
  --bs-input-border-color: #32394e;
  --bs-input-focus-border-color: #3a425a;
  --bs-hr-border-color: #32394e;
  --bs-form-check-input-border: #3a425a;
  --bs-light: #32394e;
  --bs-light-rgb: 50, 57, 78;
  --bs-dark: #f6f6f6;
  --bs-dark-rgb: 246, 246, 246;
  --bs-heading-bg: #262b3c;
  --bs-header-item-color: #a6b0cf;
  --bs-topbar-search-bg: #2a3042;
  --bs-heading-dark-bg: #556ee6;
  --bs-boxed-body-bg: #32394f;
  --bs-topnav-bg: #282e3f;
  --bs-menu-item-color: #a6b0cf;
  --bs-footer-bg: #262b3c;
  --bs-footer-color: #a6b0cf;

.card {
  --bs-card-bg: #2a3042;
}
.list-group {
  --bs-list-group-bg: #2a3042;
  --bs-list-group-color: #f8f9fa;
  --bs-list-group-border-color: #32394e;
}
.btn-light {
  --bs-btn-color: #c3cbe4;
  --bs-btn-bg: #32394e;
  --bs-btn-border-color: #32394e;
}
.btn-outline-light {
  --bs-btn-color: #c3cbe4;
  --bs-btn-border-color: #32394e;
}
.btn-light,
.btn-outline-light {
  --bs-btn-hover-color: #c3cbe4;
  --bs-btn-hover-bg: #32394e;
  --bs-btn-hover-border-color: #32394e;
  --bs-btn-active-color: #c3cbe4;
  --bs-btn-active-bg: #32394e;
  --bs-btn-active-border-color: #32394e;
  --bs-btn-focus-shadow-rgb: 50, 57, 78;
}
.btn-dark {
  --bs-btn-bg: #a6b0cf;
  --bs-btn-border-color: #a6b0cf;
  --bs-btn-hover-bg: #a6b0cf;
}
.btn-outline-dark {
  --bs-btn-color: #a6b0cf;
  --bs-btn-border-color: #a6b0cf;
}
.btn-dark,
.btn-outline-dark {
  --bs-btn-hover-bg: #a6b0cf;
  --bs-btn-hover-border-color: #a6b0cf;
  --bs-btn-active-bg: #a6b0cf;
  --bs-btn-active-border-color: #a6b0cf;
  --bs-btn-focus-shadow-rgb: 195, 203, 228;
}
.dropdown-menu {
  --bs-dropdown-bg: #2a3042;
  --bs-dropdown-link-color: #a6b0cf;
  --bs-dropdown-border-color: #32394e;
  --bs-dropdown-border-width: 1px;
  --bs-dropdown-divider-bg: #32394e;
  --bs-dropdown-link-hover-bg: #32394e;
  --bs-dropdown-link-hover-color: #e9ecef;
  --bs-dropdown-link-active-bg: #32394e;
  --bs-dropdown-link-active-color: #e9ecef;
}
.modal {
  --bs-modal-bg: #2a3042;
}
.offcanvas,
.offcanvas-lg,
.offcanvas-md,
.offcanvas-sm,
.offcanvas-xl,
.offcanvas-xxl {
  --bs-offcanvas-bg: #2a3042;
}
.nav-tabs {
  --bs-nav-tabs-link-active-bg: #2a3042;
  --bs-nav-tabs-link-active-border-color: #3a425a;
  --bs-nav-tabs-border-color: #3a425a;
  --bs-nav-tabs-link-hover-border-color: #3a425a;
  --bs-nav-tabs-link-active-color: #556ee6;
}
.accordion {
  --bs-accordion-active-bg: rgba(85, 110, 230, 0.1);
}
.toast {
  --bs-toast-header-bg: #2a3042;
  --bs-toast-header-color: #c3cbe4;
  --bs-toast-bg: #2a3042;
}
.table {
  --bs-table-striped-bg: rgba(191, 200, 226, 0.05);
  --bs-table-hover-bg: rgba(191, 200, 226, 0.05);
  --bs-table-active-bg: rgba(191, 200, 226, 0.05);
}
.table-light {
  --bs-table-color: #a6b0cf;
  --bs-table-bg: #32394e;
  --bs-table-border-color: #32394e;
}
.table-dark {
  --bs-table-color: #a6b0cf;
  --bs-table-bg: #32394e;
  --bs-table-border-color: #3a425a;
}

}

body {
    background-color: var(--bg-color);
    color: var(--text-color);
}


@keyframes rotateIcon {
    0% {
        transform: rotate(0deg);
    }
    50% {
        transform: rotate(180deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.icon-animation.active {
    animation: rotateIcon 0.6s ease;
}

    </style>
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
            <a class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://app.enopolyautomation.com/assets/images/logo.png" alt="" height="22">
                    </span>
                 
                    <span class="logo-lg">
                        <img src="https://app.enopolyautomation.com/assets/images/enopoly.png" alt="Company Logo" class="company-logo" height="22" width="100">
                    </span>
                

                   

                </a>

                <a class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://app.enopolyautomation.com/assets/images/logo.png" alt="" height="22" >
                    </span>
                  
                    <span class="logo-lg">
                        <img src="https://app.enopolyautomation.com/assets/images/enopoly.png" alt="Company Logo" class="company-logo" height="22" width="100">
                    </span>
                      </a>

            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <!-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form> -->

           
        </div>
        

        <div class="d-flex">


            

            <div class="dropdown  d-inline-block ">
            <button onclick="toggleDarkMode()" type="button"  class="btn header-item noti-icon ">
            <i class="bx bx-moon icon-animation" id="darkIcon" style="display: none;"></i>
        <!-- Sun icon for light mode -->
        <i class="bx bx-sun icon-animation" id="lightIcon"></i>
                </button>
            </div>
           
 

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            

            <div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
        <livewire:auth.username />
    </button>
    <div class="dropdown-menu dropdown-menu-end" id="userDropdownMenu">
        <!-- item-->

        <a title="View" data-bs-toggle="modal" data-bs-target=".changepass" class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Change Pass</span></a>

        

        <div class="dropdown-divider"></div>
        <livewire:auth.logout />
    </div>
</div>

            

        </div>
    </div>

</header>
        <livewire:auth.change-password/>


@push('scripts')
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('userDropdownMenu');
        dropdown.classList.toggle('show');
    }

 
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdownMenu');
        const button = document.getElementById('page-header-user-dropdown');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });
</script>
@endpush





    
