





                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
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
                                           
                                                
                                                <div class="col-md-3">
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
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                   
                                                    
                                                </div>
                                                <div class="col-md-3">
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
                                                <div class="col-md-6">
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
                                                        
                                                        <label for="company_id" class="form-label">Company ID</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('company_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="company_id" id="company_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($companys as $company)
                                                                  <option value="{{ $company->company_id}}">{{ $company->description}}</option>
                                                              @endforeach
                                                        </select>
                                                      

                                                    </div>
                                                    @error('company_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror

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
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputEmpStatusid" class="form-label">Employment Status ID</label>
                                                        <select id="formrow-inputEmpStatusid" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Full-Time Employee</option>
                                                            <option value="">Part-Time Employee</option>
                                                            <option value="">Contractor</option>
                                                            <option value="">Temporary Employee</option>
                                                            <option value="">Intern</option>
                                                            <option value="">Freelancer</option>
                                                            <option value="">Remote Worker</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputJobtitleID" class="form-label">Job title ID</label>
                                                        <select id="formrow-inputJobtitleID" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Software Engineer</option>
                                                            <option value="">Data Analyst</option>
                                                            <option value="">Project Manager</option>
                                                            <option value="">Marketing Specialist</option>
                                                            <option value="">Human Resources Manager </option>
                                                            <option value="">Sales Associate</option>
                                                            <option value="">Graphic Designer</option>
                                                            <option value="">Product Manager</option>
                                                            <option value="">Customer Service Representative </option>
                                                            <option value="">Financial Analyst</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputDeptitle" class="form-label">Department title</label>
                                                        <select id="formrow-inputDeptitle" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Human Resources</option>
                                                            <option value="">Finance</option>
                                                            <option value="">Marketing</option>
                                                            <option value="">Sales</option>
                                                            <option value="">Operations</option>
                                                            <option value="">Information Technology</option>
                                                            <option value="">Customer Service</option>
                                                            <option value="">Research and Development </option>
                                                            <option value="">Product Management</option>
                                                            <option value="">Legal</option>
                                                            <option value="">Compliance</option>
                                                            <option value="">Public Relations</option>
                                                            <option value="">Supply Chain Management</option>
                                                            <option value="">Facilities Management</option>
                                                            <option value="">Business Development</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputDateofbirth" class="form-label">Date of Birth</label>
                                                        <input type="date" class="form-control" id="formrow-inputDateofbirth" placeholder="Enter Date of Birth">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputDatehired" class="form-label">Date Hired</label>
                                                        <input type="date" class="form-control" id="formrow-inputDatehired" placeholder="Enter Date Hired">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputDatestart" class="form-label">Date Start</label>
                                                        <input type="date" class="form-control" id="formrow-inputDatestart" placeholder="Enter Date Hired">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputHourlyRate" class="form-label">Hourly Rate</label>
                                                        <input type="number" class="form-control" id="formrow-inputHourlyRate" placeholder="Enter Hourly Rate">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputHasnightdiff" class="form-label">Has Night Diff</label>
                                                        <select id="formrow-inputHasnightdiff" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Eligibility</option>
                                                            <option value="">Percentage Increase</option>
                                                            <option value="">Defined Hours</option>
                                                            <option value="">Impact on Benefits</option>
                                                            <option value="">Union Contracts</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputUsername" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="formrow-inputUsername" placeholder="Enter Username">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputPassword" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="formrow-inputPassword" placeholder="Enter Password">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputContactnumber" class="form-label">Contact number</label>
                                                        <input type="number" class="form-control" id="formrow-inputContactnumber" placeholder="Enter Contact">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                    <label for="formrow-inputEmergencycontact" class="form-label">Emergency Contact</label>
                                                    <input type="number" class="form-control" id="formrow-inputEmergencycontact" placeholder="Enter Emergency Contact">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputEmergencyperson" class="form-label">Emergency Person</label>
                                                        <input type="text" class="form-control" id="formrow-inputEmergencyperson" placeholder="Enter Emergency Person">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputRelationship" class="form-label">Relationship</label>
                                                        <select id="formrow-inputRelationship" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Manager-Employe</option>
                                                            <option value="">Colleague</option>
                                                            <option value="">Employee-Clien</option>
                                                            <option value="">Supplier</option>
                                                            <option value="">Human Resources</option>
                                                            <option value="">Mentorship</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputhourlyRate" class="form-label">Hourly Rate</label>
                                                        <input type="number" class="form-control" id="formrow-inputhourlyRate" placeholder="Enter Hourly Rate">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputhasnightdiff" class="form-label">Has Night Diff</label>
                                                        <select id="formrow-inputhasnightdiff" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Eligibility</option>
                                                            <option value="">Percentage Increase</option>
                                                            <option value="">Defined Hours</option>
                                                            <option value="">Impact on Benefits</option>
                                                            <option value="">Union Contracts</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputusername" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="formrow-inputusername" placeholder="Enter Username">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputpassword" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="formrow-inputpassword" placeholder="Enter Password">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputShiftID" class="form-label">Shift ID</label>
                                                        <select id="formrow-inputShiftID" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Day Shift</option>
                                                            <option value="">Night Shift</option>
                                                            <option value="">Evening Shift</option>
                                                            <option value="">Weekend Shift</option>
                                                            <option value="">Split Shift</option>
                                                            <option value="">Overnight Shift</option>
                                                            <option value="">Flexible Shift</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputTIN" class="form-label">TIN</label>
                                                        <input type="text" class="form-control" id="formrow-inputTIN" placeholder="Enter TIN">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                    <label for="formrow-inputSSS" class="form-label">SSS</label>
                                                    <input type="text" class="form-control" id="formrow-inputSSS" placeholder="Enter SSS">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputPagibig" class="form-label">Pagibig</label>
                                                        <input type="text" class="form-control" id="formrow-inputPagibig" placeholder="Enter Pagibig">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputPhilhealth" class="form-label">Philhealth</label>
                                                        <input type="text" class="form-control" id="formrow-inputPhilhealth" placeholder="Enter Philhealth">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                      Check me out
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Save</button>
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
</div>








