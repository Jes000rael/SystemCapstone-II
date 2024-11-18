<div id="layout-wrapper">
    
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">COMPANY</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                            <li class="breadcrumb-item active">Add company</li>
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

                        <h4 class="card-title">Add Company</h4>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <form wire:submit.prevent="add_company" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                        <textarea class="form-control" rows="5" id="formrow-companydescription" placeholder="Enter Company Description" wire:model.live="description"  id="description"></textarea>
                                       
                                      </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                    <div>

                                      <button type="submit" class="btn btn-primary w-md mt-3">Save</button>
                                    </div>
                                    </div>

                            </form>
                                </div>
                                  <div class="col-md-8">
                                    <div class="mb-3">
                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100" >
                      
                            <thead>
                            <tr>
                               
                                <th>Description</th>
                              
                                <th>Action</th>
                               
                            </tr>
                            </thead>
                            <tbody >
                              @foreach($company as $companies)
                            <tr>
                                <td>{{ $companies->description}} </td>
                                
                               
                                <td class="text-center">
                                  <a class="btn btn-outline-secondary btn-sm edit" title="View">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <a class="btn btn-outline-secondary btn-sm edit" data-bs-toggle="modal" data-bs-target=".transaction-detailModal{{ $companies->company_id }}">
                                    <i class="fas fa-trash"></i>
                                  </a>
                                  <div class="dropdown d-inline">
                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-ellipsis-h"></i>
                                  </a>
                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                     <li><a class="dropdown-item" href="#">Add work schedule</a></li>
                                     <li><a class="dropdown-item" href="#">Archive</a></li>
                                     <li><a class="dropdown-item" href="#">Share</a></li>
                                   </ul>
                                 </div>
                                </td>
                                
                               
                            </tr>
                            <div wire:ignore.self class="modal fade transaction-detailModal{{ $companies->company_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete Company?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this company?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteCompany({{ $companies->company_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


                            @endforeach
                            
                            </tbody>
                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                           
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>

@push('scripts')
@if (session('company-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Company</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted successfully!</span> ',
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