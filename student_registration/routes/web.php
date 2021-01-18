<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\ResponsiblyController;
use App\Http\Controllers\RegistrationController;


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
Route::get('/address/{student}', [AddressController::class, 'createAddressStudent'])->name('address.createAddressStudent');
Route::post('/address/{student}', [AddressController::class, 'storeAddressStudent'])->name('address.storeAddressStudent');
Route::put('/address/{student}/active/{addressForActive}', [AddressController::class, 'activeAddressStudent'])->name('address.activeAddressStudent');
