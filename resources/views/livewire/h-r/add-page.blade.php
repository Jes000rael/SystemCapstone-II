
@push('styles')
<style>
    .password-container {
    position: relative;
    
}


.toggle-passwordp {
    position: absolute;
    top: 53%;
    right: 1rem;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
    z-index: 10;
    /* font-size: 1.0rem; */
    padding: 0.25rem;
}

/* Optional: Adjust spacing slightly for smaller screens */
@media (max-width: 992px) {
    .toggle-passwordp {
        right: 0.75rem;
        font-size: 1rem;
    }
}

@media (max-width: 768px) {
    .toggle-passwordp {
        right: 0.6rem;
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .toggle-passwordp {
        right: 0.5rem;
        font-size: 0.95rem;
    }
}

@media (max-width: 375px) {
    .toggle-passwordp {
        right: 0.4rem;
        font-size: 0.9rem;
    }
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

<div class="position-relative @error('password') border border-danger rounded-2 @enderror">
    <input 
        type="password" 
        wire:model.live="password" 
        id="passwordedp" 
        class="form-control pe-5" 
        placeholder="Enter password" 
        aria-label="Password"
    >

    <span id="togglePasswordp" class="toggle-passwordp" onclick="togglePasswordp()">
        <i class="fas fa-eye" id="eyeIcon"></i>
    </span>
</div>

@error('password') 
    <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
@enderror
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
    function togglePasswordp() {
    const passwordInput = document.getElementById('passwordedp');
    const toggleIcon = document.getElementById('togglePasswordp').querySelector('i');
    
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
