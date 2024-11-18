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
                                            <li class="breadcrumb-item active">Seniority Level</li>
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
        
                                        <h4 class="card-title">Add Seniority Level</h4>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form action="">
                                                    
                                                        <div class="mb-3">
                                                            <label for="formrow-firstname-input" class="form-label">Description</label>
                                                            <textarea class="form-control" rows="3" id="formrow-firstname-input" placeholder="Enter the description" name="" id=""></textarea>
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
                                                                <th>Company</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                        
                        
                                                            <tbody>
                                                            
                                                           @foreach($seniority as $level)
                                                           
                                                            <tr>
                                                                <td>{{ $level->company->description ?? 'N/A'}}</td>
                                                                <td>{{ $level->description }}</td>
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
     
