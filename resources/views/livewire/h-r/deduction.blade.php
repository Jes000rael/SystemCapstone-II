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
                                            
                                           
                                           

                                            <tr>
                                                <td>Employee1</td>
                                                <td>Pala absent</td>
                                                <td>756</td>
                                                <td class="text-center">
                                               

                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View" data-bs-toggle="modal" data-bs-target=".ViewHoliday">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a wire:navigate href="deduction/edit-deduction" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".DeleteDeduction">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  
                                                </td>
                                            </tr>
                                            
                                   <!-- modal view  -->
                                   <div class="modal fade ViewHoliday" tabindex="-1" role="dialog" aria-labelledby="ViewDepartmentLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewDepartmentLabel">Deduction Log</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-4">Employee : <span class=" fw-bold">Employee1</span></p>
                                <p class="mb-4">Description : <span class=" fw-bold">Pala absent</span></p>
                                <p class="mb-4">Value : <span class=" fw-bold">756</span></p>
                                

                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                                   <!-- modal view  end -->

                                   <!-- modal delete  -->
                                   <div wire:ignore.self class="modal fade DeleteDeduction" tabindex="-1" role="dialog" aria-labelledby="DeleteDeduciton" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteDeduction">Delete Deduction?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this employee deduction?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="DeleteDeduction" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                                   <!-- modal delete end -->
                                            
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
