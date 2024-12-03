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
                                            <li class="breadcrumb-item active">Breaktime Log</li>
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
        
                                        <h4 class="card-title fs-5 mb-4">Breaktime Log</h4>
                                        <div class="col-md-12">
                                                <!-- chat  -->
                        <div class="d-lg-flex">
                           <livewire:h-r.contacts/>
                            <div class="w-100 user-chat">
    <div class="card">
        <div class="p-4 border-bottom">
            <div class="row">
                <div class="col-md-4 col-9">
                    <h5 class="font-size-15 mb-1"></h5>
                    <p class="text-muted mb-0">
                        <i class="mdi mdi-circle active align-middle me-1"></i> 
                        Active now
                    </p>
                </div>
                <div class="col-md-8 col-3">
                    <ul class="list-inline user-chat-nav text-end mb-0">
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-search-alt-2"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View Profile</a>
                                    <a class="dropdown-item" href="#">Clear chat</a>
                                    <a class="dropdown-item" href="#">Muted</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div>
            <div class="chat-conversation p-3" id="chatContainer">
                <ul class="list-unstyled mb-0 scroll-container" style="max-height: 486px;" id="chatMessages">
                    <li>
                        <div class="chat-day-title">
                            <span class="title">Today</span>
                        </div>
                    </li>
                    
    @foreach ($messages as $message)
        <li class="{{ $message->employee_id === Auth::user()->employee_id ? 'right' : '' }}">
            <div class="conversation-list">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Copy</a>
                        <a class="dropdown-item" href="#">Save</a>
                        <a class="dropdown-item" href="#">Forward</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
                <div class="ctext-wrap">
                    <div class="conversation-name">{{ $message->employee->first_name }}</div>
                    <p>{{ $message->chatmessage }}</p>
                    <p class="chat-time mb-0">
                        <i class="bx bx-time-five align-middle me-1"></i>
                        {{ $message->created_at->format('h:i A') }}
                    </p>
                </div>
            </div>
        </li>
        
    @endforeach
         </ul>
            </div>

            <div class="p-3 chat-input-section">
                <div class="row">
                    <div class="col">
                        <div class="position-relative">
                            <input type="text" class="form-control chat-input" placeholder="Enter Message..." wire:model="chatmessage" id="chatmessage">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light" wire:click="sendMessage">
                            <span class="d-none d-sm-inline-block me-2">Send</span> 
                            <i class="mdi mdi-send"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



           
                                                   <!-- chat end  -->
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


