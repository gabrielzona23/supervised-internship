<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResponsiblyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.home');
})->name('home');
Route::get('/foo', function () {
    return view('components.forms.forms');
});

Route::resource('users', UserController::class);
Route::resource('students', StudentController::class);
Route::resource('addresses', AddressController::class);
Route::resource('responsiblies', ResponsiblyController::class);
Route::resource('registrations', RegistrationController::class);
Route::resource('anamneses', AnamneseController::class)->parameters([
    'anamneses' => 'student'
]);
Route::get('/students/{student}/registration/{registration}', [StudentController::class, 'editRegistrationStudent'])->name('students.editRegistrationStudent');
