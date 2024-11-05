<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\EmployeeRecords;

use Illuminate\Http\Request;


Route::get('/', function() {
    return redirect('/login');
});
Route::get('/login', Login::class)->name('login');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/employee', EmployeeRecords::class)->name('employee-records');
    
});
