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


Route::middleware('auth')->group(function () {

    

    // admin/hr
    Route::get('/dashboard', Dashboard::class)->name('hr.dashboard');
   
    Route::get('/employee_records', EmployeeRecord::class)->name('employee-record');
    Route::get('/addemployee', Addemployee::class)->name('add-employee');
    Route::get('/attendance', AttendanceRecord::class)->name('attendance-records');
    Route::get('/seniority', App\Livewire\HR\SeniorityLevel::class)->name('seniority-level');
    Route::get('/department', App\Livewire\HR\Department::class)->name('department');
    Route::get('/jobtitle', App\Livewire\HR\JobTitle::class)->name('jobtitle');
    Route::get('/employee-status', App\Livewire\HR\EmployeeStatus::class)->name('employee-status');
    Route::get('/shifts', App\Livewire\HR\Shifts::class)->name('shifts');
    Route::get('/deduction', App\Livewire\HR\Deduction::class)->name('deduction');
    Route::get('/off-duty', App\Livewire\HR\OffDuty::class)->name('off-duty');
    Route::get('/hand-book', App\Livewire\HR\HandBooks::class)->name('hand-book');
    Route::get('/anouncements', App\Livewire\HR\Anouncements::class)->name('anouncements');

    // Super admin
    Route::get('/company', App\Livewire\Company::class)->name('dashboard');
    Route::get('/addCompany', AddCompany::class)->name('addcompany');
    Route::get('/employeerecords', App\Livewire\EmployeeRec::class)->name('company.employeerecords');
    Route::get('/employee', EmployeeAdd::class)->name('addemployee');
    
});
