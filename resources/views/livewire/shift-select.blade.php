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
                            <li class="breadcrumb-item active">Shift</li>
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

                        <h4 class="card-title">Add Shift</h4>
                        <div class="col-md-12">
                            <div class="row">
                                <livewire:add-shift/>
                                <div class="col-md-8">
                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Night Shift</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                           @foreach($shift as $select)
                                           

                                            <tr>
                                                <td>{{ $select->company->description ?? 'N/A' }}</td>
                                                <td>{{ $select->description }}</td>
                                                <td class="text-center">
                                               
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View" data-bs-toggle="modal" data-bs-target=".ViewShift{{ $select->shift_id }}">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".DeleteShift{{ $select->shift_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  <div class="dropdown d-inline">
                                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                   
                                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                                     <li><a class="dropdown-item" href="#">Details</a></li>
                                                     <li><a class="dropdown-item" href="#">Archive</a></li>
                                                     <li><a class="dropdown-item" href="#">Share</a></li>
                                                   </ul>
                                                 </div>
                                                </td>
                                            </tr>

                                            <!-- modal view para sa shift -->
                <div class="modal fade ViewShift{{ $select->shift_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewDepartmentLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewDepartmentLabel">Shift</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Company : <span class="text-primary fw-bold">{{ $select->company->description ?? 'N/A' }}</span></p>
                                <p class="mb-4">Night Shift : <span class="text-primary fw-bold">{{ $select->description }}</span></p>

                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                                            <!-- modal view para sa shift end -->
                                             <!-- modal delete para sa shift  -->
<div wire:ignore.self class="modal fade DeleteShift{{ $select->shift_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete Shift?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this shift?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteShift({{ $select->shift_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                                             <!-- modal delete para sa shift end -->
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
<!-- End Page-content -->
</div>
@push('scripts')
@if (session('shift-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Shift</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted successfully!</span> ',
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
@if (session('shift-add'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Shift</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Add Successfully!</span> ',
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