
<div id="layout-wrapper">
    
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">ADMIN</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                   
                            <li class="breadcrumb-item active">Payslip</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4 fs-5">Payslip for : {{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix }} </h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif


    <div class="col-12">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8"> 
                <div class="mb-1"> 
                    <div class="align-items-center d-flex justify-content-center">
                        <select wire:model="cut_off" id="cut_off" class="form-select mb-1 mt-1 text-center">
                            @if($cutoffs->isEmpty())
                                <option class="text-white" disabled selected>No cutoffs found</option>
                            @else
                                @foreach($cutoffs as $cut)
                                    <option value="{{ $cut->cutoff_id }}">
                                        {{ \Carbon\Carbon::parse($cut->date_start)->format('M d, Y') }} - 
                                        {{ \Carbon\Carbon::parse($cut->date_end)->format('M d, Y') }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>

            <div class="col-2"></div>
            <div class="col-8"> 
                <div class="align-items-center d-flex justify-content-center">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input me-1 "> Add Deductions
                    </label>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div class="mb-3">
        <div class="align-items-center d-flex justify-content-center">
        
      
<a  class="btn btn-primary w-sm mt-3 me-2">
    <i class="bx bx-receipt me-1"></i>
    Add Payslip
</a>

       
        </div>
    </div>


                                   
                        
                               
                        
                        

                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-4"></div>
        </div>
        <!-- end row -->

        
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>


