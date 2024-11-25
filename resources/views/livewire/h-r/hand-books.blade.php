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
                            <li class="breadcrumb-item active">Add Handbooks</li>
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

                        <h4 class="card-title fs-5 mb-4">Add Handbooks</h4>
                        <div class="col-md-12">
                            <div class="row">
                                <livewire:h-r.add-handbooks/>
                                <div class="col-md-8 table-resposive">
                                    <table id="akontabled" class="table table-bordered dt-responsive all-users-datatable_length  nowrap w-100">
                                        <!-- <div id="dataTables_length" id="all-users-datatable_length"></div> -->
                                            <thead>
                                            <tr>
                                            
                                                <th>Description</th>
                                                <th>Link</th>
                                            
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach( $hand as $book)
                                           
                                           

                                            <tr>
                                                <td>{{ $book->description }}</td>
                                                <td>{{ $book->link }}</td>
                                               
                                                <td class="text-center">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="View">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                    <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".deleteHand{{ $book->handbook_id }}">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                  <div class="dropdown d-inline">
                                                  <a class="btn btn-outline-secondary btn-sm more dropdown-toggle" title="More" id="moreActions" data-bs-toggle="dropdown" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                   
                                                   <ul class="dropdown-menu" aria-labelledby="moreActions">
                                                     <li><a class="dropdown-item" href="#">Details</a></li>
                                                     <li><a class="dropdown-item" href="#">Archive</a></li>
                                                     <li><a class="dropdown-item" href="#">Share</a></li>
                                                   </ul>
                                                 </div>
                                                </td>

                                                <div wire:ignore.self class="modal fade deleteHand{{ $book->handbook_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteHand{{ $book->handbook_id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteHand{{ $book->handbook_id }}Label">Delete Handbook?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
                <strong class="mb-2 fs-6">Are you sure you want to delete this handbook?</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" wire:click="deleteHand({{ $book->handbook_id }})" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Delete</button>
                <button type="button" class="btn text-white fw-bold" style="background-color:#3085d6;" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
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

@push('scripts')
@if (session('hand-deleted'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Handbook</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Deleted Successfully!</span> ',
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
@if (session('handbook-add'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Handbook</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Added Successfully!</span> ',
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