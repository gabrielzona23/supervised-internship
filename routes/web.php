<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\AttendedSchoolController;
use App\Http\Controllers\ResponsiblyController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VaccineController;

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
    return view('school.school_form');
});

Route::middleware(['auth'])->prefix('matricula')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    // Route::resource('addresses', AddressController::class);
    // Route::resource('responsiblies', ResponsiblyController::class);
    Route::resource('registrations', RegistrationController::class);
    Route::resource('anamneses', AnamneseController::class)->parameters([
        'anamneses' => 'student'
    ]);

    Route::get('/vaccine/{registration}/create', [VaccineController::class, 'create'])->name('vaccine.create');
    Route::post('/vaccine/{registration}/student', [VaccineController::class, 'vaccineStudent'])->name('vaccine.vaccineStudent');
    Route::post('/vaccine', [VaccineController::class, 'store'])->name('vaccine.store');

    Route::get('/students/registration/{registration}', [StudentController::class, 'editRegistrationStudent'])->name('students.editRegistrationStudent');
    Route::put('/students/registration/{registration}', [StudentController::class, 'update_registration'])->name('students.update_registration');
    Route::get('student_form/{student}/editForm', [StudentController::class, 'editForm'])->name('students.editForm');

    Route::get('responsible/{registration}/create', [ResponsiblyController::class, 'create'])->name('responsible.create');
    Route::post('responsible/{registration}/store', [ResponsiblyController::class, 'store'])->name('responsible.store');
    Route::get('responsible/{responsible}/edit', [ResponsiblyController::class, 'edit'])->name('responsible.edit');
    Route::get('responsible/{responsible}/show', [ResponsiblyController::class, 'show'])->name('responsible.show');
    Route::put('responsible/{responsible}/update', [ResponsiblyController::class, 'update'])->name('responsible.update');
    Route::put('/registration/{registration}/responsible/{responsibleForActive}/active', [ResponsiblyController::class, 'activeResponsibleStudent'])->name('responsible.activeResponsibleStudent');

    Route::get('/address/{student}/create', [AddressController::class, 'createAddressStudent'])->name('address.createAddressStudent');
    Route::post('/address/{student}', [AddressController::class, 'storeAddressStudent'])->name('address.storeAddressStudent');
    Route::get('/address/{address}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::get('/address/{address}/show', [AddressController::class, 'show'])->name('address.show');
    Route::put('/address/{address}/update', [AddressController::class, 'update'])->name('address.update');
    Route::put('/address/{student}/active/{addressForActive}', [AddressController::class, 'activeAddressStudent'])->name('address.activeAddressStudent');

    Route::get('/attendedSchools/{student}/create', [AttendedSchoolController::class, 'create'])->name('attendedSchool.create');
    Route::post('/attendedSchools/{student}', [AttendedSchoolController::class, 'storeWithStudent'])->name('attendedSchool.storeWithStudent');
    Route::get('/attendedSchools/{attendedSchool}/show', [AttendedSchoolController::class, 'show'])->name('attendedSchool.show');
    Route::get('/attendedSchool/{attendedSchool}', [AttendedSchoolController::class, 'editSchool'])->name('attendedSchool.edit');
    Route::put('/attendedSchools/{attendedSchool}', [AttendedSchoolController::class, 'update'])->name('attendedSchool.update');
    // Route::put('/attendedSchools/{student}/active/{addressForActive}', [AttendedSchoolController::class, 'active'])->name('attendedSchools.active');
});

Route::get('/matricula', function () {
    return view('layouts.home');
})->middleware(['auth'])->name('home');

require __DIR__ . '/auth.php';
