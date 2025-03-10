


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
                    <li class="breadcrumb-item active">Add Employee</li>
                </ol>
            </div>

        </div>
    </div>
</div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title mb-4 fs-5">Add Employee</h4>
                                    <form wire:submit.prevent="addemp" method="POST">
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">First name</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('first_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="first_name" type="text" class="form-control" id="first_name" placeholder="Enter First name">
                                                    </div>

                                                          @error('first_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="last_name" class="form-label">Last name</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('last_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="last_name" type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
                                                    </div>

                                                          @error('last_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="middle_name" class="form-label">Middle name</label>
                                                    <div class=" @error('errors')border border-danger rounded-2 @enderror @error('middle_name')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="middle_name" type="text" class="form-control" id="middle_name" placeholder="Enter Middle Name">
                                                    </div>

                                                          @error('middle_name') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                           
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                    
                                                    <label for="suffix" class="form-label">Suffix</label>
                                                   
                                                        <select wire:model.live="suffix" id="suffix" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="Jr.">Jr. (Junior).</option>
                                                            <option value="Sr.">Sr. (Senior)</option>
                                                            <option value="II ">II (Second)</option>
                                                            <option value="III">III (Third)</option>
                                                            <option>None</option>
                                                        </select>
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3">Gender</label>
        
                                                    <div class="d-flex">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:model="gender" type="radio" class="form-check-input @error('gender') border border-danger rounded-2 @enderror" id="gender_male" value="Male">
                                                            <label class="form-check-label" for="gender_male">Male</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input wire:model="gender" type="radio" class="form-check-input @error('gender') border border-danger rounded-2 @enderror" id="gender_female" value="Female">
                                                            <label class="form-check-label" for="gender_female">Female</label>
                                                        </div>
                                                    </div>

                                                    @error('gender')
                                                      <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                    <label for="blood_type" class="form-label">Blood type</label>
                                                    <div class=" @error('errors')border border-danger rounded-2 @enderror @error('blood_type')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="blood_type" id="blood_type" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="A">A</option>
                                                            <option value="AB">AB</option>
                                                            <option value="O">O</option>
                                                            <option value="N/A">N/A</option>
                                                        </select>
                                                        </div>
                                                        @error('blood_type') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                  

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                   <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                    <div class=" @error('errors')border border-danger rounded-2 @enderror @error('address')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="address" type="text" class="form-control" id="address" placeholder="Enter Address">
                                                    </div>

                                                          @error('address') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        
                                                        <label for="company_id" class="form-label">Company</label>
                                                        
                                                       
                                                            @foreach ($companys as $company)
                                                                 
                                                                  <input value="{{ $company->description}}" type="text" id="company_id" class="form-control" readonly>
                                                              @endforeach

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="department_id" class="form-label">Department</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('department_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="department_id" id="department_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($department as $departments)
                                                            <option value="{{ $departments->department_id}}">{{ $departments->description}}</option>
                                                            @endforeach
                                                            @foreach ($depart as $dep)
                                                            <option value="{{ $dep->department_id}}">{{ $dep->description}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    @error('department_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                    <label for="job_title_id" class="form-label">Job title ID</label>
                                                    <div class=" @error('errors')border border-danger rounded-2 @enderror @error('job_title_id')border border-danger rounded-2 @enderror">
                                                        
                                                        <select wire:model.live="job_title_id" id="job_title_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($jobtitle as $jobtitles)
                                                            <option value="{{ $jobtitles->job_title_id}}">{{ $jobtitles->description}}</option>
                                                            @endforeach
                                                          
                                                        </select>
                                                        </div>
                                                    @error('job_title_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                 
                                                </div>
                                            </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="seniority_level_id" class="form-label">Seniority level</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('seniority_level_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="seniority_level_id" id="seniority_level_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($senioritylevels as $senioritylevel)
                                                                  <option value="{{ $senioritylevel->seniority_level_id}}">{{ $senioritylevel->description}}</option>
                                                              @endforeach
                                                        </select>
                                                        </div>
                                                    @error('seniority_level_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                                </div>
                                                
                                              
                                              
                                            <div class="row">
                                            <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="employment_status_id" class="form-label">Employment Status</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('employment_status_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="employment_status_id" id="employment_status_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($employmentstatus as $status)
                                                            <option value="{{ $status->employment_status_id}}">{{ $status->description}}</option>
                                                            @endforeach
                                                       
                                                        </select>
                                                

                                                    </div>
                                                    @error('employment_status_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                    </div>
                                                </div>
                                              
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_of_birth')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="date_of_birth" type="date" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth">
                                                        </div>
                                                    @error('date_of_birth') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="date_hired" class="form-label">Date Hired</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_hired')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="date_hired" type="date" class="form-control" id="date_hired" placeholder="Enter Date Hired">
                                                        </div>
                                                    @error('date_hired') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="date_start" class="form-label">Date Start</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_start')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="date_start" type="date" class="form-control" id="date_start" placeholder="Enter Date Hired">
                                                        </div>
                                                    @error('date_start') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="hourly_rate" class="form-label">Hourly Rate</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('hourly_rate')border border-danger rounded-2 @enderror">
                                                        <input  wire:model.live="hourly_rate" type="number" class="form-control" id="hourly_rate" placeholder="Enter Hourly Rate">
                                                        </div>
                                                    @error('hourly_rate') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="has_night_diff" class="form-label">Has Night Diff</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('has_night_diff')border border-danger rounded-2 @enderror">
                                                        <input  wire:model.live="has_night_diff" type="number" class="form-control" id="has_night_diff" placeholder="Enter Hourly Rate">
                                                        </div>
                                                    @error('has_night_diff') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('username')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="username" type="text" class="form-control" id="username" placeholder="Enter Username">
                                                        </div>
                                                    @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                                                        </div>
                                                    @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="contact_number" class="form-label">Contact number</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('contact_number')border border-danger rounded-2 @enderror">
                                                        <input  wire:model.live="contact_number" type="number" class="form-control" id="contact_number" placeholder="Enter Contact">
                                                        </div>
                                                    @error('contact_number') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="emergency_person" class="form-label">Emergency Person</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('emergency_person')border border-danger rounded-2 @enderror">
                                                        <input  wire:model.live="emergency_person" type="text" class="form-control" id="emergency_person" placeholder="Enter Emergency Person">
                                                        </div>
                                                    @error('emergency_person') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                    <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                                    <div class=" @error('errors')border border-danger rounded-2 @enderror @error('emergency_contact')border border-danger rounded-2 @enderror">
                                                    <input wire:model.live="emergency_contact" type="number" class="form-control" id="emergency_contact" placeholder="Enter Emergency Contact">
                                                    </div>
                                                    @error('emergency_contact') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

                                                

                                                    </div>
                                                </div>
                                                
                                              
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="relationship" class="form-label">Relationship</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('relationship')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="relationship" id="relationship" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="Manager-Employe">Manager-Employe</option>
                                                            <option value="Colleague">Colleague</option>
                                                            <option value="Employee-Client">Employee-Client</option>
                                                            <option value="Supplier">Supplier</option>
                                                            <option value="Human Resources">Human Resources</option>
                                                            <option value="Mentorship">Mentorship</option>
                                                        </select>
                                                        </div>
                                                        @error('relationship') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="row">
                                            <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <div  class=" @error('errors')border border-danger rounded-2 @enderror @error('email')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="email"  type="text" class="form-control" id="email" placeholder="Enter email">
                                                        </div>
                                                        @error('email') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                            <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="shift_id" class="form-label">Shift</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('shift_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="shift_id" id="shift_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($shifts as $shift)
                                                            <option value="{{ $shift->shift_id}}">{{ $shift->description}}</option>
                                                            @endforeach
                                                          
                                                        </select>
                                                        </div>
                                                        @error('shift_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                            

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="tin" class="form-label">TIN</label>
                                                        <div  class=" @error('errors')border border-danger rounded-2 @enderror @error('tin')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="tin" type="text" class="form-control" id="tin" placeholder="Enter TIN">
                                                        </div>
                                                        @error('tin') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                    <label for="sss" class="form-label">SSS</label>
                                                    <div  class=" @error('errors')border border-danger rounded-2 @enderror @error('sss')border border-danger rounded-2 @enderror">
                                                    <input wire:model.live="sss" type="text" class="form-control" id="sss" placeholder="Enter SSS">
                                                    </div>
                                                    @error('sss') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="pagibig" class="form-label">Pagibig</label>
                                                        <div  class=" @error('errors')border border-danger rounded-2 @enderror @error('pagibig')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="pagibig"  type="text" class="form-control" id="pagibig" placeholder="Enter Pagibig">
                                                        </div>
                                                        @error('pagibig') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="philhealth" class="form-label">Philhealth</label>
                                                        <div  class=" @error('errors')border border-danger rounded-2 @enderror @error('philhealth')border border-danger rounded-2 @enderror">
                                                        <input wire:model.live="philhealth"  type="text" class="form-control" id="philhealth" placeholder="Enter Philhealth">
                                                        </div>
                                                        @error('philhealth') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                

                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div>
                                                <button   type="submit" class="btn btn-primary w-md" >Save</button>
                                            </div>
                                        </form>
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
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->



 




