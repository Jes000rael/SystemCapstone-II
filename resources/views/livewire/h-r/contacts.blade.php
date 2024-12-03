<div class="chat-leftsidebar me-lg-4">
                                <div class="">
                                    <div class="py-4 border-bottom">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 align-self-center me-3">
                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="avatar-xs rounded-circle" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-15 mb-1">Henry Wells</h5>
                                                <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active</p>
                                            </div>

                                            <div>
                                                <div class="dropdown chat-noti-dropdown active">
                                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-bell bx-tada"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-box chat-search-box py-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <i class="bx bx-search-alt search-icon"></i>
                                        </div>
                                    </div>

                                    <div class="chat-leftsidebar-nav">
                                        <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                                <a href="#contacts" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Contacts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                                    <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Chat</span>
                                                </a>
                                            </li>
                                           
                                           
                                        </ul>
                                        <div class="tab-content py-4">
                                            <div class="tab-pane " id="chat">
                                                <div>
                                                    <h5 class="font-size-14 mb-3">Recent</h5>
                                                    <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                                    @foreach($messages as $message)
                                                        <li class="{{ $loop->first ? 'active' : '' }}">
                                                            <a href="javascript: void(0);">
                                                                <div class="d-flex">
                                                                    <div class="flex-shrink-0 align-self-center me-3">
                                                                        <i class="mdi mdi-circle {{ $message->status ? 'text-success' : 'text-warning' }} font-size-10"></i>
                                                                    </div>
                                                                    <div class="flex-shrink-0 align-self-center me-3">
                                                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="rounded-circle avatar-xs" alt="">
                                                                    </div>
                                                                    
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $message->employee->first_name }}  {{ $message->employee->last_name }}</h5>
                                                                        <p class="text-truncate mb-0">{{ $message->chatmessage }}</p>
                                                                    </div>
                                                                    <div class="font-size-11">{{ $message->created_at->diffForHumans() }}</div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            

                                            <div class="tab-pane show active" id="contacts">
                                                <h5 class="font-size-14 mb-3">Contacts</h5>

                                                <div  data-simplebar style="max-height: 410px;">
                                                @foreach ($groupedContacts as $letter => $contacts)
            <!-- Display the letter group -->
            <div class="mt-4">
                <div class="avatar-xs mb-3">
                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                        {{ $letter }}
                    </span>
                </div>

                <!-- Display contacts in this group -->
                <ul class="list-unstyled chat-list">
                    @foreach ($contacts as $contact)
                        <li>
                        <a href="javascript: void(0);" wire:click="selectContact({{ $contact->employee_id }})">
                        <h5 class="font-size-14 mb-0">
                            {{ $contact->first_name }} {{ $contact->last_name }}
                            <i class="mdi mdi-circle {{ $contact->status ? 'text-success' : 'text-warning' }} font-size-10"></i>
                        </h5>
                    </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

                                                    

                                                    

                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>