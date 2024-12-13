
@push('styles')
<style>
    .password-container {
    position: relative;
    
}

input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 10px;
    padding-right: 40px; /* Space for the icon */
    box-sizing: border-box;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



.background-image {
    background-image: url('https://preview.redd.it/snow-capped-4k-3840x2160-by-a-i-v0-npeh96ogvkea1.jpg?width=1080&crop=smart&auto=webp&s=a29fc17ba5671e1788319a763ed492f1c2afa2cf'); /* Replace with your image URL */
    background-size: cover; /* Cover the entire div */
    background-position: center; /* Center the image */
    height: 100vh; /* Full height of the viewport */
    width: 100%; /* Full width */
    display: flex; /* Center content */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
  
    
}


.transparent-card {
        background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
        border: none; /* Remove default border */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow */
        backdrop-filter: blur(5px); /* Optional: Apply a blur effect to the background */
    }

    .card-body {
        color: #000; /* Set text color for better visibility */
    }
</style>


@endpush

<div class="background-image">
       <div class="account-pages  pt-sm-4 ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-12 col-lg-12 col-xl-12 ">
                        <div class="card overflow-hidden transparent-card ">
                        <div>
    <div class="row">
        <!-- Full-width column with minimum width -->
        <div style="color:#000; min-width: 500px;" class="col-lg-12 text-center py-3 px-5 fw-bold">
            <h1 class="fw-bold ">{{ $companyName }}</h1>
            <div id="real-time-clock">
                <span id="current-time" class="fs-3"></span>
            </div>
        </div>
    </div>
</div>

                            @php
                                            $timezone = config('app.timezone') ?? 'UTC';
                                            $currentTimestamp = \Carbon\Carbon::now($timezone)->timestamp;
                                        @endphp

                                        

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
                            <div class="card-body pt-0"> 
                                
                                  
                              
                                
                                      
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session()->has('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
                                <div class="p-2">
                                    <form wire:submit.prevent="empAttendance"  role="form text-left">
                                    @error('errors') <span class="text-danger error fw-bold" style="font-size: 14px;">{{ $message }}</span> @enderror
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Employee ID</label>
                                            <div class=" @error('errors')border border-danger rounded-3 @enderror @error('employee_id')border border-danger rounded-3 @enderror">
                                            <input  wire:model.live="employee_id" id="employee_id" type="text" class="form-control bg-white border-white "  style="color:#000;" placeholder="Enter employee_id">
                                        </div>
                                        @error('employee_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                       
                                        
                                        <div class="mt-3 d-grid ">
                                            <button class="btn btn-primary waves-effect waves-light rounded-pill" type="submit">IN/OUT</button>
                                        </div>

                                     
                                        <div class="mt-3 text-center">
                            
                            
                                
                                <p wire:ignore>©{{ now()->year }} Design & Develop <i class="mdi mdi-heart text-danger"></i> by Enopoly Team </p>
                           
                        </div>
                       
            
                                        
                                    </form>
                                </div>
            
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
</div>




