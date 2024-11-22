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
                            <li class="breadcrumb-item active">Add Hollidays</li>
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

                        <h4 class="card-title fs-5 mb-4">Add Hollidays <a href="" class="btn btn-primary btn-sm float-end">Add Off Duty Category</a></h4> 
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="">
                                        <div class="mb-3">
                                            <label for="formrow-emp" class="form-label">Hollidays</label>
                                            <select id="formrow-emp" class="form-select">
                                                <option selected>Choose...</option>
                                                <option value="">Holliday 1</option>
                                                <option value="">Holliday 2</option>
                                                <option value="">Holliday 3</option>
                                                <option value="">Holliday 4</option>
                                                <option value="">Holliday 5</option>
                                            </select>
                                            <!-- <div class="text-danger">Please fill this field</div> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="formrow-value" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="formrow-value" placeholder="Enter Hollidays date" required>
                                            <!-- <div class="text-danger">Please fill this field</div> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="formrow-percentage" class="form-label">Percentage</label>
                                            <input type="number" class="form-control" id="formrow-percentage" placeholder="Enter Percentage" required>
                                            <!-- <div class="text-danger">Please fill this field</div> -->
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Description</label>
                                            <textarea class="form-control" rows="3" id="formrow-firstname-input" placeholder="Enter the description"></textarea>
                                            <!-- <div class="text-danger">Please fill this field</div> -->
                                        </div>
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Holliday ID</th>
                                                <th>Holliday</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                           
                                           

                                            <tr>
                                                <td>Holl-001</td>
                                                <td>Squad Goals</td>
                                                <td>yohooooooooooo</td>
                                                <td>11/11/2024</td>
                                                <td class="text-center">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
