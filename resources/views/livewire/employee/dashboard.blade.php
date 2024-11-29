



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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
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
                                                    <h5 class="text-primary">Hello  Employee</h5>
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
                                                <span class="avatar-title rounded-circle bg-primary fs-5 fw-bold">
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
                                        <ul class="verti-timeline list-unstyled">
                                        @foreach( $announce as $newTop => $ment)
                                        <li class="event-list {{ $newTop == 0 ? 'active' : '' }}">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bxs-right-arrow-circle  {{ $newTop == 0 ? 'bx-fade-right fs-4' : '' }}"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <h5 class="font-size-14">{{ date('M d Y', strtotime($ment->date)) }} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                        <p style="font-size:12px;">{{ strlen($ment->description) > 50 ? substr($ment->description, 0, 50) . '...' : $ment->description }} <a href="javascript: void(0);">Read more</a></p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                           
                                           
                                        </ul>
                                        <div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            
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
@if (session('success'))
    <script>
        Swal.fire({
          title: '<span style="color:#000;" class="text-center">Login  <span>Successfully</span></span> ',
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


