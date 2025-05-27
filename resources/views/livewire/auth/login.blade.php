
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
                    <div class="col-md-8 col-lg-6 col-xl-5 ">
                        <div class="card overflow-hidden transparent-card ">
                            <div >
                                <div class="row">
                                    <!-- <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to Skote.</p>
                                        </div>
                                    </div> -->
                                    <div   class="col-12 align-self-end py-4 px-4">
                                        <img style="padding-right:100px; padding-left:100px; width: 100%; height:100%;"  src="https://mail.google.com/mail/u/0?ui=2&ik=a61d3155ad&attid=0.1&permmsgid=msg-f:1833182658637704216&th=1970c5ea5881ac18&view=fimg&fur=ip&permmsgid=msg-f:1833182658637704216&sz=s0-l75-ft&attbid=ANGjdJ-bINkamPwQRTe_722oP_GLUxZJo5dSpu46kjW48Nct6NPV37YPPfqEQWvt-j-7S6QhAinshjWP2RXnUV-Ge_CUYRizCXwmDG1g1-z96AjS3PDAn2V5fHtxqj8&disp=emb&realattid=ii_1970c5e4dab1c488f1a1&zw" alt="" class="img-fluid" >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                               
                                <div class="p-2">
                                    <form wire:submit.prevent="login"  role="form text-left">
                                   <div class="col-12 text-center mb-2">
                                   @error('errors') <span style="color:rgb(230, 12, 30); font-size: 15px;" class=" error fw-bold">{{ $message }}</span> @enderror
                                   </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <div class=" @error('errors')border border-danger rounded-3 @enderror @error('username')border border-danger rounded-3 @enderror">
                                            <input  wire:model.live="username" id="username" type="text" class="form-control bg-white border-white "  style="color:#000;" placeholder="Enter username">
                                        </div>
                                        @error('username') <span style="color:rgb(230, 12, 30);" class=" error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="@error('errors')border border-danger rounded-3 @enderror @error('password')border border-danger rounded-3 @enderror  password-container">
                                                <input wire:model.live="password" id="password" type="password" class="form-control bg-white border-white"  style="color:#000;" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <span id="togglePassword" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
        </span>
                                            </div>
                                            @error('password') <span style="color:rgb(230, 12, 30);" class=" error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                       
                                        
                                        <div class="mt-3 d-grid ">
                                            <button class="btn btn-primary waves-effect waves-light rounded-pill" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a wire:navigate href="{{ route('forgot-Password')}}" class="  text-dark"><i class="mdi mdi-lock me-1"></i> <span >Forgot your password?</span></a>
                                        </div>
                                        <div class="mt-3 text-center">
                            
                            
                                
                                <p wire:ignore>©{{ now()->year }} Design & Develop  by Rentify.web Team </p>
                           
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

@push('scripts')
<script>
    function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword').querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

</script>
@endpush

