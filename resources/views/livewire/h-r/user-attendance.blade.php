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
                                     <!-- {{ $newTotalTime ? $newTotalTime->format('H:i:s') : '00:00:00' }} -->
                                    <button href="#" class="btn btn-primary mt-2 mb-2">Show Salary Summary</button>
                                    <button href="#" class="btn btn-warning mt-2 mb-2">Request Leave</button>


                                    <p class="fs-2 mt-3">Remaining Break Time: 
    <span class="text-success fs-1" id="break-time">

    @if($breaktime && $breaktime->field == 'Duty')
    {{ $this->formattedBreakTime }}
@else

@php
   
    $remainingTimeString = $newTotalTime ? $newTotalTime->format('H:i:s') : '00:59:59';

    
    $timeParts = explode(':', $remainingTimeString);

    if (count($timeParts) === 3) {
     
        [$hours, $minutes, $seconds] = $timeParts;
    } else {
       
        $hours = 0;
        [$minutes, $seconds] = $timeParts;
    }

   
    $remainingTimeInSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

    
    if ($remainingTimeInSeconds < 60) {
        $formattedTime = "$remainingTimeInSeconds seconds ";
    } elseif ($remainingTimeInSeconds < 3600) {
        $minutes = floor($remainingTimeInSeconds / 60);
        $seconds = $remainingTimeInSeconds % 60;
        $formattedTime = sprintf('%02d:%02d', $minutes, $seconds);
    } else {
        $hours = floor($remainingTimeInSeconds / 3600);
        $minutes = floor(($remainingTimeInSeconds % 3600) / 60);
        $seconds = $remainingTimeInSeconds % 60;
        $formattedTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
@endphp

{{ $formattedTime }}

@endif
    </span>
</p>








    


                                </div>

                                <!-- Form and Select Input with Button -->
                                <div class="col-md-12">
                                
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
        <div class="col-md-2">
            <form wire:submit.prevent="cutoffselect">
             
                        <select wire:model="cut_off" id="cut_off" name="option" class="form-select mb-1 mt-1 text-center">
                        @foreach($cutoffs as $cut)
    <option value="{{ $cut->cutoff_id }}">
    {{ \Carbon\Carbon::parse($cut->date_start)->format('M d Y') }} - {{ \Carbon\Carbon::parse($cut->date_end)->format('M d Y') }}
    </option>
@endforeach


                        </select>
                                                    </div>
                                                    <div class="col-md-3">
 

                                                        <button type="submit" class="btn btn-primary mb-1 mt-1 w-50 ">Get Time Log</button>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-7"></div>
                                        <div class="col-md-9"></div>
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

                                <h4 class="card-title fs-5 mb-4">My Attendance <button id="toggleVisibility" class="btn btn-primary float-end"><i class="fas fa-eye me-1"></i> Show Rate</button></h4>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="yut" class="table table-bordered dt-responsive all-users-datatable_length nowrap w-100">
                                            <thead>
                                            <tr>
                                            <th>Date</th>
                                            <th>Time in</th>
                                            <th>Time out</th>
                                                <th>Total Hours</th>
                                            
                                                <th>Rate</th>
                                                <th>Earned Salary</th>
                                               
                                              
                                                <th>Status</th>
                                                <th> Break Time(Remaining Mins ~ LBT)</th>

                                                <th>Action</th>
                                               
                                           
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($attendance as $attendancer)
                                                
                                            <tr>
                                            <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($attendancer->date)->format('D, M d Y') }}</td>
                                            <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') }}</td>
                                            <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ !empty($attendancer->time_out) ? \Carbon\Carbon::parse($attendancer->time_out)->format('h:i A') : '--:--' }} </td>
                                               
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->total_hours ?? '0.00' }}</td>
                                               
                                               
                                                <td data-value="{{ $attendancer->rate }}" class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">****</td>
                                                <td data-value="{{ number_format($attendancer->total_hours * $attendancer->rate, 2) }}" class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">****</td>
                                                
         
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
    {{ \Carbon\Carbon::parse($attendancer->breaktimeLog()->first()->end_time)->format('h:i:s A') }}
@endif


</td>
                                                <td>
                                                @if($attendancer->attendance_id == $latest->attendance_id)

                                                       <div class="text-center" style="max-width: 80%; margin: 0 auto;">
  





                                                       @if ($attendancer->breaktimeLog()->first()?->total_hours !== '00:00:00')
    <button 
        wire:click="resumeBreak" 
        id="resume-break-btn" 
        class="btn {{ $breaktime && $breaktime->field == null ? 'btn-primary' : 'btn-success' }}" 
        style="
            {{ $breaktime && $breaktime->field == null ? 'display: inline-block;' : 'display: none;' }}
        ">
        {{ $breaktime && $breaktime->field == null ? 'Start Break' : 'Resume Break' }} 
    </button>

    <button 
        wire:click="pauseBreak" 
        id="pause-break-btn" 
        class="btn btn-warning" 
        style="display: inline-block;">
        Pause Break
    </button>
