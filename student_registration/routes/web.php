<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\AttendedSchoolController;
use App\Http\Controllers\ResponsiblyController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/foo', function () {
    return view('components.forms.forms');
});

Route::middleware(['auth'])->group(function () {
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

    Route::get('/attendedSchools/{student}', [AttendedSchoolController::class, 'create'])->name('attendedSchool.create');
    Route::post('/attendedSchools/{student}', [AttendedSchoolController::class, 'storeWithStudent'])->name('attendedSchool.storeWithStudent');
    Route::get('/attendedSchools/{address}', [AttendedSchoolController::class, 'edit'])->name('attendedSchool.edit');
    Route::put('/attendedSchools/{address}', [AttendedSchoolController::class, 'update'])->name('attendedSchool.update');
    // Route::put('/attendedSchools/{student}/active/{addressForActive}', [AttendedSchoolController::class, 'active'])->name('attendedSchools.active');
});

Route::get('/', function () {
    return view('layouts.home');
})->middleware(['auth'])->name('home');

require __DIR__ . '/auth.php';
