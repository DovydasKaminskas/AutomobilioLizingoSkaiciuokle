<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/leasing', [App\Http\Controllers\LeasingController::class, 'index'])->name('leasing.index');
Route::get('/leasing/create', [App\Http\Controllers\LeasingController::class, 'create'])->name('leasing.create');
