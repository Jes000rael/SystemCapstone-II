



<div id="layout-wrapper">
            <div class="main-content">

                <div class="page-content">
            
                    <div class="container-fluid">
                    <div class="row">
                 <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
                        
              
                    

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Hello  Admin</h5>
                                                    <p> {{ $company->description }} Dashboard</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="avatar-md profile-user-wid mb-4 img-thumbnail rounded-circle">
                                                <span class="avatar-title rounded-circle bg-primary fs-5 fw-bold" >
                  {{  strtoupper(substr($firstname->first_name, 0, 1)) }}
                  
             </span>
                                                </div>
                                                
                                                
                                                <h5 class="font-size-15 ">{{ $lastname }}  {{ $firstname->first_name }}</h5>
                                                <p class="text-muted mb-0 text-truncate">{{ $job->description }}</p>

                                                @php
  
    $timezone = config('app.timezone') ?? 'UTC';

    $currentTimestamp = \Carbon\Carbon::now($timezone)->timestamp;
@endphp

<div id="real-time-clock">
     <span id="current-time"></span>
</div>

<script>
   
    const timezone = @json($timezone);
    const serverTimestamp = @json($currentTimestamp); 


    const clientTimestamp = Math.floor(Date.now() / 1000); 
    const timeOffset = serverTimestamp - clientTimestamp; 


    let currentTime = new Date((clientTimestamp + timeOffset) * 1000); 

 
    function updateTime() {
    
        currentTime.setSeconds(currentTime.getSeconds() + 1);

   
        const formattedTime = new Intl.DateTimeFormat('en-US', {
            timeZone: timezone,
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true 
        }).format(currentTime);


        document.getElementById('current-time').textContent = formattedTime;
    }

    setInterval(updateTime, 1000);

   
    updateTime();
</script>


                                                
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="card">

                                 <div class="card-body">
                                    <h4 class="card-title mb-5">Management Announcement</h4>
                                    <div class="scrollable-div" style="max-height: 300px; overflow-y: auto;">
                                        <ul class="verti-timeline list-unstyled">
                                            @foreach($announce as $newTop => $ment)
                                            <li class="event-list {{ $newTop == 0 ? 'active' : '' }}">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bxs-right-arrow-circle  {{ $newTop == 0 ? 'bx-fade-right fs-4' : '' }}"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <h5 class="font-size-14">
                                                            {{ date('M d Y', strtotime($ment->date)) }}
                                                            <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                        </h5>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <p style="font-size:12px;">
                                                                {{ strlen($ment->description) > 35 ? substr($ment->description, 0, 35) . '...' : $ment->description }}
                                                                <a href="javascript: void(0);">Read more</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">
                                            View More <i class="mdi mdi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                 </div>
                             </div>
                             <style>
                                 .scrollable-div {
                                 max-height: 300px;
                                 overflow-y: auto;
                             }

                             </style>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">{{ $companyName}}</p>
                                                        <h4 class="mb-0">{{ $employeeCount }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-buildings font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">{{ $companyName}} HR</p>
                                                        <h4 class="mb-0">{{ $employeeCountHR }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-id-card font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">     Employee</p>
                                                        <h4 class="mb-0">{{ $employeeCountemp }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-user font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Employee Absent</p>
                                                        <h4 class="mb-0">{{ $employeeAbsent }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-user font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Attendance Chart</h4>
                                        
                                        <div  id="column_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger"]' class="apex-charts text-black" dir="ltr"></div>                                      
                                    </div>
                                </div><!--end card-->
                            </div>
                                    
                                </div>
                                <!-- end row -->

                                <!-- <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Email Sent</h4>
                                            <div class="ms-auto">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#">Year</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div id="stacked-column-chart" class="apex-charts" data-colors='["--bs-primary", "--bs-warning", "--bs-success"]' dir="ltr"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end row -->

                        
                           

                            
                        <!-- end row -->

                       
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
             

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

  

        

       
  







@push('scripts')

<script>
    var cutoffDates = @json($cutoffs->map(function($cut) {
        return \Carbon\Carbon::parse($cut->cutoff->date_start)->format('M d, Y') . ' - ' . \Carbon\Carbon::parse($cut->cutoff->date_end)->format('M d, Y');
    }));
    var netPay = @json($cutoffs->map(function($cut) {
        return $cut->total_pay;
    }));
    var tOvert = @json($cutoffs->map(function($cut) {
        return $cut->ot_rendered;
    }));
    var thours = @json($cutoffs->map(function($cut) {
        return $cut->hours_rendered;
    }));
    var tdeducs = @json($cutoffs->map(function($cut) {
        return $cut->total_deduction;
    }));
</script>



<script>
// column chart
var columnChartColors = getChartColorsArray("column_chart");
if (columnChartColors) {
    var options = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Total Net Pay',
            data: netPay
        },
        {
            name: 'Total Deduction',
            data: tdeducs,
            color: '#FF4500'

        }, {
            name: 'Total Hours',
            data: thours,
            color: '#4169E1'

        }, {
            name: 'Total Overtime',
            data: tOvert,
            color: '#FFAE42'
        }],
        
        colors: columnChartColors,
        xaxis: {
            categories: cutoffDates
        },
        yaxis: {
            title: {
                
                style: {
                    fontWeight: '500',
                },
            }
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return parseFloat(val).toLocaleString(undefined, { minimumFractionDigits: 2 });
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#column_chart"),
        options
    );

    chart.render();
}
</script>
@if (session('success'))
    <script>
        Swal.fire({
          title: '<span style="color:#000;" class="text-center fs-6 fw-bold">Login  <span>Successfully</span></span> ',
          icon:'success', 
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true, 
            width: '280px', 
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


