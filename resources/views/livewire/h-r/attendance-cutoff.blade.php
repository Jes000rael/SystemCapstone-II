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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Add Cutoff</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
         
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title fs-5 mb-4">Add Cutoff</h4>
                        <div class="col-md-12">
                            <div class="row">
                                <livewire:h-r.add-cutoff/>
                                <div class="col-md-8"   wire:ignore.self>
                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Date Start</th>
                                                <th>Date End</th>
                                                <th>Conversion Rate</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach ($cutoff as $cutoffs)
                                           
                                            @php
                                                     $encryptecutoffID = Crypt::encrypt($cutoffs->cutoff_id);
                                               @endphp

                                            <tr>
                                             
                                                <td> 
                                                
                                                {{ \Carbon\Carbon::parse($cutoffs->date_start)->format('D, M d Y') }}
                                                </td>
                                                <td> 
                                                {{ \Carbon\Carbon::parse($cutoffs->date_end)->format('D, M d Y') }}
                                                </td><td> 
                                                {{ $cutoffs->conversion_rate}}
                                                </td>
                                                <td class="text-center">
                                               
                                                  <a wire:navigate href="{{ route('edit-Cutoff', ['cutoffID' => $encryptecutoffID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit" >
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".Deletecutoff{{ $cutoffs->cutoff_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  
                                                </td>
                                                     <!-- modal para delete sa cutoff  -->
<div wire:ignore.self class="modal fade Deletecutoff{{ $cutoffs->cutoff_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete cutoff?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this cutoff?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deletecutoff({{ $cutoffs->cutoff_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
             <!-- modal para delete sa cutoff end -->
                                            </tr>
                                            
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        
                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        
    </div>
    <!-- container-fluid -->
</div>
</div>
@push('scripts')
@if (session('cutoff-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Cutoff</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush
@push('scripts')
@if (session('cutoff-add'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Cutoff</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush

@push('scripts')
@if (session('updatecutoff'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Cutoff</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Updated Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush