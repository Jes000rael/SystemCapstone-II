

<div>

<div id="layout-wrapper">
            <div class="main-content">
     

                <div class="page-content">
                    <div class="container-fluid">

@include('components.layouts.navbars.page-title')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">Add Employee</h4> -->
                                        <form>
                                            <!-- <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Your First Name">
                                            </div> -->
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">First name</label>
                                                        <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter First name">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-lastname-input" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" id="formrow-lastname-input" placeholder="Enter Last name">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-middlename-input" class="form-label">Middle name</label>
                                                        <input type="text" class="form-control" id="formrow-middlename-input" placeholder="Enter Middle name">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                
                                                
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                    <label for="formrow-inputSuffix" class="form-label">Suffix</label>
                                                        <select id="formrow-inputSuffix" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Jr. (Junior).</option>
                                                            <option value="">Sr. (Senior)</option>
                                                            <option value="">II (Second)</option>
                                                            <option value="">III (Third)</option>
                                                            <option value="">None</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                    <label for="formrow-inputBloodtype" class="form-label">Blood type</label>
                                                        <select id="formrow-inputBloodtype" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">A</option>
                                                            <option value="">AB</option>
                                                            <option value="">O</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                    <label for="formrow-inputAddress" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="formrow-inputAddress" placeholder="Enter Address">
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputCity" class="form-label">Company ID</label>
                                                        <select id="formrow-inputCompany" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Cmpy-001</option>
                                                            <option value="">Cmpy-002</option>
                                                            <option value="">Cmpy-003</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputSenioritylevel" class="form-label">Seniority level</label>
                                                        <select id="formrow-inputSenioritylevel" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option value="">Entry-level</option>
                                                            <option value="">Mid-level</option>
                                                            <option value="">Senior-level</option>
                                                            <option value="">Executive-level</option>
                                                            <option value="">Board-level</option>
                                                        </select>
                                                        <!-- <div class="text-danger">Please fill this field</div> -->

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
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                 <!-- modal-view -->
                 <div class="modal modal-lg fade empView" id="empView" tabindex="-1" role="dialog" aria-labelledby="empViewLabel" aria-hidden="true">
                    <div class=" modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="empViewLabel">Employee Info.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                            <div class="container">
                            <div class="row row-cols-3">
                               <div class="col text-start mt-3 mb-3"><strong>Name:</strong> <span id="modal-first-name"></span>  <span id="modal-middle-name"></span> <span id="modal-last-name"></span>  <span id="modal-suffix"></span> </div>
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
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
</div>






