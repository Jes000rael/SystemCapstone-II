
<div id="layout-wrapper">
    
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">COMPANY</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Add Department</a></li>
                            <li class="breadcrumb-item active">Edit Department</li>
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

                        <h4 class="card-title mb-4 fs-5">Edit Department</h4>
                        <form wire:submit.prevent="">
                        <div class="mb-3">
                                            <label for="email" class="form-label">Company</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('email')border border-danger rounded-2 @enderror">
                                            <select wire:model.live="company_id" id="company_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                           
                                                                  <option value="">dadwa</option>
                                                                  <option value="">dadwa</option>
                                                                  <option value="">dadwa</option>
                                                                  <option value="">dadwa</option>
                                                              
                                                        </select>
                                        </div>

                                            @error('email') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                        <div class="mb-3">
                                            <label for="username" class="form-label">Department</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('username')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="username"  id="username" class="form-control" type="text"  placeholder="Enter Department">
                                        </div>

                                            @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        

                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-xl mt-3">Update</button>
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





















