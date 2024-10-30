<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;

use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Dashboard::class)->name('dashboard');