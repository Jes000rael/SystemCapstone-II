

<div>

<div id="layout-wrapper">
            <div class="main-content">
     

                <div class="page-content">
                    <div class="container-fluid">
                    <div class="row">
                 <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Admin</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
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
        
                                        <h4 class="card-title mb-4 fs-5">Employee Records</h4>
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
                            <a wire:navigate href="{{ route('Employee-Edit', ['empID' => $encryptedEmpID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                       
                                                </tr> 
                                                    <!-- modal-view -->
                 <div class="modal modal-lg fade " id="empView" tabindex="-1" role="dialog" aria-labelledby="empViewLabel" aria-hidden="true" >
                    <div class=" modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="empViewLabel">Employee Info.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <h4 class=""> <strong class="text-danger">{{ $employeed->company->description ?? 'N/A'}}</strong></h4>
                            <div class="container">
                            <div class="row row-cols-3">
                               <div class="col text-start mt-3 mb-3"><strong>Name:</strong> <span >{{ $employeed->first_name ?? 'N/A' }}</span>  <span>{{ $employeed->middle_name ?? 'N/A' }}</span> <span>{{ $employeed->last_name  ?? 'N/A'}}</span>  <span>{{ $employeed->suffix ?? 'N/A'}}</span> </div>
                               <div class="col text-start mt-3 mb-3"><strong>Blood Type:</strong> <span>AB</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Address:</strong> <span>Tamiao, Bantayan, Cebu</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Seniority Level:</strong> <span>Manager 999</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Employee Status:</strong> <span>Active</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Job Title:</strong> <span>Sourcerer</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Department Title:</strong> <span>Sale Dept.</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Date of Birth:</strong> <span>Dec. 16 1999</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Date Hired:</strong> <span>Jan 12, 2023</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Date Start:</strong> <span>Jan 30, 2023</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Hourly Rate:</strong> <span>600</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Has Night Diff:</strong> <span>Night Shift</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Username:</strong> <span>Brigiksgwaps</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Contact Number:</strong> <span>0987574857</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Emergency Contact:</strong> <span>0944574775</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Contact Person:</strong> <span>Isagani Aloba Jr</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Relationship:</strong> <span>Employee to Manager</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>TIN:</strong> <span>78888854</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>SSS:</strong> <span>58855574</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Pagibig:</strong> <span>47555225</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Philhealth:</strong> <span>5774444</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Date Added:</strong> <span>Jan 31, 2023</span></div>
                               <div class="col text-start mt-3 mb-3"><strong>Shift:</strong> <span>Night Shift</span></div>

                             </div>
                             
                             
                             
                           </div>
 

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                  <!-- end-modal --> 

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






@push('scripts')
@if (session('updateEmployee'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Update Employee</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Employee Updated Successfully</span> ',
          icon:'success', 
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true, 
            width: '350px', 
            height: '100px',
            backdrop: true,
            position: 'top-end', 
            toast: true,
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp', 
            },
         
            
        });
    </script>
@endif
@endpush


