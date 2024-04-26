<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/leasing', [App\Http\Controllers\LeasingController::class, 'index'])->name('leasing.index');
Route::get('/leasing/edit', [App\Http\Controllers\LeasingController::class, 'edit'])->name('leasing.edit');
Route::post('/leasing/update', [App\Http\Controllers\LeasingController::class, 'update'])->name('leasing.update');
