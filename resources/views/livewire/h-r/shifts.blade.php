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
                            <li class="breadcrumb-item active">Add Shift</li>
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

                        <h4 class="card-title fs-5 mb-4">Add Shift</h4>
                        <div class="col-md-12">
                            <div class="row">
                                <livewire:h-r.add-shift/>
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
                                            
                                           @foreach($shift as $select)
                                           

                                            <tr>

                                                <td>{{ $select->description }}</td>
                                                <td class="text-center">
                                                
                                                  <a wire:navigate href="/admin/shifts/edit" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".deleteShift{{ $select->shift_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  
                                                </td>
                                            </tr>

                                            <!-- delete modal  -->
                                            <div wire:ignore.self class="modal fade deleteShift{{ $select->shift_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete Niight Shift?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this night shift?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteShift({{ $select->shift_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                                            <!-- delete modal end -->
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
