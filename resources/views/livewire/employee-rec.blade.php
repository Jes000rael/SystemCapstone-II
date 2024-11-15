

<div>

<div id="layout-wrapper">
            <div class="main-content">
     

                <div class="page-content">
                    <div class="container-fluid">
                    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Company Employees</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Company Employees</a></li>
                 
                            <li class="breadcrumb-item active">Employee Records</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">Employee Records</h4> -->
                                        <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Middle Name</th>
                                                <th>Gender</th>
                                                <th>Blood Type</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($employees as $employee)
                                                @php
                                                     $encryptedEmpID = Crypt::encrypt($employee->employee_id);
                                               @endphp
                                            
                                                <tr>
                                                    <td>{{ $employee->company->description ?? 'N/A'}}</td>
                                                    <td>{{ $employee->first_name }}</td>
                                                    <td>{{ $employee->last_name }} {{ $employee->suffix}}</td>
                                                    <td>{{ $employee->middle_name }}</td>
                                                    <td>{{ $employee->gender}}</td>
                                                    <td>{{ $employee->blood_type }}</td>
                                                    <td>{{ $employee->address }}</td>
                                                    <td>{{ $employee->contact_number }}</td>
                                                    <td class="text-center">
                            <a class="btn btn-outline-secondary btn-sm view"  data-bs-toggle="modal" data-bs-target="#empView" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a wire:navigate href="{{ route('employee-Edit-Super', ['empID' => $encryptedEmpID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      
                                                </tr> 
                                                  

                                                @endforeach

                                            </tbody>
                                        </table>


        
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
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

   
</div>





