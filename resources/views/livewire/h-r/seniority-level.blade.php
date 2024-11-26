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
                                            <li class="breadcrumb-item active">Add Seniority Level</li>
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
        
                                        <h4 class="card-title fs-5 mb-4">Add Seniority Level</h4>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <livewire:h-r.add-seniority/>
                                                <div class="col-md-8">
                                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                                            <thead>
                                                            <tr>
                                                          
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                        
                        
                                                            <tbody>
                                                            
                                                           @foreach($seniority as $level)
                                                           
                                                            <tr>
                                                            <style>
                                .modal-backdrop {
                                   background-color: transparent !important; /* No background for the backdrop */
                                }
                                .modal-content {
                                      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.8); /* Smooth and subtle shadow */
                               }
                                   </style>
                                                              
                                                                <td>{{ $level->description }}</td>
                                                                <td class="text-center">
                                                                  
                                                                  <a wire:navigate href="/admin/seniority/edit" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                  </a>
                                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".DeleteSeniority{{ $level->seniority_level_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                                  
                                                                </td>
                                                            </tr>
                                                            <!-- modal delete  -->
                                                            <div wire:ignore.self class="modal fade DeleteSeniority{{ $level->seniority_level_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete Seniority Level?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this seniority level?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteDepartment({{ $level->seniority_level_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                                                            <!-- modal delete end -->
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
            <!-- end main content-->

        </div>
     
