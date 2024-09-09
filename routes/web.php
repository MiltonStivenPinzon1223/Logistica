<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeCertificateController;
use App\Http\Controllers\TypeClothingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('roles', [RoleController::class,'index'])->name('roles.index');
Route::resource('type/certificates', TypeCertificateController::class)->names('type.certificates');
Route::resource('type/clothings', TypeClothingController::class)->names('type.clothings');