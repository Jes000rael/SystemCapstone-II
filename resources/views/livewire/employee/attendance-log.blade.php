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
                                    <li class="breadcrumb-item active">My Attendance</li>
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

                                <h4 class="card-title mb-4">Action</h4>
                                <div class="col-md-12">
                                    <button href="#" class="btn btn-primary mt-2 mb-2">Show Salary Summary</button>
                                    <button href="#" class="btn btn-warning mt-2 mb-2">Request Leave</button>

                                    <p class="fs-2 mt-3">Remaining Break Time : <span class="text-success"> 50:09</span></p>  
                                </div>

                                <!-- Form and Select Input with Button -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <form class="">

                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <select id="select-option" name="option" class="form-select mb-1 mt-1">
                                                            <option value="option1">Nov 10, 2024 - Nov 10, 2024</option>
                                                            <option value="option2">Nov 10, 2024 - Nov 10, 2024</option>
                                                            <option value="option3">Nov 10, 2024 - Nov 10, 2024</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button type="submit" class="btn btn-primary mb-1 mt-1 w-100">Get Time Log</button>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-9"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <!-- Attendance Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title fs-5 mb-4">My Attendance <button type="submit" class="btn btn-primary float-end"><i class="fas fa-eye me-1"></i> Show Rate</button></h4>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="yut" class="table table-bordered dt-responsive all-users-datatable_length nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time-in</th>
                                                    <th>Time-out</th>
                                                    <th>Total Hours</th>
                                                    <th>Rate</th>
                                                    <th>Night Diff</th>
                                                    <th>Earn Salary</th>
                                                    <th>Time-in Status</th>
                                                    <th>Break Time (Remaining Time)</th>
                                                    <th>Reason</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Nov 6, 2024</td>
                                                    <td>8:46 AM</td>
                                                    <td>5:03 PM</td>
                                                    <td>8.00</td>
                                                    <td>$10</td>
                                                    <td>0.00</td>
                                                    <td>$80</td>
                                                    <td>Early-Bird</td>
                                                    <td>56:00 mins</td>
                                                    <td>Yohoo</td>
                                                    
                                                </tr>
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
