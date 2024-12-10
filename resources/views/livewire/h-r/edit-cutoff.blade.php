
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
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('cutoff') }}">Add Cutoff</a></li>
                            <li class="breadcrumb-item active">Edit Cutoff</li>
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

                        <h4 class="card-title mb-4 fs-5">Edit Cutoff</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="editcutoff">
                                    
                                    <div class="mb-3">
                                                        <label for="date_start" class="form-label">Date Start</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_start')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model.live="date_start"  id="date_start" class="form-control"  placeholder="Enter the date_start">
                                        </div>

                                            @error('date_start') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="date_end" class="form-label">Date End</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_end')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model.live="date_end"  id="date_end" class="form-control" placeholder="Enter the date_end">
                                        </div>

                                            @error('date_end') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="conversion_rate" class="form-label">Corversion Rate</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('conversion_rate')border border-danger rounded-2 @enderror">
                                            <input type="number" step="any" wire:model.live="conversion_rate"  id="conversion_rate" class="form-control"  placeholder="Enter the conversion_rate">
                                        </div>

                                            @error('conversion_rate') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Update</button>
                                          <a wire:navigate href="{{ route('cutoff') }}" class="btn btn-secondary w-sm mt-3">Close</a>
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





















