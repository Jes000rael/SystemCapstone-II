@push('styles')
<style>
      .nav {
            list-style: none;
            padding: 0;
            display: flex;
            color: #000; 

           
        }

        .nav-item {
            margin-right: 1rem; 
            color: #000; 

        }

        .nav-link {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: #000; 
            
            border-radius: 50px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .nav-item .nav-link:hover {
            color: maroon; /* Change to your desired color */
            background-color: rgba(128, 0, 0, 0.1); /* Optional: add a background color */
        }

     

        .nav-item .nav-link.active {
            color: #000; 
            background-color: none; 
            border: 3px solid #000; 
        }
</style>
<style>
    .responsive-header {
    background-image: url('../assets/img/Prime_Retail_fall_logo.webp');
    /* background-size: ;   */
    background-position: center; 
    background-repeat: no-repeat;
    height: 10px;  
   
}

@media (max-width: 768px) {
    .responsive-header {
        height: 30vh;  
        background-size: contain; 
    }
}

@media (max-width: 900px) {
    .responsive-header {
        height: 30vh;  
        background-size: contain; 
    }
}

@media (max-width: 1600px) {
    .responsive-header {
        height: 30vh;  
        background-size: contain; 
    }
}

@media (max-width: 480px) {
    .responsive-header {
        height: 20vh;  
        background-size: contain;  
    }
}

</style>
@endpush


<div>
    <div class="container-fluid">
    <div class="page-header min-height-250 border-radius-xl mb-5 responsive-header">
    <span class="mask bg-gradient-primary opacity-1"></span>
</div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
               
                <div class="col-auto my-auto fw-bold ">
                    <div class="h-100">
                        <h5 style ="color:#000;" class="mb-1">
                             
                        <strong>{{ $activeTab === 'empRecords' ? 'Employee Records' : '' }}</strong>
                        <strong>{{ $activeTab === 'addEmployee' ? 'Add Employee' : '' }}</strong>
                        </h5>
                      
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pill nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 {{ $activeTab === 'empRecords' ? 'active' : '' }}" wire:click="switchTab('empRecords')" wire:navigate href="/employee">
                                <svg class="text-dark" xmlns="http://www.w3.org/2000/svg"  width="20px" height="20px" viewBox="0 0 36 36" >

<title>employee_group_solid</title>

<g id="ad30ea0b-4044-46a8-9d02-5476e64acf86" data-name="Layer 3" stroke="none" fill="#000000" >

<ellipse cx="18" cy="11.28" rx="4.76" ry="4.7"/>

<path d="M10.78,11.75c.16,0,.32,0,.48,0,0-.15,0-.28,0-.43a6.7,6.7,0,0,1,3.75-6,4.62,4.62,0,1,0-4.21,6.46Z"/>

<path d="M24.76,11.28c0,.15,0,.28,0,.43.16,0,.32,0,.48,0A4.58,4.58,0,1,0,21,5.29,6.7,6.7,0,0,1,24.76,11.28Z"/>

<path d="M22.29,16.45a21.45,21.45,0,0,1,5.71,2,2.71,2.71,0,0,1,.68.53H34V15.56a.72.72,0,0,0-.38-.64,18,18,0,0,0-8.4-2.05l-.66,0A6.66,6.66,0,0,1,22.29,16.45Z"/>

<path d="M6.53,20.92A2.76,2.76,0,0,1,8,18.47a21.45,21.45,0,0,1,5.71-2,6.66,6.66,0,0,1-2.27-3.55l-.66,0a18,18,0,0,0-8.4,2.05.72.72,0,0,0-.38.64V22H6.53Z"/>

<rect x="21.46" y="26.69" width="5.96" height="1.4"/>

<path d="M32.81,21.26H25.94v-1a1,1,0,0,0-2,0v1H22V18.43A20.17,20.17,0,0,0,18,18a19.27,19.27,0,0,0-9.06,2.22.76.76,0,0,0-.41.68v5.61h7.11v6.09a1,1,0,0,0,1,1H32.81a1,1,0,0,0,1-1V22.26A1,1,0,0,0,32.81,21.26Zm-1,10.36H17.64V23.26h6.3v.91a1,1,0,0,0,2,0v-.91h5.87Z"/>

</g>

</svg>
                                    <span class="ms-1">{{ __('Employee Records') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 {{ $activeTab === 'addEmployee' ? 'active' : '' }} " wire:click="switchTab('addEmployee')">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="document" transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background"
                                                            d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                            id="Path" opacity="0.603585379"></path>
                                                        <path class="color-background"
                                                            d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                            id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Add Employee') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="settings" transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" id="Path"
                                                            opacity="0.596981957"
                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background"
                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                            id="Path" opacity="0.596981957"></path>
                                                        <path class="color-background"
                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                            id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Projects') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="settings" transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" id="Path"
                                                            opacity="0.596981957"
                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background"
                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                            id="Path" opacity="0.596981957"></path>
                                                        <path class="color-background"
                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                            id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Projects') }}</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
    <div class="tab-content">
    <div class="tab-pane {{ $activeTab === 'empRecords' ? 'active' : '' }} " id="empRecords">
    <div class="col-12">
      <div class="card mb-4 py-2 px-2">
        <div class="card-header pb-0">
          <h6>Employee Records</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="myTable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Job Title</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seniority Level</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>
                    <p class="text-xs font-weight-bold mb-0">ENOP-13</p>
                    </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Jesrael Escaran</h6>
                        <p class="text-xs text-secondary mb-0">jes2kim@gmail.com</p>
                      </div>
                    </div>
                  </td>
                  <td>
                  <p class="text-xs font-weight-bold mb-0">Core Alice Main</p>
                    <p class="text-xs text-secondary mb-0">Jungler</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                  <p class="text-xs font-weight-bold mb-0">Mythical Glory</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                  </td>
                  <td class="align-middle text-center">
                    <a href="" class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip" data-original-title="View" data-bs-toggle="modal" data-bs-target="#Modalview">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="" class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#Modalupdate">
                      <i class="fa fa-user-edit"></i>
                    </a>
                    <a href="" class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip" data-original-title="Edit user">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <!-- modal view-->
                <div class="modal fade" id="Modalview" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Employee Details  
                

                </h5>
                <button class="btn btn-tranparent shadow-none" data-bs-dismiss="modal"><i class="fa fa-close fs-5"></i></button>
            </div>
            <div class="modal-body">
        <div class="container">
         <div class="row mt-2 mb-2">
             <div class="col-4">Name:</div>
            <div class="col-8 text-center">Jesrael Escaran</div>
              </div>
              <div class="row mt-2 mb-2">
             <div class="col-4">Job Title:</div>
            <div class="col-8 text-center">Soft Developer</div>
              </div>
              <div class="row mt-2 mb-2">
             <div class="col-4">Department:</div>
            <div class="col-8 text-center">Information Technology (IT)</div>
              </div>
              <div class="row mt-2 mb-2">
             <div class="col-4">Seniority Level:</div>
            <div class="col-8 text-center">High-level</div>
              </div>
              <div class="row mt-2 mb-2">
             <div class="col-4">Contact Number:</div>
            <div class="col-8 text-center">090-4542-3456</div>
              </div>
              <div class="row mt-2 mb-2">
             <div class="col-4">Emergency Contact:</div>
            <div class="col-8 text-center">Mark Jun Brigiks (ML Brother)</div>
              </div>
             </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->

<div class="modal fade" id="Modalupdate" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Update Employee </h5>
                <button class="btn btn-tranparent shadow-none" data-bs-dismiss="modal"><i class="fa fa-close fs-5"></i></button>
            </div>
            <div class="modal-body">
               <div class="container">
               <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('First Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="First Name" required>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Last Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Middle Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Middle Name">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Suffix') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Seniority Level">
                                        <option value="">Jr. (Junior).</option>
                                        <option value="">Sr. (Senior)</option>
                                        <option value="">II (Second)</option>
                                        <option value="">III (Third)</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Blood Type') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Blood Type">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Address') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Address">
                                     <!-- <textarea class="form-control" name="" id="" placeholder="Address"></textarea> -->
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Seniority Level') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <select class="form-control form-select" name="" id="" placeholder="Seniority Level">
                                        <option value="">Entry-level</option>
                                        <option value="">Mid-level</option>
                                        <option value="">Senior-level</option>
                                        <option value="">Executive-level</option>
                                        <option value="">Board-level</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Employement Status ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Employment Status ID">
                                        <option value="">Full-Time Employee</option>
                                        <option value="">Part-Time Employee</option>
                                        <option value="">Contractor</option>
                                        <option value="">Temporary Employee</option>
                                        <option value="">Intern</option>
                                        <option value="">Freelancer</option>
                                        <option value="">Remote Worker</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Job Title ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Job Title ID">
                                        <option value="">Software Engineer</option>
                                        <option value="">Data Analyst</option>
                                        <option value="">Project Manager</option>
                                        <option value="">Marketing Specialist</option>
                                        <option value="">Human Resources Manager </option>
                                        <option value="">Sales Associate</option>
                                        <option value="">Graphic Designer</option>
                                        <option value="">Product Manager</option>
                                        <option value="">Customer Service Representative </option>
                                        <option value="">Financial Analyst</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Department Title') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Department Title">
                                        <option value="">Human Resources</option>
                                        <option value="">Finance</option>
                                        <option value="">Marketing</option>
                                        <option value="">Sales</option>
                                        <option value="">Operations</option>
                                        <option value="">Information Technology</option>
                                        <option value="">Customer Service</option>
                                        <option value="">Research and Development </option>
                                        <option value="">Product Management</option>
                                        <option value="">Legal</option>
                                        <option value="">Compliance</option>
                                        <option value="">Public Relations</option>
                                        <option value="">Supply Chain Management</option>
                                        <option value="">Facilities Management</option>
                                        <option value="">Business Development</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date of Birth') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="date" placeholder="Date of Birth">
                                
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date Hired') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" placeholder="Date Hired">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date Start') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" placeholder="Date Start">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Hourly Rate') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Hourly Rate">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Has Night Diff') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Department Title">
                                        <option value="">Eligibility</option>
                                        <option value="">Percentage Increase</option>
                                        <option value="">Defined Hours</option>
                                        <option value="">Impact on Benefits</option>
                                        <option value="">Union Contracts</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Username') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Username">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Password') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Password">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Contact Number') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Contact Number">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Emergency Contact') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Emergency Contact">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Emergency Person') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Emergency Person">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Relationship') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Relationship">
                                        <option value="">Manager-Employe</option>
                                        <option value="">Colleague</option>
                                        <option value="">Employee-Clien</option>
                                        <option value="">Supplier</option>
                                        <option value="">Human Resources</option>
                                        <option value="">Mentorship</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('TIN') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="TIN">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('SSS') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="SSS">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('PAGIBIG') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="PAGIBIG">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('PHILHEALTH') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="PHILHEALTH">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Shift ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Shift ID">
                                        <option value="">Day Shift</option>
                                        <option value="">Night Shift</option>
                                        <option value="">Evening Shift</option>
                                        <option value="">Weekend Shift</option>
                                        <option value="">Split Shift</option>
                                        <option value="">Overnight Shift</option>
                                        <option value="">Flexible Shift</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                      
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4"><i class="fas fa-user-edit me-3"></i>{{ 'Save Changes' }}</button>
                    </div>
                </form>

               </div>
            </div>
        </div>
    </div>
