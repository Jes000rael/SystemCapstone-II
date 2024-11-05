
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
                                    <div class="col-12 align-self-end py-3 px-5">
                                        <img  src="https://cdn.shopify.com/s/files/1/0636/4479/5108/files/Prime_Retail_fall_logo.png?v=1727795811" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                               
                                <div class="p-2">
                                    <form wire:submit="login" action="#" method="POST" role="form text-left">
                                    @error('errors') <span class="text-danger error fw-bold" style="font-size: 14px;">{{ $message }}</span> @enderror
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <div class=" @error('errors')border border-danger rounded-3 @enderror @error('username')border border-danger rounded-3 @enderror">
                                            <input  wire:model.live="username" id="username" type="text" class="form-control bg-white border-white "  style="color:#000;" placeholder="Enter username">
                                        </div>
                                        @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="@error('errors')border border-danger rounded-3 @enderror @error('password')border border-danger rounded-3 @enderror  password-container">
                                                <input wire:model.live="password" id="password" type="password" class="form-control bg-white border-white"  style="color:#000;" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <span id="togglePassword" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
        </span>
                                            </div>
                                            @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                       
                                        
                                        <div class="mt-3 d-grid ">
                                            <button class="btn btn-primary waves-effect waves-light rounded-pill" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-5 text-center">
                            
                            
                                
                                <p>© <script>document.write(new Date().getFullYear());</script> Design & Develop <i class="mdi mdi-heart text-danger"></i> by Enopoly Team </p>
                           
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

