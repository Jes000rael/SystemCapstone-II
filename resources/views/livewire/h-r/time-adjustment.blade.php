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
                                            <li class="breadcrumb-item active">Time Adjsutment</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                         
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                  
        
                                        <h4 class="card-title fs-5 mb-4">Add Announcement</h4>
                                        <div class="col-md-12">
                                            <div class="row">
                                              
                                                <div class="col-md-12">
                                                    
                                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                                       
                                                            <thead>
                                                            <tr>
                                                                <th>Employee</th>
                                                                <th>Request Type</th>
                                                                <th>Date for Cover up</th>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                <th>Total Hours</th>
                                                                <th>Reason</th>
                                                            
                                                            </tr>
                                                            </thead>
                        
                        
                                                            <tbody>
                                                            
                                                           @foreach($adjusttype as $type)
                                                           
                
                                                            <tr>
                                                            <td class="text-truncate" style="max-width:200px;"> {{ $type->attendance->employee->first_name }} {{ $type->attendance->employee->last_name }}</</td>

                                               

                                                                <td class="text-truncate" style="max-width:200px;"> {{ $type->requestTimetype->description }}</td>
                                                                <td> {{ \Carbon\Carbon::parse($type->attendance->date)->format('D, M d Y') }}</td>
                                                                <td> {{ \Carbon\Carbon::parse($type->start_timee)->format('D, M d Y - h:i A') }}</td> 
                                                                <td> {{ \Carbon\Carbon::parse($type->end_time)->format('D, M d Y - h:i A') }}</td> 

                                                                <td> {{ $type->total_hours }}</td>
                                                                <td> {{ $type->reason }}</td>
                                                              
                                                                
                                              

                                                            </tr>

                                                            @endforeach
                                                            
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                

        </div>
        <!-- END layout-wrapper -->

        @push('scripts')
@if (session('announcements-add'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Announcement</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush

@push('scripts')
@if (session('announcement-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Announcement</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush

@push('scripts')
@if (session('updateAnnouncement'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Announcement</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Updated Successfully!</span> ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    width: '300px', 
                    height: '100px',
                    backdrop: true,
                    position: 'top-end',
                    toast: true,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp',
                    }
                });
    </script>

    
@endif
@endpush