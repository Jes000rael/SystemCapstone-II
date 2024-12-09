<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Start Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">ADMIN</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Contacts</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <!-- Chat -->
                                    <div class="d-lg-flex">
                                        <div class="chat col-12">
                                            <div>
                                                <div class="py-4 border-bottom">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 align-self-center me-3">
                                                            <div class="avatar-md profile-user-wid mb-4 img-thumbnail rounded-circle">
                                                                <span class="avatar-title rounded-circle bg-primary fs-5 fw-bold">
                                                                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                                                            <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tab Content -->
                                                <div class="tab-content py-4">
                                                    <div class="tab-pane show active" id="contacts">
                                                        <h5 class="font-size-14 mb-3">Contacts</h5>
                                                        <div data-simplebar style="max-height: 410px;">
                                                            @foreach ($groupedContacts as $letter => $contacts)
                                                                <div class="mt-4">
                                                                    <div class="avatar-xs mb-3">
                                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary">
                                                                            {{ $letter }}
                                                                        </span>
                                                                    </div>
                                                                    <ul class="list-unstyled chat-list">
                                                                        @foreach ($contacts as $contact)
                                                                            <li>
                                                                                <a wire:navigate href="{{ route('chats', ['empID' => Crypt::encrypt($contact->employee_id)]) }}">
                                                                                    <h5 class="font-size-14 mb-0">
                                                                                        <i class="mdi mdi-circle {{ $contact->status === 'active' ? 'text-success' : 'text-secondary' }} font-size-10"></i>
                                                                                        {{ $contact->first_name }} {{ $contact->last_name }}
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
                                                <!-- End Tab Content -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Chat End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
