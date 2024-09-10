<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeCertificateController;
use App\Http\Controllers\TypeClothingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LogisticController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('roles', [RoleController::class,'index'])->name('roles.index');
Route::resource('type/certificates', TypeCertificateController::class)->names('type.certificates');
Route::resource('events', EventController::class)->names('events');
Route::resource('logistics', LogisticController::class)->names('logistics');
Route::resource('type/clothings', TypeClothingController::class)->names('type.clothings');