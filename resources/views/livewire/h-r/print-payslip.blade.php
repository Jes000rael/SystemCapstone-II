<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">ADMIN</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Payslip</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payslip Card -->
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">

                                @if (session()->has('error'))
                                    <div class="alert alert-danger text-center fw-bold py-1">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="container mt-4 mb-4">
                                    <!-- Header -->
                                    <div class="row payslip-header">
                                        <div class="col-12 text-center">
                                            <span class="h3">
                                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                </svg>
                                            </span>
                                            <span class="h3 ml-2 payslip-title uppercase">{{ $company_id }}</span>
                                            <p class="text-uppercase mb-0">PAYSLIP</p>
                                            <p class="text-muted">{{ $cutoffdate }}</p>
                                        </div>
                                    </div>

                                    <!-- Employee Info -->
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <h5 class="section-header">Employee Details:</h5>
                                            <div class="row info-row">
                                                <div class="col-sm-4 detail-label">Employee Name</div>
                                                <div class="col-sm-8">{{ $first_name }}  {{ $middle_name }} {{  $last_name }} {{ $suffix }}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-4 detail-label">Employee ID</div>
                                                <div class="col-sm-8">{{ $employee_id }}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-4 detail-label">Email Address</div>
                                                <div class="col-sm-8">{{ $email }}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-4 detail-label">Contact No.</div>
                                                <div class="col-sm-8">{{ $contact_number }}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-4 detail-label">Rate per Hour</div>
                                                <div class="col-sm-8">{{ $hourly_rate }}.00</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="section-header text-md-right net-pay">Net Pay: {{ number_format($ratetoCutoff, 2) }}</h5>
                                            

                                            <div class="row info-row mt-3">
                                                <div class="col-sm-6 detail-label">Department</div>
                                                <div class="col-sm-6">{{ $department_id}}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-6 detail-label">Job Title</div>
                                                <div class="col-sm-6">{{ $job_title_id}}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-6 detail-label">Duty Time</div>
                                                <div class="col-sm-6">{{ $shift_id}}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-6 detail-label">Location</div>
                                                <div class="col-sm-6">{{$address}}</div>
                                            </div>
                                            <div class="row info-row">
                                                <div class="col-sm-6 detail-label">Cutoff rate to Php</div>
                                                <div class="col-sm-6">{{ $conversion_rate }}.00</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Salary Details -->
                                    <div class="divider"></div>

                                    <h5 class="section-header">Salary Details:</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="font-weight-bold mb-2">EARNINGS</h6>
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr><td>Total Absent Days</td><td class="text-right">{{ number_format($absentemp) }} days</td></tr>
                                                    <tr><td>Total Regular Hours</td><td class="text-right">{{ number_format($totalHours, 2) }} hrs</td></tr>
                                                    <tr><td>Total Overtime Hours</td><td class="text-right">{{ number_format($totalOvertime, 2) }} hrs</td></tr>
                                                    <tr><td>Total OverBreak Hours</td><td class="text-right">{{ number_format($overBreak, 2) }} hrs</td></tr>
                                                    <tr><td>Total CoverUp Hours</td><td class="text-right">{{ number_format($coverup, 2) }} hrs</td></tr>
                                                    <tr><td>Total Leave Hours</td><td class="text-right">{{ number_format($onLeave, 2) }} hrs</td></tr>
                                                    <tr><td>Total Night Diff Hours</td><td class="text-right">{{ number_format($totalnigtdiffhours, 2) }} hrs</td></tr>
                                                    <tr><td>Total Paid Hours</td><td class="text-right">{{ number_format($totalearned, 2) }} hrs</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="font-weight-bold mb-2">DEDUCTIONS</h6>
                                            <table class="table table-sm">
                                                <tbody>
                                                    @foreach($deductions as $deduct)
                                                    <tr><td>{{ $deduct->description }}</td><td class="text-right">      @if($addDeductions) 
                                {{ number_format($deduct->value, 2) }} 
                            @else
                                0.00 
                            @endif</td></tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <!-- Totals -->
                                    <div class="row">
                                        <div class="col-md-6 font-weight-bold">Total Basic Salary: {{ number_format($totalSalary, 2) }}</div>
                                        <div class="col-md-6 font-weight-bold">Total Deductions:@if($addDeductions) 
                                        {{ number_format($totalDeductions, 2) }} 
                            @else
                                0.00 
                            @endif </div>
                                    </div>
                                    <div class="foot text-center mt-5">
                <p>This is a system generated payslip
                    <br>Design & Develop by Enopoly Team
                </p>
                <div class="no-print mb-4">
    <a href="/admin/employee_records" class="btn btn-danger float-end ms-2" onclick="window.close()">Close</a>
   <button onclick="window.print()" class="btn btn-primary float-end"  type="submit" wire:click="printemp">Print</button>

</div>
                
            </div>
                                    
                                </div>

                                @push('styles')
                                <style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

                                    <style>
                                        body { font-family: Arial, sans-serif; font-size: 14px; }
                                        .payslip-header { text-align: center; margin-bottom: 20px; }
                                        .payslip-title { font-weight: bold; color: #e91e63; letter-spacing: 1px; }
                                        .section-header { border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 15px; font-weight: bold; }
                                        .info-row { margin-bottom: 8px; }
                                        .detail-label { font-weight: bold; }
                                        .divider { height: 1px; background-color: #ddd; margin: 20px 0; }
                                        .table th, .table td { padding: 0.5rem; }
                                        @media (max-width: 767px) {
                                            .net-pay { text-align: left !important; margin-top: 15px; }
                                        }.foot{
                                        font-size:12px;
                                        color:#666;
                                        }
                                        .payslip-title {
    text-transform: uppercase;
}
                                    </style>
                                @endpush

                            </div> 
                        </div> <!-- card -->
                    </div>
                    <div class="col-1"></div>
                </div> <!-- end row -->
               

            </div>
        </div>
    </div>
</div>
