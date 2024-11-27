

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
                                                     <li><a class="dropdown-item" href="#">Add Work Schedule</a></li>
                                                     <li><a class="dropdown-item" href="#">Update Work Schedule</a></li>
                                                     <li><a class="dropdown-item" href="#">View Work Schedule</a></li>
                                                     <li><a  class="dropdown-item" wire:navigate href="employee_records/add-deduction">Add Deduction</a></li>
                                                
                                                     
                                                   </ul>
                                                 </div>
                        </td>
                       
                                                </tr> 
                                                <!-- modal para view sa employee record  -->
                <div class="modal modal-lg fade ViewEmployee{{ $employee->employee_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewDepartmentLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewDepartmentLabel">Employee Records</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <div class="container">
 
                               <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                               <div class="row">
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Company:</text> <span class="fs-6 text-primary">{{ $employee->company->description ?? 'N/A'}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Firstname:</text> <span class="fs-6 text-primary">{{ $employee->first_name }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Lastname:</text> <span class="fs-6 text-primary">{{ $employee->last_name }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Middlename:</text> <span class="fs-6 text-primary">{{ $employee->middle_name }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Suffix:</text> <span class="fs-6 text-primary">{{ $employee->suffix }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Gender:</text> <span class="fs-6 text-primary">{{ $employee->gender}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Bloodtype:</text> <span class="fs-6 text-primary">{{ $employee->blood_type}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Address:</text> <span class="fs-6 text-primary">{{ $employee->address}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Birth Date:</text> <span class="fs-6 text-primary">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Emergency Contact:</text> <span class="fs-6 text-primary">{{ $employee->emergency_contact}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Date Hired:</text> <span class="fs-6 text-primary">{{ \Carbon\Carbon::parse($employee->date_hired)->format('M d, Y') }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Date Start:</text> <span class="fs-6 text-primary">{{ \Carbon\Carbon::parse($employee->date_start)->format('M d, Y') }}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Seniority:</text> <span class="fs-6 text-primary">{{ $employee->seniority_level_id}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Employment:</text> <span class="fs-6 text-primary">{{ $employee->employment_status_id}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Job Title:</text> <span class="fs-6 text-primary">{{ $employee->job_title_id}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Department:</text> <span class="fs-6 text-primary">{{ $employee->department_id}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Hourly Rate:</text> <span class="fs-6 text-primary">{{ $employee->hourly_rate}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Has Night Diff:</text> <span class="fs-6 text-primary">{{ $employee->has_night_diff}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Shift:</text> <span class="fs-6 text-primary">{{ $employee->shift_id}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Username:</text> <span class="fs-6 text-primary">{{ $employee->username}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Password:</text> <span class="fs-6 text-primary">{{ $employee->password_string}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Relationship:</text> <span class="fs-6 text-primary">{{ $employee->relationship}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Tin:</text> <span class="fs-6 text-primary">{{ $employee->tin}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Sss:</text> <span class="fs-6 text-primary">{{ $employee->sss}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Pagibig:</text> <span class="fs-6 text-primary">{{ $employee->pagibig}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Philhealth:</text> <span class="fs-6 text-primary">{{ $employee->philhealth}}</span></div>

                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Contact:</text> <span class="fs-6 text-primary">{{ $employee->contact_number}}</span></div>
                                 <div class="col-6 col-md-4 mt-2 mb-2"><text>Emergency Person:</text> <span class="fs-6 text-primary">{{ $employee->emergency_person}}</span></div>
                                 
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
