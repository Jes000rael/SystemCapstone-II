



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

#cut_off {
    overflow-y: auto; 
    max-height: 150px; 
}


#cut_off::-webkit-scrollbar {
    width: 6px;
    background-color: transparent; 
}

#cut_off::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.4); 
    border-radius: 10px; 
}

#cut_off::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.6); 
}


#cut_off {
    scrollbar-width: thin; 
    scrollbar-color: rgba(0, 0, 0, 0.4) transparent; 
}
</style>

    <div class="row">
        <div class="col-md-4">
            <form wire:submit.prevent="cutoffselect">
                <div class="row">
                    <div class="col-md-7">
                        <select wire:model="cut_off" id="cut_off" name="option" class="form-select mb-1 mt-1 text-center">
                        @if (!empty($cutoffs) && $cutoffs->count() > 0)
    @foreach($cutoffs as $cut)
        <option value="{{ $cut->cutoff_id }}">
            {{ \Carbon\Carbon::parse($cut->date_start)->format('M d Y') }} - 
            {{ \Carbon\Carbon::parse($cut->date_end)->format('M d Y') }}
        </option>
    @endforeach
@else
    <option disabled>No cutoffs available</option>
@endif


                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary mb-1 mt-1 w-100">Get Time Log</button>
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
                                            <th>Date</th>
                                      
                                                <th>Employee</th>

                                                <th>Total Hours</th>
                                                <th>Total OT</th>
                                                <th>Rate</th>
                                                <th>Earned Salary</th>
                                                <th>Duty Start</th>
                                                <th>Time in</th>
                                                <th>Time out</th>
                                                <th>Status</th>
                                                <th>Breaktime remaining </th>

                                                <th>Duty status</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($attendance as $attendancer)
                                                                                           
                                        

                                            <tr>
                                            <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($attendancer->date)->format('D, M d Y') }}</td>

                                            
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->employee->first_name }} {{ $attendancer->employee->last_name }} </td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->total_hours ?? '0.00' }} </td>
                                               
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->total_ot ?? 'N/A'}}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->rate }}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ number_format($attendancer->total_hours * $attendancer->rate, 2) }}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') }}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') }}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ !empty($attendancer->time_out) ? \Carbon\Carbon::parse($attendancer->time_out)->format('h:i A') : '--:--' }} </td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->attendanceStatus->description }}</td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">   
                                               
                                               @php
                                               $totalTime = $attendancer->breaktimeLog()->first()->total_hours; 


   $timeParts = explode(":", $totalTime); 
   $totalSeconds = (isset($timeParts[0]) ? $timeParts[0] * 3600 : 0) + (isset($timeParts[1]) ? $timeParts[1] * 60 : 0) + (isset($timeParts[2]) ? $timeParts[2] : 0);
   
   
   if ($totalSeconds < 60) {
      
       $formattedTime = $totalSeconds . ' seconds ';
   } elseif ($totalSeconds < 3600) {
      
       $formattedTime = gmdate("i:s", $totalSeconds);
   } else {
      
       $formattedTime = gmdate("H:i:s", $totalSeconds);
   }
@endphp



@if ($attendancer->total_break > 3600)
@php
$totalTime = $attendancer->total_break - 3600;
   $totalSeconds = abs($totalTime); 

   if ($totalSeconds < 60) {
       $formattedTime = $totalSeconds . ' second' . ($totalSeconds === 1 ? '' : 's');
   } elseif ($totalSeconds < 3600) {
       $formattedTime = gmdate("i:s", $totalSeconds);
   } else {
       $formattedTime = gmdate("H:i:s", $totalSeconds);
   }
@endphp

- {{ $formattedTime }} over break ~ 
{{ \Carbon\Carbon::parse($attendancer->breaktimeLog()->first()->end_time)->format('h:i:s A') }}
@else
{{ $formattedTime }} ~ 
{{ optional($attendancer->breaktimeLog()->first())->end_time ? \Carbon\Carbon::parse(optional($attendancer->breaktimeLog()->first())->end_time)->format('h:i:s A') : 'Not started' }}




@endif

        </td>
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">@if(optional($attendancer->breaktimeLog->first())->field)
    On {{ optional($attendancer->breaktimeLog->first())->field }}
@else
    Not started
@endif

                                                </td>
                                               
                                                
                                                <td class="text-center">
                                               
                                                <a class="btn btn-outline-secondary btn-sm view"  data-bs-toggle="modal" data-bs-target=".emprecView" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                                                  
                            
                                                  <div class="dropdown d-inline">
                                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                   
                                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                                     <li><a class="dropdown-item"data-bs-toggle="modal" data-bs-target=".addOvertime{{ $attendancer->attendance_id }}">Add Overtime</a></li>
                                                     <li><a class="dropdown-item" href="#">Add Request Time Adjustment</a></li>
                                                     
                                                   </ul>
                                                 </div>
                                                </td>

                                                <div wire:ignore.self class="modal fade addOvertime{{ $attendancer->attendance_id }}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="transaction-detailModalLabel">Add <span class="text-success fw-bold">{{$attendancer->employee->last_name ?? ''}}  {{$attendancer->employee->first_name ?? ''}}</span> overtime ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to add this employee to Overtime?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="addOvertime({{ $attendancer->attendance_id }})" class="btn btn-primary fw-bold" data-bs-dismiss="modal">Add Overtime</button>
                <button type="button" class="btn text-white fw-bold bg-secondary "  data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
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




        @push('scripts')
@if (session('department-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Department</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
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
@push('scripts')
@if (session('overtime'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Overtime</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully!</span> ',
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

@push('scripts')
@if (session('updateDepartment'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Department</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Updated Successfully!</span> ',
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


