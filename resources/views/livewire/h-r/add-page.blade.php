
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

.toggle-passwordp {
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
                                            <input type="password" step="any" wire:model.live="password"  id="passwordedp" class="form-control"  placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <span id="togglePasswordp" class="toggle-passwordp" onclick="togglePasswordp()">
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
