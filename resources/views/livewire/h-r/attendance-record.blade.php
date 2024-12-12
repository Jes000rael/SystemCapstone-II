



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
                    <li class="breadcrumb-item active">Attendance Records</li>
                </ol>
            </div>

        </div>
    </div>
</div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                    <h4 class="card-title mb-3 fs-5">Attendance Records</h4>
                                    <div class="col-md-12 mb-2">
                                        <style>
/* Customize scrollbar for select */
#cut_off {
    overflow-y: auto; /* Enable vertical scrolling */
    max-height: 150px; /* Limit the dropdown height */
}

/* WebKit browsers (Chrome, Edge, Safari) */
#cut_off::-webkit-scrollbar {
    width: 6px; /* Thin scrollbar */
    background-color: transparent; /* Transparent scrollbar track */
}

#cut_off::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent thumb */
    border-radius: 10px; /* Rounded edges for thumb */
}

#cut_off::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.6); /* Darker thumb on hover */
}

/* Firefox */
#cut_off {
    scrollbar-width: thin; /* Thin scrollbar */
    scrollbar-color: rgba(0, 0, 0, 0.4) transparent; /* Thumb and track colors */
}
</style>

    <div class="row">
        <div class="col-md-4">
            <form class="">
                <div class="row">
                    <div class="col-md-7">
                        <select wire:model.live="cut_off" id="cut_off" name="option" class="form-select mb-1 mt-1 text-center">
                            @foreach($cutoffs as $cut)
                            <option value="{{ $cut->cutoff_id }}">{{ $cut->date_start }} - {{ $cut->date_end }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button wire:click="" type="submit" class="btn btn-primary mb-1 mt-1 w-100">Get Time Log</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8"></div>
    </div>
</div>


                                        <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                                <th>Cut Off</th>
                                                <th>Employee</th>

                                                <th>Total Hours</th>
                                                <th>Total Break</th>
                                                <th>Total OT</th>
                                                <th>Rate</th>
                                                <th>Date</th>
                                                <th>Duty Start</th>
                                                <th>Time in</th>
                                                <th>Time out</th>
                                                <th>Status</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($attendance as $attendancer)
                                                
                                            <tr>
                                            <td>{{ $attendancer->cutoff->date_start }} - {{ $attendancer->cutoff->date_end }}</td>

                                                <td>{{ $attendancer->employee->first_name }} {{ $attendancer->employee->last_name }} </td>
                                                <td>{{ $attendancer->total_hours }}</td>
                                                <td>{{ $attendancer->total_break }}</td>
                                                <td>{{ $attendancer->total_ot }}</td>
                                                <td>{{ $attendancer->rate }}</td>
                                                <td>{{ $attendancer->date }}</td>
                                                <td>{{ $attendancer->duty_start }}</td>
                                                <td>{{ $attendancer->time_in }}</td>
                                                <td>{{ $attendancer->time_out }}</td>
                                                <td>{{ $attendancer->attendanceStatus->description }}</td>
                                               
                                                
                                                <td class="text-center">
                                               
                                                <a class="btn btn-outline-secondary btn-sm view"  data-bs-toggle="modal" data-bs-target=".emprecView" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                                                  
                            
                                                  <div class="dropdown d-inline">
                                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                   
                                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                                     <li><a class="dropdown-item" href="#">Add Overtime</a></li>
                                                     <li><a class="dropdown-item" href="#">Add Request Time Adjustment</a></li>
                                                     
                                                   </ul>
                                                 </div>
                                                </td>
                                                    <!-- modal para sa view  -->
                                            <div class="modal modal-lg fade emprecView" id="emprecView" tabindex="-1" role="dialog" aria-labelledby="empViewLabel" aria-hidden="true" >
                    <div class=" modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="empViewLabel">Attendance Records</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <h4 class=""> <strong class="text-danger">Enopoly</strong></h4>
                            <div class="container">
                            <div class="row row-cols-3">
                               <div class="col text-start mt-3 mb-3"><text>Name:</text> <span class="fs-6 text-primary" >test</span>  <span class="fs-6 text-primary">test</span> <span class="fs-6 text-primary">test</span>  <span class="fs-6 text-primary">test</span> </div>
                               <div class="col text-start mt-3 mb-3"><text>Cutoff:</text> <span class="fs-6 text-primary">Wednesday</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Total Hours:</text> <span class="fs-6 text-primary">8 hours</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Total Break:</text> <span class="fs-6 text-primary">30mins</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Employee Status:</text> <span class="fs-6 text-primary">Active</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Total OT:</text> <span class="fs-6 text-primary">0 hours</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Rate:</text> <span class="fs-6 text-primary">56$</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Date:</text> <span class="fs-6 text-primary">Nov 6, 2024</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Duty Start:</text> <span class="fs-6 text-primary">9:00 am</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Time in:</text> <span class="fs-6 text-primary">8:50 am</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Time out:</text> <span class="fs-6 text-primary">5:03 pm</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Status:</text> <span class="fs-6 text-primary">Present</span></div>
                               <div class="col text-start mt-3 mb-3"><text>Has Night Diff:</text> <span class="fs-6 text-primary">0</span></div>

                               
                             </div>
                             
                             
                             
                           </div>
 

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                                            <!-- modal para sa view end -->
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







