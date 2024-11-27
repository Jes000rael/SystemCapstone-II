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
                                            <li class="breadcrumb-item active">Add Announcement</li>
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
                                                <livewire:h-r.add-announcement/>
                                                <div class="col-md-8">
                                                    
                                                    <table id="akontable" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                                       
                                                            <thead>
                                                            <tr>
                                                                <th>Description</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                        
                        
                                                            <tbody>
                                                            
                                                           @foreach($announce as $ment)
                                                           
                
                                                            <tr>
                                                                <td class="text-truncate" style="max-width:200px;"> {{ $ment->description }}</td>
                                                                <td> {{ $ment->date }}</td>
                                                                
                                                                <td class="text-center">
                                                                
                                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View"  data-bs-toggle="modal" data-bs-target=".ViewAnouncement{{ $ment->announcement_id }}">
                                                                    <i class="fas fa-eye"></i>
                                                                  </a>
                                                                  @php
                                                     $encrypteAnnounceID = Crypt::encrypt($ment->announcement_id);
                                               @endphp

                                                                  <a  wire:navigate href="{{ route('edit-Announcement', ['announceID' => $encrypteAnnounceID]) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                  </a>
                                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".deleteAnnouncement{{ $ment->announcement_id }}">
                                                                    <i class="fas fa-trash"></i>
                                                                  </a>
                                                                
                                                                </td>
<div wire:ignore.self class="modal fade deleteAnnouncement{{ $ment->announcement_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteAnnouncement{{ $ment->announcement_id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAnnouncement{{ $ment->announcement_id }}Label">Delete Announcement?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this announcement?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteAnnouncement({{ $ment->announcement_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- view modal  -->
<div class="modal fade ViewAnouncement{{ $ment->announcement_id }}" tabindex="-1" role="dialog" aria-labelledby="ViewAnnouncementLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewDepartmentLabel">Anouncement</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-4">Description : <span class=" fw-bold">{{ $ment->description }}</span></p>
                                <p class="mb-4">Date : <span class=" fw-bold">{{ $ment->date }}</span></p>
                               

                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- view modal end -->

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