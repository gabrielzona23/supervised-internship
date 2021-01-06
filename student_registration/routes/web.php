<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResponsiblyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.home');
});
Route::get('/foo', function () {
    return 'Hello World';
});

Route::resource('users', UserController::class);
Route::resource('students', StudentController::class);
Route::resource('addresses', AddressController::class);
Route::resource('responsiblies', ResponsiblyController::class);
Route::resource('registrations', RegistrationController::class);
