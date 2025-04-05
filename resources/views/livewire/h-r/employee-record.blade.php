

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
                                                    
                            <a class="btn btn-outline-secondary btn-sm view"  data-bs-toggle="modal" data-bs-target=".ViewEmployee{{ $employee->employee_id }}" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a wire:navigate href="{{ route('Employee-Edit', ['empID' => $encryptedEmpID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".DeleteEmployee{{ $employee->employee_id }}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <div class="dropdown d-inline">
                                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                   
                                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                                     <li><a wire:navigate href="{{ route('add-Schedule', ['empID' => $encryptedEmpID]) }}" class="dropdown-item" >Add Work Schedule</a></li>
                                                     <li><a wire:navigate href="{{ route('edit-Schedule', ['empID' => $encryptedEmpID]) }}" class="dropdown-item">Update Work Schedule</a></li>
                                                     <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target=".ViewEmployees{{ $employee->employee_id }}">View Work Schedule</a></li>
                                                     <li><a  class="dropdown-item" wire:navigate href="{{ route('add-Deduction', ['empID' => $encryptedEmpID]) }}">Add Deduction</a></li>
                                                
                                                     
                                                   </ul>
                                                 </div>
                        </td>
                       
                                                </tr> 
                                                 <!-- modal para view sa workschedule  -->
                                                 <div class="modal modal-lg fade ViewEmployees{{ $employee->employee_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewDepartmentLabel">Employee Work Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Company Information -->
          

                    <!-- Personal Information Section -->
                    <h6 class="text-primary mt-3 fs-5">Personal Information</h6>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Name:</strong>
                            <div class="border-bottom pb-1">{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }} {{ $employee->suffix }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Gender:</strong>
                            <div class="border-bottom pb-1">{{ $employee->gender }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Birth Date:</strong>
                            <div class="border-bottom pb-1">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Address:</strong>
                            <div class="border-bottom pb-1">{{ $employee->address }}</div>
                        </div>
                    </div>

                  

                    <!-- Emergency & Contact Section -->
                    <h6 class="text-primary mt-4 fs-5">Work Schedule</h6>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Monday In :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_in ?? 'No schedule' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Monday Out :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_out ?? 'No schedule' }}</div>
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Tuesday In :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_in ?? 'No schedule' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Tuesday Out :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_out ?? 'No schedule' }}</div>
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Monday In :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_in ?? 'No schedule' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Monday Out :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_out ?? 'No schedule' }}</div>
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Monday In :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_in ?? 'No schedule' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Monday Out :</strong>
                            <div class="border-bottom pb-1 px-5">{{ $employee->work_sched->monday_out ?? 'No schedule' }}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                                                  <!-- modal para view sa employee record end -->
                                                <!-- modal para view sa employee record  -->
                                                <div class="modal modal-lg fade ViewEmployee{{ $employee->employee_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewDepartmentLabel">Employee Records</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Company Information -->
                    <h6 class="fs-5 mt-1"><strong class="fs-5">Company:</strong> {{ $employee->company->description ?? 'N/A' }}</h6>

                    <!-- Personal Information Section -->
                    <h6 class="text-primary mt-3 fs-5">Personal Information</h6>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Name:</strong>
                            <div class="border-bottom pb-1">{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }} {{ $employee->suffix }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Gender:</strong>
                            <div class="border-bottom pb-1">{{ $employee->gender }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Birth Date:</strong>
                            <div class="border-bottom pb-1">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Address:</strong>
                            <div class="border-bottom pb-1">{{ $employee->address }}</div>
                        </div>
                    </div>

                    <!-- Employment Details Section -->
                    <h6 class="text-primary mt-4 fs-5">Employment Details</h6>
                    <div class="row gy-3">
                        <div class="col-sm-4">
                            <strong>Department:</strong>
                            <div class="border-bottom pb-1">{{ $employee->department->description ?? 'N/A' }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Job Title:</strong>
                            <div class="border-bottom pb-1">{{ $employee->jobtitle->description ?? 'N/A' }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Employment Status:</strong>
                            <div class="border-bottom pb-1">{{ $employee->employmentStatus->description ?? 'N/A' }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Shift:</strong>
                            <div class="border-bottom pb-1">{{ $employee->shift->description ?? 'N/A' }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Date Hired:</strong>
                            <div class="border-bottom pb-1">{{ \Carbon\Carbon::parse($employee->date_hired)->format('M d, Y') }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Hourly Rate:</strong>
                            <div class="border-bottom pb-1">{{ $employee->hourly_rate }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Email:</strong>
                            <div class="border-bottom pb-1">{{  $employee->email }}</div>
                        </div>
                        <div class="col-sm-4">
                            <strong>Username:</strong>
                            <div class="border-bottom pb-1">{{  $employee->username }}</div>
                        </div>
                    
                       <div class="col-sm-4">
                            <strong>Password:</strong>
                            <div class="border-bottom pb-1">{{ $employee->password_string }}</div>
                        </div>
                     
                    
                    </div>

                

                    <!-- Emergency & Contact Section -->
                    <h6 class="text-primary mt-4 fs-5">Emergency & Contact</h6>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>Emergency Contact:</strong>
                            <div class="border-bottom pb-1">{{ $employee->emergency_contact }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Contact Number:</strong>
                            <div class="border-bottom pb-1">{{ $employee->contact_number }}</div>
                        </div>
                    </div>

                    <!-- Government IDs Section -->
                    <h6 class="text-primary mt-4 fs-5">Government IDs</h6>
                    <div class="row gy-3">
                        <div class="col-sm-6">
                            <strong>TIN:</strong>
                            <div class="border-bottom pb-1">{{ $employee->tin }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>SSS:</strong>
                            <div class="border-bottom pb-1">{{ $employee->sss }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Pag-IBIG:</strong>
                            <div class="border-bottom pb-1">{{ $employee->pagibig }}</div>
                        </div>
                        <div class="col-sm-6">
                            <strong>PhilHealth:</strong>
                            <div class="border-bottom pb-1">{{ $employee->philhealth }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                                                  <!-- modal para view sa employee record end -->
                   <!-- modal delete  -->
                   <div wire:ignore.self class="modal fade DeleteEmployee{{ $employee->employee_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Delete Employee?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this employee?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteEmployee({{ $employee->employee_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
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
@if (session('notsched'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Work Schedule</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Empty employee</span> ',
          icon:'warning', 
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
@push('scripts')
@if (session('updatesched'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Work Schedule</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Updated Successfully</span> ',
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
@push('scripts')
@if (session('employee_has'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Employee</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Employee is already had Schedule</span> ',
          icon:'warning', 
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
@push('scripts')
@if (session('schedule-add'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Work Schedule</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Added Successfully</span> ',
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

@push('scripts')
@if (session('deduction-add'))
    <script>
        Swal.fire({
          title: '<strong style="color:#000; font-size:15px;" class="text-center">Deduction</strong><br><span style="color:#000; font-size:13px;"  class="text-center" >Added Successfully</span> ',
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

@push('scripts')
@if (session('employee-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Employee</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
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
