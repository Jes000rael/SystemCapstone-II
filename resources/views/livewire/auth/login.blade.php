
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
</style>

@endpush


<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <stong class="font-weight-bolder text-info text-gradient fs-3">Login Sourcerer</strong>
                            <!-- <p class="mb-0">{{ __('Create a new acount')}}<br></p>
                            <p class="mb-0">{{__('OR Sign in with these credentials:') }}</p>
                            <p class="mb-0">{{ __('username ') }}<b>{{ __('admin@softui.com') }}</b></p>
                            <p class="mb-0">{{ __('Password ') }}<b>{{ __('secret') }}</b></p> -->
                        </div>
                        <div class="card-body">
                            <form wire:submit="login" action="#" method="POST" role="form text-left">
                            @error('errors') <span class="text-danger error fw-bold" style="font-size: 14px;">{{ $message }}</span> @enderror
                                <div class="mb-3">
                                    <label for="username" class="fw-bold fs-6">{{ __('Username') }}</label>
                                    <div class="@error('username')border border-danger rounded-3 @enderror">
                                        <input style="height: 40px;" wire:model.live="username" id="username" type="text" class="form-control"
                                            placeholder="Username" aria-label="username" aria-describedby="username-addon">
                                    </div>
                                    @error('username') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="fw-bold fs-6">{{ __('Password') }}</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror  password-container">
                                        <input style="height: 40px;" wire:model.live="password" id="password" type="password" class="form-control"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                            <span id="togglePassword" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
        </span>
                                           
                                    </div>
                                    @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="text-center">
                                    <button  type="submit"
                                        class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <small class="text-muted">{{ __('Forgot you password? Reset you password') }} <a
                            wire:navigate  href="{{ route('forgot-password') }}"
                                    class="text-info text-gradient font-weight-bold">{{ __('here') }}</a></small>
                            <p class="mb-4 text-sm mx-auto">
                                {{ __(' Don\'t have an account?') }}
                                <a wire:navigate  href="{{ route('sign-up') }}"
                                    class="text-info text-gradient font-weight-bold">{{ __('Sign up') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
