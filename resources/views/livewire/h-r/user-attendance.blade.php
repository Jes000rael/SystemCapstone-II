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
                                    <button href="#" class="btn btn-primary mt-2 mb-2">Show Salary Summary</button>
                                    <button href="#" class="btn btn-warning mt-2 mb-2">Request Leave</button>

                                    <p class="fs-2 mt-3">Remaining Break Time : <span class="text-success"> 59:59</span></p>  
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
                                                <th>Total Break</th>
                                            
                                                <th>Rate</th>
                                                <th>Earned Salary</th>
                                               
                                              
                                                <th>Status</th>
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
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->total_break }}</td>
                                               
                                                <td data-value="{{ $attendancer->rate }}" class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">****</td>
                                                <td data-value="{{ number_format($attendancer->total_hours * $attendancer->rate, 2) }}" class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">****</td>
                                                
         
                                                <td class="text-center {{ \Carbon\Carbon::parse($attendancer->duty_start)->format('h:i A') < \Carbon\Carbon::parse($attendancer->time_in)->format('h:i A') ? 'text-danger' : '' }}">{{ $attendancer->attendanceStatus->description }}</td>
                                                <td>
                                                @if($attendancer->attendance_id == $latest->attendance_id)
                                                       <div class="text-center" style="max-width: 80%; margin: 0 auto;">
                                                           <button type="submit" class="btn btn-success w-100">{{ $breakbutton }}</button>
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
    const isHidden = rows[0].querySelector('td:nth-child(6)').textContent === '****'; 

    rows.forEach(row => {
        
        const priceCell = row.querySelector('td:nth-child(6)'); 
        const quantityCell = row.querySelector('td:nth-child(7)'); 

     
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