<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Login;
// admin
use App\Livewire\HR\Dashboard;
use App\Livewire\HR\EmployeeRecord;
use App\Livewire\HR\Addemployee;
use App\Livewire\HR\AttendanceRecord;

// super
use App\Livewire\Company;
use App\Livewire\AddCompany;
use App\Livewire\EmployeeRec;
use App\Livewire\EmployeeAdd;


use Illuminate\Http\Request;


Route::get('/', function() {
    return redirect('/login');
});
Route::get('/login', Login::class)->name('login');

Route::get('/oppss/unauthorized', function () {
    return view('livewire.errors.unauthorized');
})->name('unauthorized');

Route::middleware('auth')->group(function () {
    Route::middleware(['auth', 'department:company'])->group(function () {
         // Super admin
    Route::get('/company', App\Livewire\CompanyEnop::class)->name('dashboard');
    Route::get('/company/add_company', AddCompany::class)->name('addcompany');
    Route::get('/company/employee/records', App\Livewire\EmployeeRec::class)->name('company-Employees');
    Route::get('/company/employee/add', EmployeeAdd::class)->name('addemployee');
    Route::get('/company/department', App\Livewire\DepartmentSelect::class)->name('department-Super');
    Route::get('/company/seniority', App\Livewire\SenioritySelect::class)->name('seniority-Super');
    Route::get('/company/employment', App\Livewire\EmploymentSelect::class)->name('employment-Super');
    Route::get('/company/job', App\Livewire\JobSelect::class)->name('job-Super');
    Route::get('/company/shift', App\Livewire\ShiftSelect::class)->name('shift-Super');
    Route::get('/company/send_email', App\Livewire\SendEmail::class)->name('send-Email');
    Route::get('/company/employeerecords/edit/{empID}', App\Livewire\EmployeeEditSuper::class)->name('employee-Edit-Super');
    Route::get('/company/department/edit/{departmentID}', App\Livewire\DepartmentEdit::class)->name('department-Edit');
    
 
    });
    
    Route::middleware(['auth', 'department:hr'])->group(function () {
           // admin/hr
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
    Route::get('/admin/jobtitle/edit', App\Livewire\HR\EditJobtitle::class)->name('edit-Jobtitle');
    Route::get('/admin/seniority/edit', App\Livewire\HR\EditSeniority::class)->name('edit-Seniority');


    });
    Route::middleware(['auth', 'department:employee'])->group(function () {
        // employee
 Route::get('/employee/dashboard', App\Livewire\Employee\Dashboard::class)->name('employee-Dashboard');
 Route::get('/employee/attendance_log', App\Livewire\Employee\AttendanceLog::class)->name('attendance-Log');
 Route::get('/employee/work_schedule', App\Livewire\Employee\EmpWorkSchedule::class)->name('work-Schedule');
 Route::get('/employee/hand_book', App\Livewire\Employee\HandBook::class)->name('hand-Books');
 });

 Route::get('/oppss/unauthorized', function () {
    return view('livewire.errors.unauthorized');
})->name('unauthorized');

    
   
});
