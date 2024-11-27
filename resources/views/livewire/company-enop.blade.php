<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Title and Breadcrumbs -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile and User Info -->
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Hello Company!</h5>
                                            <p>{{ $company->description }} Dashboard</p>
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
                                            <strong class="avatar-title rounded-circle bg-primary fs-5">
                                                {{ strtoupper(substr($firstname->first_name, 0, 1)) }}
                                            </strong>
                                        </div>
                                        <h5 class="font-size-15">{{ $lastname }} {{ $firstname->first_name }}</h5>
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
                    </div>

                    <!-- Company Statistics -->
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Companies</p>
                                                <h4 class="mb-0">{{ $companyCount }}</h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-buildings font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($companies as $company)
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">{{ $company->description }}</p>
                                                    <h4 class="mb-0">{{ $company->employees_count }}</h4>
                                                </div>
                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@if (session('success'))
    <script>
        Swal.fire({
            title: '<span style="color:#000;" class="text-center">Login <span>Successfully</span></span>',
            icon: 'success',
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
