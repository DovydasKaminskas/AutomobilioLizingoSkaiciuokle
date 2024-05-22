<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeasingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/leasing', [LeasingController::class, 'index'])->name('leasing.index');
Route::get('/leasing/edit', [LeasingController::class, 'edit'])->name('leasing.edit');
Route::put('/leasing/update', [LeasingController::class, 'update'])->name('leasing.update');

Route::get('/leasing/update', function () {
    abort(404);
});
