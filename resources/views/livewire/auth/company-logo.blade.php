<div>
<a class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://app.enopolyautomation.com/assets/images/logo.png" alt="" height="22">
                    </span>
                    @if($logos)
                    <span class="logo-lg">
                        <img src="{{ $logos }}" alt="Company Logo" class="company-logo" height="22" width="100">
                    </span>
                    @endif

                    @if($logos2)
                    <span class="logo-lg">
                        <img src="{{ asset('storage/' . $logos2) }}" alt="Company Logo" class="company-logo" height="22" width="100">
                    </span>
                    @endif

                </a>

                <a class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://app.enopolyautomation.com/assets/images/logo.png" alt="" height="22" >
                    </span>
                    @if($logos)
                    <span class="logo-lg">
                        <img src="{{ $logos }}" alt="Company Logo" class="company-logo" height="22" width="100">
                    </span>
                    @endif

                    @if($logos2)
                    <span class="logo-lg">
                        <img src="{{ asset('storage/' . $logos2) }}" alt="Company Logo" class="company-logo" height="30" width="150">
                    </span>
                    @endif
</div>
