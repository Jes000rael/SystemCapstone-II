
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
                   
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-3"></div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4 fs-5">Contact Us</h4>
                        @if (session()->has('error'))
    <div class="alert alert-danger text-center fw-bold py-1">
        {{ session('error') }}
    </div>
@endif

<form wire:submit.prevent="sendEmail" wire:ignore>
    <div class="mb-3">
        <label for="emailtext" class="form-label">Send Message</label>
        <div class="@error('errors') border border-danger rounded-2 @enderror @error('emailtext') border border-danger rounded-2 @enderror">
            <textarea id="email-editor" wire:model.defer="emailtext" class="form-control" rows="5"></textarea>
        </div>
        @error('emailtext') 
            <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> 
        @enderror
    </div>

    <div class="mb-3">
        <div class="align-items-center d-flex justify-content-center">
           
        <button type="submit" class="btn btn-primary w-sm mt-3 me-2" wire:loading.attr="disabled" wire:target="sendEmail">
   
    <span wire:loading wire:target="sendEmail" class="spinner-border spinner-border-sm me-1"></span> 

 
    <i wire:loading.remove wire:target="sendEmail" class="bx bx-paper-plane me-1"></i>

    Send Email
</button>
        </div>
    </div>
</form>

                                    <script>
    function initTinyMCE() {
        if (tinymce.get("email-editor")) {
            tinymce.get("email-editor").remove(); 
        }

        tinymce.init({
            selector: "textarea#email-editor",
            height: 200,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            setup: function (editor) {
             
                editor.on('change', function () {
                    @this.set('emailtext', editor.getContent());
                });

                Livewire.on('syncTinyMCE', function (content) {
                    editor.setContent(content || ''); // Set content or reset
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initTinyMCE();

        // Reinitialize TinyMCE after Livewire updates
        Livewire.hook('message.processed', (message, component) => {
            initTinyMCE();
        });
    });
</script>
                                   
                        
                               
                        
                        

                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-3"></div>
        </div>
        <!-- end row -->

        
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>


@push('scripts')
@if (session('email-send'))
<script>
      Swal.fire({
                    title: '<strong style="color:#000; font-size:15px;" class="text-center">Email</strong><br><span style="color:#000; font-size:13px;"  class="text-center" > Send Successfully!</span> ',
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