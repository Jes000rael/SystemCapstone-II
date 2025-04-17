


<div id="layout-wrapper">
    
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">ADMIN</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('cutoff') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('cutoff') }}">Create Attendance Page</a></li>
                            <li class="breadcrumb-item active">Edit Attendance Page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4 fs-5">Edit Page</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif
<style>
    .password-container {
    position: relative;
    
}

input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 10px;
    padding-right: 40px; /* Space for the icon */
    box-sizing: border-box;
}

.toggle-passworde {
    position: absolute;
    top: 61%;
    right: 30px;
    transform: translateY(-50%);
    cursor: pointer;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}





</style>

<form wire:submit.prevent="edit_Page">
                                    
                                    

                                        <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('username')border border-danger rounded-2 @enderror">
                                            <input type="text" step="any" wire:model.live="username"  id="username" class="form-control"  placeholder="Enter username">
                                        </div>

                                            @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                            <input type="password" step="any" wire:model.live="password"  id="passwordede" class="form-control"  placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <span id="togglePassworde" class="toggle-passworde" onclick="togglePassworde()">
            <i class="fas fa-eye"></i>
        </span>
                                        </div>

                                            @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Update</button>
                                          <a wire:navigate href="{{ route('create-Attendance-Page') }}" class="btn btn-secondary w-sm mt-3">Close</a>
                                        </div>
                                        </div>

                                    </form>
                        
                               
                        
                        

                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-4"></div>
        </div>
        <!-- end row -->

        
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>

@push('scripts')
<script>
    function togglePassworde() {
    const passwordInput = document.getElementById('passwordede');
    const toggleIcon = document.getElementById('togglePassworde').querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

</script>
@endpush




















