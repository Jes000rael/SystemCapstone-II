
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
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('off-Duty') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Attendance Records</li>
                            <li class="breadcrumb-item active">Time Adjustment</li>
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

                        <h4 class="card-title mb-4 fs-5">Time Adjustment</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="cover_up_time">
                                        <div class="mb-3">
                                            <label for="request_type_id" class="form-label">Category</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('request_type_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="request_type_id" id="request_type_id" class="form-select">
                                                        <option selected>Choose...</option>
                                                          
                                                            @foreach ($timetype as $type)
                                                                  <option value="{{ $type->request_type_id}}">{{ $type->description ?? 'N/A'}}</option>
                                                              @endforeach
                                                        </select>
                                                        </div>
                                                    @error('request_type_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
    <label for="start_time" class="form-label">Start Date & Time</label>
    <div class="@error('errors') border border-danger rounded-2 @enderror @error('start_time') border border-danger rounded-2 @enderror">
        <input wire:model.live="start_time" id="start_time" class="form-control" type="datetime-local">
    </div>

    @error('start_time') 
        <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
    @enderror
</div>

                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">End Time</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('end_time')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="end_time"  id="end_time" class="form-control" type="datetime-local">
                                        </div>

                                            @error('end_time') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_hours" class="form-label">Total Hours</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('total_hours')border border-danger rounded-2 @enderror">
                                            <input type="number" wire:model.live="total_hours"  id="total_hours" class="form-control" placeholder="Enter the total Hours">
                                        </div>

                                            @error('total_hours') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="reason" class="form-label">Reason</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('reason')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="reason"  id="reason" class="form-control" placeholder="Enter the Reason">
                                        </div>

                                            @error('reason') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Update</button>
                                          <a wire:navigate href="{{ route('attendance-Records') }}" class="btn btn-secondary w-sm mt-3">Close</a>
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






















