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

    // Super admin
    Route::get('/company', App\Livewire\Company::class)->name('dashboard');
    Route::get('/addCompany', AddCompany::class)->name('addcompany');
    Route::get('/employeerecords', App\Livewire\EmployeeRec::class)->name('company.employeerecords');
    Route::get('/employee', EmployeeAdd::class)->name('addemployee');
    
});
