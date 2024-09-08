<?php

use App\Http\Controllers\SessionController;
use App\Livewire\AddEmployee;
use App\Livewire\Dashboard;
use App\Livewire\LoginPage;
use App\Livewire\ViewDetails;
use Illuminate\Support\Facades\Route;

Route::get('/',LoginPage::class)->name('login')->middleware(['guest']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/employee/new', AddEmployee::class)->name('store');
    Route::get('/employee/{employee}', ViewDetails::class)->name('view');
});


