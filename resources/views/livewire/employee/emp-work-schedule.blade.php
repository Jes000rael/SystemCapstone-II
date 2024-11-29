<div id="layout-wrapper">
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">USER</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                    <li class="breadcrumb-item active">Work Schedule</li>
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

                                <h4 class="card-title mb-4">Work Schedule</h4>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="yut" class="table table-bordered dt-responsive all-users-datatable_length nowrap w-100">
                                            <thead>
                                                
                                                <tr>
                                                    <th>Mon-In</th>
                                                    <th>Mon-Out</th>
                                                    <th>Tue-In</th>
                                                    <th>Tue-Out</th>
                                                    <th>Wed-in</th>
                                                    <th>Wed-Out</th>
                                                    <th>Thu-In</th>
                                                    <th>Thu-Out</th>
                                                    <th>Fri-In</th>
                                                    <th>Fri-Out</th>
                                                    <th>Sat-In</th>
                                                    <th>Sat-Out</th>
                                                    <th>Sun-In</th>
                                                    <th>Sun-Out</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach( $employee as $schedule)
                                                <tr>
                                                <td>{!! $schedule->monday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->monday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->monday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->monday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->tuesday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->tuesday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->tuesday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->tuesday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->wednesday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->wednesday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->wednesday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->wednesday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->thursday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->thursday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->thursday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->thursday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->friday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->friday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->friday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->friday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->saturday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->saturday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->saturday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->saturday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->sunday_in ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->sunday_in)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>
<td>{!! $schedule->sunday_out ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->sunday_out)->format('h:i A') : '<strong class="text-danger">N/S</strong>' !!}</td>


                                                

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
</div>
