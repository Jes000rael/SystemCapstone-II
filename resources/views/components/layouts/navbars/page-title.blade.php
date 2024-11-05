<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ str_replace('-', ' ', Route::currentRouteName()) }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Route::currentRouteName() == 'dashboard' ? 'Sourcer' : '' }} {{ Route::currentRouteName() == 'employee-records' ? 'Sourcer' : '' }}</a></li>
                    <li class="breadcrumb-item active">{{ str_replace('-', ' ', Route::currentRouteName()) }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>