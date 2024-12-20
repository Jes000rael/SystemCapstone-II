
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
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('hand-Book') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('hand-Book') }}">Attendance</a></li>
                            <li class="breadcrumb-item active">Add Overtime</li>
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

                        <h4 class="card-title mb-4 fs-5">Add Overtime</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="addOver">
                                    
                                    <div class="mb-3">
                                            <label for="start_time" class="form-label">Start Time</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('start_time')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="start_time"  id="start_time" class="form-control" type="date"></input>
                                        </div>

                                            @error('start_time') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">End Time</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('end_time')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="end_time"  id="end_time" class="form-control" type="date"></input>
                                        </div>

                                            @error('end_time') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="total_hours" class="form-label">Total Hours</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('total_hours')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="total_hours"  id="total_hours" class="form-control" type="number"></input>
                                        </div>

                                            @error('total_hours') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Add</button>
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






















