<div id="layout-wrapper">
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DASHBOARD</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Send Email</li>
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

                        <h4 class="card-title mb-4 fs-5">Send an email</h4>
                        <form action="">
                        <div class="mb-3">
                                            <label for="email" class="form-label">Send To :</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('email')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="email"  id="email" class="form-control" type="text"  placeholder="Enter Email">
                                        </div>

                                            @error('email') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                        <div class="mb-3">
                                            <label for="username" class="form-label">Username :</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('username')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="username"  id="username" class="form-control" type="text"  placeholder="Enter Username">
                                        </div>

                                            @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="password"  id="password" class="form-control" type="text"  placeholder="Enter Password">
                                        </div>

                                            @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-xl mt-3"> <i class="bx bx-paper-plane me-1"></i>Send </button>
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

