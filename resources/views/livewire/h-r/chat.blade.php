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
                                    <li class="breadcrumb-item active">Chat</li>
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
                                <h4 class="card-title fs-5 mb-4">Chat</h4>
                                <div class="col-md-12">
                                    <!-- chat -->
                                    <div class="d-lg-flex">
                                        <div class="w-100 user-chat">
                                            <div class="card">
                                                <div class="p-4 border-bottom">
                                                    <div class="row">
                                                        <div class="col-md-4 col-9">
                                                            <h5 class="font-size-15 mb-1">{{$first_name}} {{$last_name}}</h5>
                                                            <p class="text-muted mb-0">
                                                                <i class="mdi mdi-circle {{ $status === 'active' ? 'text-success' : '' }} align-middle me-1"></i>
                                                                {{ $status === 'active' ? 'Active' : 'Offline' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-8 col-3">
                                                            <ul class="list-inline user-chat-nav text-end mb-0">
                                                                <!-- Nav buttons -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="chat-conversation p-3" id="chatContainer">
                                                        <ul class="list-unstyled mb-0 scroll-container" style="max-height: 486px;" id="chatMessages">
                                                            @php
                                                                use Carbon\Carbon;
                                                                $previousDate = null;
                                                            @endphp

                                                            @foreach ($messages as $message)
                                                                @php
                                                                    $messageDate = $message->created_at->format('Y-m-d');
                                                                    $isToday = $messageDate === Carbon::now()->format('Y-m-d');
                                                                @endphp

                                                                @if ($isToday && $messageDate !== $previousDate)
                                                                    <li>
                                                                        <div class="chat-day-title">
                                                                            <span class="title">Today</span>
                                                                        </div>
                                                                    </li>
                                                                @endif

                                                                @if (!$isToday && $messageDate !== $previousDate)
                                                                    <li>
                                                                        <div class="chat-day-title">
                                                                            <span class="title">{{ $message->created_at->format('F j, Y') }}</span>
                                                                        </div>
                                                                    </li>
                                                                @endif

                                                                <li class="{{ $message->employee_id === Auth::user()->employee_id ? 'right' : 'left' }}">
                                                                    <div class="conversation-list">
                                                                        <div class="ctext-wrap">
                                                                            <div class="conversation-name">
                                                                                {{ $message->employee_id === Auth::user()->employee_id ? 'You' : $message->employee->first_name }}
                                                                            </div>
                                                                            <p>{{ $message->chatmessage }}</p>
                                                                            <p class="chat-time mb-0">
                                                                                <i class="bx bx-time-five align-middle me-1"></i>
                                                                                {{ $message->created_at->format('h:i A') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @php
                                                                    $previousDate = $messageDate;
                                                                @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="p-3 chat-input-section">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="position-relative">
                                                                    <input wire:keydown.enter="sendMessage" type="text" class="form-control rounded-pill" placeholder="Enter Message..." wire:model="chatmessage" id="chatmessage">
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
                                    </div>
                                    <!-- chat end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
</div>
