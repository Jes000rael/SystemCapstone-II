<div>
 
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
    top: 18%;
    right: 30px;
    transform: translateY(-50%);
    cursor: pointer;
}
.toggle-passwordnew {
    position: absolute;
    top: 41%;
    right: 30px;
    transform: translateY(-50%);
    cursor: pointer;
}
.toggle-passwordc {
    position: absolute;
    top: 64%;
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
<div wire:ignore.self class="modal fade changepass" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="Viewchangepass" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Viewchangepass">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form wire:submit.prevent="changepass">
                            <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Current Password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                                        <input wire:model="password" type="Password" class="form-control" id="passworded" placeholder="Enter Current Password">
                                                        <span id="togglePassword" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
        </span>
                                                    </div>

                                                          @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="newpassword" class="form-label">New password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('newpassword')border border-danger rounded-2 @enderror">
                                                        <input wire:model="newpassword" type="password" class="form-control" id="newpassworded" placeholder="Enter New password">
                                                        <span id="newpassworded1" class="toggle-passwordnew" onclick="togglePassword1()">
            <i class="fas fa-eye"></i>
        </span>
                                                    </div>

                                                          @error('newpassword') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('confirmpassword')border border-danger rounded-2 @enderror">
                                                        <input wire:model="confirmpassword" type="Password" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password">
                                                        <span id="confirmpassword2" class="toggle-passwordc" onclick="togglePassword2()">
            <i class="fas fa-eye"></i>
        </span>
                                                    </div>

                                                          @error('confirmpassword') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer mb-2">
                            <button type="submit" class="btn btn-primary ">Change Password</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                                 
                                

                            </form>


                                
                            </div>
                          
                        </div>
                    </div>
                </div>
</div>




@push('scripts')
<script>
    function togglePassword() {
    const passwordInput = document.getElementById('passworded');
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
<script>
    function togglePassword1() {
    const passwordInput = document.getElementById('newpassworded');
    const toggleIcon = document.getElementById('newpassworded1').querySelector('i');
    
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
<script>
    function togglePassword2() {
    const passwordInput = document.getElementById('confirmpassword');
    const toggleIcon = document.getElementById('confirmpassword2').querySelector('i');
    
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
