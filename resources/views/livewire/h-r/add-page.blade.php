
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
    top: 44%;
    right: 30px;
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


</style>


@endpush


<div class="col-md-4">
@if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
                                    <form wire:submit.prevent="create_Page">
                                    
                                   

                                        <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('username')border border-danger rounded-2 @enderror">
                                            <input type="text" wire:model="username"  id="username" class="form-control" placeholder="Enter username" >
                                        </div>

                                            @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                            <input type="password" step="any" wire:model.live="password"  id="password" class="form-control"  placeholder="Enter password">
                                            <span id="togglePassword" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
        </span>
                                        </div>

                                            @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
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