</div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
    <div  class="tab-pane {{ $activeTab === 'addEmployee' ? 'active' : '' }}" id="addEmployee">
  
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('First Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Last Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Middle Name') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Middle Name">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Suffix') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Seniority Level">
                                        <option value="">Jr. (Junior).</option>
                                        <option value="">Sr. (Senior)</option>
                                        <option value="">II (Second)</option>
                                        <option value="">III (Third)</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Blood Type') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Blood Type">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Address') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Address">
                                     <!-- <textarea class="form-control" name="" id="" placeholder="Address"></textarea> -->
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Seniority Level') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <select class="form-control form-select" name="" id="" placeholder="Seniority Level">
                                        <option value="">Entry-level</option>
                                        <option value="">Mid-level</option>
                                        <option value="">Senior-level</option>
                                        <option value="">Executive-level</option>
                                        <option value="">Board-level</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Employement Status ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Employment Status ID">
                                        <option value="">Full-Time Employee (FTE)</option>
                                        <option value="">Part-Time Employee (PTE)</option>
                                        <option value="">Contractor</option>
                                        <option value="">Temporary Employee</option>
                                        <option value="">Intern</option>
                                        <option value="">Freelancer</option>
                                        <option value="">Remote Worker</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Job Title ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Job Title ID">
                                        <option value="">Software Engineer - ID: SE001</option>
                                        <option value="">Data Analyst - ID: DA002</option>
                                        <option value="">Project Manager - ID: PM003</option>
                                        <option value="">Marketing Specialist - ID: MS004</option>
                                        <option value="">Human Resources Manager - ID: HRM005</option>
                                        <option value="">Sales Associate - ID: SA006</option>
                                        <option value="">Graphic Designer - ID: GD007</option>
                                        <option value="">Product Manager - ID: PM008</option>
                                        <option value="">Customer Service Representative - ID: CSR009</option>
                                        <option value="">Financial Analyst - ID: FA010</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Department Title') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Department Title">
                                        <option value="">Human Resources (HR)</option>
                                        <option value="">Finance</option>
                                        <option value="">Marketing</option>
                                        <option value="">Sales</option>
                                        <option value="">Operations</option>
                                        <option value="">Information Technology (IT)</option>
                                        <option value="">Customer Service</option>
                                        <option value="">Research and Development (R&D)</option>
                                        <option value="">Product Management</option>
                                        <option value="">Legal</option>
                                        <option value="">Compliance</option>
                                        <option value="">Public Relations (PR)</option>
                                        <option value="">Supply Chain Management</option>
                                        <option value="">Facilities Management</option>
                                        <option value="">Business Development</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date of Birth') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="date" placeholder="Date of Birth">
                                
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date Hired') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" placeholder="Date Hired">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Date Start') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" placeholder="Date Start">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Hourly Rate') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Hourly Rate">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Has Night Diff') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Department Title">
                                        <option value="">Eligibility</option>
                                        <option value="">Percentage Increase</option>
                                        <option value="">Defined Hours</option>
                                        <option value="">Impact on Benefits</option>
                                        <option value="">Union Contracts</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Username') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Username">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Password') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Password">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Contact Number') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Contact Number">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Emergency Contact') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Emergency Contact">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Emergency Person') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Emergency Person">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Relationship') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Relationship">
                                        <option value="">Manager-Employee Relationship</option>
                                        <option value="">Colleague Relationships</option>
                                        <option value="">Employee-Client Relationship</option>
                                        <option value="">Supplier Relationships</option>
                                        <option value="">Human Resources Relationships</option>
                                        <option value="">Mentorship</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('TIN') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="TIN">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('SSS') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="SSS">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('PAGIBIG') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="PAGIBIG">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('PHILHEALTH') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="PHILHEALTH">
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.first_name" class="form-control-label">{{ __('Shift ID') }}</label>
                                <div class="@error('user.first_name')border border-danger rounded-3 @enderror">
                                <select class="form-control form-select" name="" id="" placeholder="Shift ID">
                                        <option value="">Day Shift - ID: DS001</option>
                                        <option value="">Night Shift - ID: NS002</option>
                                        <option value="">Evening Shift - ID: ES003</option>
                                        <option value="">Weekend Shift - ID: WS004</option>
                                        <option value="">Split Shift - ID: SS005</option>
                                        <option value="">Overnight Shift - ID: OS006</option>
                                        <option value="">Flexible Shift - ID: FS007</option>
                                    </select>
                                </div>
                                @error('user.first_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                      
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4"><i class="fas fa-plus me-3"></i>{{ 'Save New Employee' }}</button>
                    </div>
                </form>

            </div>
            </div>
        </div>
</div>
</div>
</div>








    




   
