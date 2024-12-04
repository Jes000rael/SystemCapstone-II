<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\HR\{Dashboard, EmployeeRecord, Addemployee, AttendanceRecord};
use App\Livewire\{Company, AddCompany, EmployeeRec, EmployeeAdd};
use Illuminate\Http\Request;

Route::get('/', fn() => redirect('/login'));
Route::get('/login', Login::class)->name('login');
Route::get('/forgot_password', App\Livewire\Auth\ForgotPassword::class)->name('forgot-Password');
Route::get('/oppss/unauthorized', fn() => view('livewire.errors.unauthorized'))->name('unauthorized');

Route::middleware('auth')->group(function () {
    
    Route::middleware('department:company')->group(function () {
        Route::get('/company', App\Livewire\CompanyEnop::class)->name('dashboard');
        Route::get('/company/add_company', AddCompany::class)->name('addcompany');
        Route::get('/company/employee/records', EmployeeRec::class)->name('company-Employees');
        Route::get('/company/employee/add', EmployeeAdd::class)->name('addemployee');
        Route::get('/company/department', App\Livewire\DepartmentSelect::class)->name('department-Super');
        Route::get('/company/seniority', App\Livewire\SenioritySelect::class)->name('seniority-Super');
        Route::get('/company/employment', App\Livewire\EmploymentSelect::class)->name('employment-Super');
        Route::get('/company/job', App\Livewire\JobSelect::class)->name('job-Super');
        Route::get('/company/shift', App\Livewire\ShiftSelect::class)->name('shift-Super');
        Route::get('/company/send_email', App\Livewire\SendEmail::class)->name('send-Email');
        Route::get('/company/employeerecords/edit/{empID}', App\Livewire\EmployeeEditSuper::class)->name('employee-Edit-Super');
        Route::get('/company/department/edit/{departmentID}', App\Livewire\DepartmentEdit::class)->name('department-Edit');
        Route::get('/company/add_company/edit/{companyID}', App\Livewire\CompanyEdit::class)->name('company-Edit');
        Route::get('/company/job/edit/{jobID}', App\Livewire\JobEdit::class)->name('job-Edit');
        Route::get('/company/seniority/edit/{seniorID}', App\Livewire\SeniorityEdit::class)->name('senior-Edit');
        Route::get('/company/employment/edit/{employmentID}', App\Livewire\EmploymentEdit::class)->name('employment-Edit');
        Route::get('/company/shift/edit/{shiftID}', App\Livewire\ShiftEdit::class)->name('shift-Edit');
    });

    Route::middleware('department:hr')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin-Dashboard');
        Route::get('/admin/employee_records', EmployeeRecord::class)->name('employee-Record');
        Route::get('/admin/addemployee', Addemployee::class)->name('add-Employee');
        Route::get('/admin/attendance', AttendanceRecord::class)->name('attendance-Records');
        Route::get('/admin/seniority', App\Livewire\HR\SeniorityLevels::class)->name('seniority-Level');
        Route::get('/admin/department', App\Livewire\HR\Departmented::class)->name('department');
        Route::get('/admin/jobtitle', App\Livewire\HR\JobTitles::class)->name('jobtitle');
        Route::get('/admin/employee-status', App\Livewire\HR\EmployeeStatuss::class)->name('employee-Status');
        Route::get('/admin/shifts', App\Livewire\HR\Shiftss::class)->name('shifts');
        Route::get('/admin/deduction', App\Livewire\HR\Deduction::class)->name('deduction');
        Route::get('/admin/off-duty', App\Livewire\HR\OffDuty::class)->name('off-Duty');
        Route::get('/admin/hand-book', App\Livewire\HR\HandBookss::class)->name('hand-Book');
        Route::get('/admin/merit-log', App\Livewire\HR\MeritLog::class)->name('merit-log');
        Route::get('/admin/breaktime-log', App\Livewire\HR\BreaktimeLog::class)->name('breaktime-log');
        Route::get('/admin/overtime-log', App\Livewire\HR\OvertimeLog::class)->name('overtime-log');
        Route::get('/admin/announcements', App\Livewire\HR\Anouncements::class)->name('anouncements');
        Route::get('/admin/employee_records/edit/{empID}', App\Livewire\HR\EmployeeEdit::class)->name('Employee-Edit');
        Route::get('/admin/department/edit/{departmentID}', App\Livewire\HR\EditDepartment::class)->name('edit-Department');
        Route::get('/admin/jobtitle/edit/{jobtitleID}', App\Livewire\HR\EditJobtitle::class)->name('edit-Jobtitle');
        Route::get('/admin/seniority/edit/{seniorityID}', App\Livewire\HR\EditSeniority::class)->name('edit-Seniority');
        Route::get('/admin/employee-status/edit/{employmentID}', App\Livewire\HR\EditEmploystat::class)->name('edit-Status');
        Route::get('/admin/shifts/edit/{shiftID}', App\Livewire\HR\EditShift::class)->name('edit-Shift');
        Route::get('/admin/off-duty/edit/{offID}', App\Livewire\HR\EditOffDuty::class)->name('edit-Duty');
        Route::get('/admin/hand-book/edit/{handID}', App\Livewire\HR\EditHandbook::class)->name('edit-Handbook');
        Route::get('/admin/employee_records/add-deduction/{empID}', App\Livewire\HR\AddDeduction::class)->name('add-Deduction');
        Route::get('/admin/deduction/edit/{deducID}', App\Livewire\HR\EditDeduction::class)->name('edit-Deduction');
        Route::get('/admin/announcements/edit/{announceID}', App\Livewire\HR\EditAnnouncement::class)->name('edit-Announcement');
        Route::get('/admin/employee_records/add_schedule/{empID}', App\Livewire\HR\AddWorkSchedule::class)->name('add-Schedule');
        Route::get('/admin/employee_records/edit_schedule/{empID}', App\Livewire\HR\EditWorkSchedule::class)->name('edit-Schedule');
        Route::get('/admin/contacts', App\Livewire\HR\Contacts::class)->name('contacts');
        Route::get('/admin/contacts/chat/{empID}', App\Livewire\HR\Chat::class)->name('chats');

    });

    Route::middleware('department:employee')->group(function () {
        Route::get('/employee/dashboard', App\Livewire\Employee\Dashboard::class)->name('employee-Dashboard');
        Route::get('/employee/attendance_log', App\Livewire\Employee\AttendanceLog::class)->name('attendance-Log');
        Route::get('/employee/work_schedule', App\Livewire\Employee\EmpWorkSchedule::class)->name('work-Schedule');
        Route::get('/employee/hand_book', App\Livewire\Employee\HandBook::class)->name('hand-Books');
    });

});
