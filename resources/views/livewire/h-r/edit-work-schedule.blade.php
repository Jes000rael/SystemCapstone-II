



<div id="layout-wrapper">
            <div class="main-content">
     

                <div class="page-content">
                    <div class="container-fluid">

                   
                    <div class="row">
                 <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Admin</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a wire:navigate href="{{ route('employee-Record') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a wire:navigate href="{{ route('employee-Record') }}">Employee Records</a></li>
                    <li class="breadcrumb-item active">Edit Work Schedule</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
            <div class="col-4"></div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4 fs-5">Edit Work Schedule</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="updateEmployee" method="POST">
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Monday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Monday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Tueday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Tuesday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Wednesday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Wednesday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Thursday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Thursday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Friday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Friday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Saturday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Saturday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Sunday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">Sunday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="time" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                

                                            
                                            <div class="align-item-center d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary w-md me-3">Update</button>
                                                <a wire:navigate href="{{ route('employee-Record') }}" class="btn btn-secondary w-md">Close</a>

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
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->



 





