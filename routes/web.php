<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Login;

use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Login::class)->name('login');
