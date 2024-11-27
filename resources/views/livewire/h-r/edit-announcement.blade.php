
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
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('anouncements') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a wire:navigate href="{{ route('anouncements') }}">Add Announcement</a></li>
                            <li class="breadcrumb-item active">Edit Announcement</li>
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

                        <h4 class="card-title mb-4 fs-5">Edit Announcement</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="editAnnouncement">
                                                       
                                                       <div class="mb-3">
                                               <label for="description" class="form-label">Description</label>
                                               <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                               
                                               <textarea wire:model.live="description" rows="5"  id="description" class="form-control" placeholder="Enter the description"></textarea>
                                           </div>
   
                                               @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                           </div>
                                           <div class="mb-3">
                                               <label for="date" class="form-label">Date</label>
                                               <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date')border border-danger rounded-2 @enderror">
                                             
                                               @php
      
       $timezone = config('app.timezone') ?? 'UTC';
       $minDate = \Carbon\Carbon::now($timezone)->toDateString(); 
   @endphp
   
   <input class="form-control" 
          type="date" 
          id="date" 
          name="date" 
          min="{{ $minDate }}" 
          wire:model.live="date">
   
   <script>
   
       const timezone = @json($timezone); 
   
    
       function getServerTime() {
           const serverTime = new Date().toLocaleString("en-US", { timeZone: timezone });
           const serverDate = new Date(serverTime); 
           return serverDate.toISOString().split('T')[0]; 
       }
   
       document.getElementById('date').setAttribute('min', getServerTime());
   </script>
   
                                           </div>
   
                                               @error('date') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                           </div>
                                        <div class="mb-3">
                                        <div class="align-item-center d-flex justify-content-center">
                                          <button type="submit" class="btn btn-primary w-sm mt-3 me-2">Update</button>
                                          <a wire:navigate href="{{ route('anouncements') }}" class="btn btn-secondary w-sm mt-3">Close</a>
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


