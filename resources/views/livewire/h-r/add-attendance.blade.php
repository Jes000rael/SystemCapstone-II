
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
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('employee-Record') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                            <li class="breadcrumb-item active">Add Attendance</li>
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

                        <h4 class="card-title mb-4 fs-5">Add Attendance</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="niceka">
                                        <div class="mb-3">
                                            <label for="cutoff_id" class="form-label">Cutoff</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('cutoff_id')border border-danger rounded-2 @enderror">
                                                
                                                        <select wire:model="cutoff_id" id="cutoff_id" class="form-select">
    <option class="text-white" value="">Select Cut Off Date</option>

                                                        @if($cutoff->isEmpty())
        <option class="text-white" disabled selected>No cutoffs found</option>
    @else
        @foreach($cutoff as $cut)
            <option value="{{ $cut->cutoff_id }}">
                {{ \Carbon\Carbon::parse($cut->date_start)->format('M d, Y') }} - 
                {{ \Carbon\Carbon::parse($cut->date_end)->format('M d, Y') }}   
            </option>
        @endforeach
    @endif
                                                        </select>
                                                        </div>
                                                    @error('cutoff_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
    <label for="date_of_attendance" class="form-label">Date</label>
    <div class="@error('errors') border border-danger rounded-2 @enderror @error('date_of_attendance') border border-danger rounded-2 @enderror">
        <input wire:model="date_of_attendance" id="date_of_attendance" class="form-control" type="date">
    </div>

    @error('date_of_attendance') 
        <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
    @enderror
</div>
                                        <div class="mb-3">
    <label for="start_time" class="form-label">Start Date & Time</label>
    <div class="@error('errors') border border-danger rounded-2 @enderror @error('start_time') border border-danger rounded-2 @enderror">
        <input wire:model="start_time" id="start_time" class="form-control" type="datetime-local">
    </div>

    @error('start_time') 
        <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
    @enderror
</div>

                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">End Time</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('end_time')border border-danger rounded-2 @enderror">
                                            <input wire:model="end_time"  id="end_time" class="form-control" type="datetime-local">
                                        </div>

                                            @error('end_time') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_hours" class="form-label">Total Hours</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('total_hours')border border-danger rounded-2 @enderror">
                                            <input type="number" wire:model="total_hours"  id="total_hours" class="form-control" placeholder="Enter the total Hours">
                                        </div>

                                            @error('total_hours') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                        <label for="total_ot" class="form-label">
    Total Overtime
    <input type="checkbox" class="form-check-input fw-3" wire:model.live="total_ot_checked">
</label>


<div class=" @error('errors')border border-danger rounded-2 @enderror @error('total_ot')border border-danger rounded-2 @enderror">
    @if($total_ot_checked) 
        <input type="number" wire:model="total_ot" id="total_ot" class="form-control" placeholder="Enter the total Overtime">
    @endif
</div>

@error('total_ot') 
    <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
@enderror


                                            @error('total_ot') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="status_id" class="form-label">Attendance Status</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('status_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="status_id" id="status_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($attendanceStatus as $statusatt)
                                                                  <option value="{{ $statusatt->status_id}}">{{ $statusatt->description ?? 'N/A'}}</option>
                                                              @endforeach
                                                        </select>
                                                        </div>
                                                    @error('status_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                
                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Add Attendance</button>
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






