@endif





<script>
    let breakTime = "{{ $newTotalTime ? $newTotalTime->format('H:i:s') : '59:59' }}"; 
    let [hours, minutes, seconds] = breakTime.split(":").map(Number); 
    let breakTimeInSeconds = (hours * 3600) + (minutes * 60) + seconds; 

    let allowedBreakTimeInSeconds = 3600; 
    let excessBreakTime = 0;

    let countdownInterval;

  
    function formatTime(seconds) {
        let isNegative = seconds < 0;
        if (isNegative) {
            seconds = Math.abs(seconds); 
        }

        if (seconds < 60) {
            return `${isNegative ? '-' : ''}${seconds} second${seconds > 1 ? 's' : ''} ${isNegative ? 'over break' : ''}`;
        } else if (seconds < 3600) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;
            return `${isNegative ? '-' : ''}${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')} ${isNegative ? 'over break' : ''}`;
        } else {
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const remainingSeconds = seconds % 60;
            return `${isNegative ? '-' : ''}${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')} ${isNegative ? 'over break' : ''}`;
        }
    }

    function updateCountdown() {
        if (breakTimeInSeconds > 0) {
            breakTimeInSeconds--; 
            document.getElementById('break-time').innerText = formatTime(breakTimeInSeconds);
        } else {
            // Count negative time (over break)
            excessBreakTime--; 
            document.getElementById('break-time').innerText = formatTime(excessBreakTime);
        }
    }

    function pauseBreak() {
        localStorage.setItem("breakStatus", "paused"); 
        clearInterval(countdownInterval); 
        document.getElementById("pause-break-btn").style.display = "none"; 
        document.getElementById("resume-break-btn").style.display = "inline-block"; 
    }

    function resumeBreak() {
        localStorage.setItem("breakStatus", "started"); 
        countdownInterval = setInterval(updateCountdown, 1000); 
        document.getElementById("resume-break-btn").style.display = "none"; 
        document.getElementById("pause-break-btn").style.display = "inline-block"; 
    }

    window.onload = function () {
        const breakStatus = localStorage.getItem("breakStatus");

        if (breakStatus === "started") {
            document.getElementById("pause-break-btn").style.display = "inline-block"; 
            document.getElementById("resume-break-btn").style.display = "none"; 
            countdownInterval = setInterval(updateCountdown, 1000); 
        } else if (breakStatus === "paused") {
            document.getElementById("pause-break-btn").style.display = "none"; 
            document.getElementById("resume-break-btn").style.display = "inline-block"; 
        } else {
            document.getElementById("pause-break-btn").style.display = "none"; 
            document.getElementById("resume-break-btn").style.display = "none"; 
        }
    };

    document.getElementById("pause-break-btn")?.addEventListener("click", pauseBreak);
    document.getElementById("resume-break-btn")?.addEventListener("click", resumeBreak);
</script>





                                                       </div>
                                                   @endif

                                             </td>
                                                    
                                                </tr>
                                                @endforeach
                                                
                                                
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
@push('scripts')
<script>
      document.getElementById('toggleVisibility').addEventListener('click', function () {

    const rows = document.querySelectorAll('#yut tbody tr');
    const isHidden = rows[0].querySelector('td:nth-child(5)').textContent === '****'; 

    rows.forEach(row => {
        
        const priceCell = row.querySelector('td:nth-child(5)'); 
        const quantityCell = row.querySelector('td:nth-child(6)'); 

     
        const priceActualValue = priceCell.getAttribute('data-value');
        const quantityActualValue = quantityCell.getAttribute('data-value');
        
       
        if (isHidden) {
            priceCell.textContent = priceActualValue; 
            quantityCell.textContent = quantityActualValue; 
        } else {
            priceCell.textContent = '****'; 
            quantityCell.textContent = '****'; 
        }
    });

   
    const buttonText = isHidden ? 'Hide Rate' : 'Show Rate';
    const buttonIcon = isHidden ? 'fa-eye-slash' : 'fa-eye';
    document.getElementById('toggleVisibility').innerHTML = `<i class="fas ${buttonIcon} me-1"></i> ${buttonText}`;
});

    </script>

@endpush