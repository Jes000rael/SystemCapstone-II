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
                            <li class="breadcrumb-item active">Deduction Log</li>
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

                        <h4 class="card-title fs-5 mb-4">Deduction Log</h4>
                        <div class="col-md-12">
                            
                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                
                                                <th>Employee</th>
                                                <th>Description</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                           
                                           @foreach($dede as $tion)

                                            <tr>
                                                <td>{{ $tion->employees->first_name ?? 'N/A' }} {{ $tion->employees->middle_name ?? 'N/A' }} {{ $tion->employees->last_name ?? 'N/A' }} {{ $tion->employees->suffix ?? 'N/A' }}</td>
                                                <td>{{ $tion->description }}</td>
                                                <td>{{ $tion->value }}</td>
                                                <td class="text-center">
                                               

                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View" data-bs-toggle="modal" data-bs-target=".ViewDeduc{{ $tion->deductions_id }}">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                  @php
                                                     $encrypteDeductionID = Crypt::encrypt($tion->deductions_id);
                                               @endphp

                                                  <a wire:navigate href="{{ route('edit-Deduction', ['deducID' => $encrypteDeductionID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".deleteDeduc{{ $tion->deductions_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  
                                                </td>
                                                <!-- modal view  -->
                                   <div class="modal fade ViewDeduc{{ $tion->deductions_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewDeduc{{ $tion->deductions_id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewDeduc{{ $tion->deductions_id }}Label">Deduction Log</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-4">Employee : <span class=" fw-bold">{{ $tion->employees->first_name ?? 'N/A' }} {{ $tion->employees->middle_name ?? 'N/A' }} {{ $tion->employees->last_name ?? 'N/A' }} {{ $tion->employees->suffix ?? 'N/A' }}</span></p>
                                <p class="mb-4">Description : <span class=" fw-bold">{{ $tion->description }}</span></p>
                                <p class="mb-4">Value : <span class=" fw-bold">{{ $tion->value }}</span></p>
                                

                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                                   <!-- modal view  end -->

                                   <!-- modal delete  -->
                                   <div wire:ignore.self class="modal fade deleteDeduc{{ $tion->deductions_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteDeduc{{ $tion->deductions_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDeduc{{ $tion->deductions_id }}">Delete Deduction?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this employee deduction?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteDeduc({{ $tion->deductions_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                                   <!-- modal delete end -->
                                            
                                            </tr>
                                            @endforeach


                                            
                                   
                                            </tbody>
                                        </table>
                               
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
@if (session('deduction-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Deduction</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
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
@if (session('updateDeduction'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Deduction</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Updated Successfully!</span> ',
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
@if (session('deduction-add'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Deduction</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully!</span> ',
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