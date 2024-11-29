



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
                    <li class="breadcrumb-item active">Add Work Schedule</li>
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

                        <h4 class="card-title mb-4 fs-5">Add Work Schedule</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="addSchedule" method="POST">
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="monday_in" class="form-label">Monday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('monday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="monday_in" type="time" class="form-control" id="monday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('monday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="monday_out" class="form-label">Monday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('monday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="monday_out" type="time" class="form-control" id="monday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('monday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tuesday_in" class="form-label">Tueday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('tuesday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="tuesday_in" type="time" class="form-control" id="tuesday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('tuesday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tuesday_out" class="form-label">Tuesday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('tuesday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="tuesday_out" type="time" class="form-control" id="tuesday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('tuesday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="wednesday_in" class="form-label">Wednesday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('wednesday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="wednesday_in" type="time" class="form-control" id="wednesday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('wednesday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="wednesday_out" class="form-label">Wednesday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('wednesday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="wednesday_out" type="time" class="form-control" id="wednesday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('wednesday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="thursday_in" class="form-label">Thursday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('thursday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="thursday_in" type="time" class="form-control" id="thursday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('thursday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="thursday_out" class="form-label">Thursday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('thursday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="thursday_out" type="time" class="form-control" id="thursday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('thursday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="friday_in" class="form-label">Friday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('friday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="friday_in" type="time" class="form-control" id="friday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('friday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="friday_out" class="form-label">Friday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('friday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="friday_out" type="time" class="form-control" id="friday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('friday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="saturday_in" class="form-label">Saturday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('saturday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="saturday_in" type="time" class="form-control" id="saturday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('saturday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="saturday_out" class="form-label">Saturday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('saturday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="saturday_out" type="time" class="form-control" id="saturday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('saturday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sunday_in" class="form-label">Sunday In</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('sunday_in')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="sunday_in" type="time" class="form-control" id="sunday_in" placeholder="Enter First name">
                                                    </div>

                                                          @error('sunday_in') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sunday_out" class="form-label">Sunday Out</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('sunday_out')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="sunday_out" type="time" class="form-control" id="sunday_out" placeholder="Enter First name">
                                                    </div>

                                                          @error('sunday_out') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                

                                            
                                            <div class="align-item-center d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary w-md me-3">Save</button>
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



 




