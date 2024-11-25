<div id="layout-wrapper">
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">USER</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                    <li class="breadcrumb-item active">Hand Book</li>
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

                                <h4 class="card-title mb-4">Hand Book</h4>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                    <table id="yut" class="table table-bordered table-striped dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date Added</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach( $hand as $book )
                                           
                                           

                                            <tr>
                                                <td>{{ $book->description }}<a href="{{ $book->link }}"> <i class="bx bx-paper-plane ms-2 fs-5 text-success"></i></a></td>
                                                <td>{{ date('D M d Y', strtotime($book->date)) }}</td>
                                                
                                            </tr>
                                           
                                            
                                            @endforeach
                                            
                                            
                                            </tbody>
                                        </table>
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
    <!-- END layout-wrapper -->
</div>

