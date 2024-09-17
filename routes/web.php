<?php

use App\Http\Controllers\AssistenceController;
use App\Http\Controllers\AssitenceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CollectionAccountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeCertificateController;
use App\Http\Controllers\TypeClothingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [HomeController::class, 'profileEdit'])->name('profile.edit');
Route::put('/profile', [HomeController::class, 'profileUpdate'])->name('profile.update');
Route::get('roles', [RoleController::class,'index'])->name('roles.index');
Route::resource('assistences', AssistenceController::class)->names('assistences');
Route::resource('certificates', CertificateController::class)->names('certificates');
Route::resource('collection/accounts', CollectionAccountController::class)->names('collection.accounts');
Route::resource('events', EventController::class)->names('events');
Route::resource('logistics', LogisticController::class)->names('logistics');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('type/certificates', TypeCertificateController::class)->names('type.certificates');
Route::resource('type/clothings', TypeClothingController::class)->names('type.clothings');
Route::resource('users', UserController::class)->names('users');
