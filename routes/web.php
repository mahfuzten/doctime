<?php

use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Models\Doctor;
use Illuminate\Auth\Events\Login;

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

Route::get('/',[ FrontendController::class,'showHomePage' ])-> name('home.page');
Route::get('/login',[ FrontendController::class,'showLoginPage' ])-> name('login.page')->middleware('admin.redirect');
Route::get('/dlogin',[ FrontendController::class,'showdLoginPage' ])-> name('dlogin.page')->middleware('admin.redirect');

Route::get('/patient-register',[ FrontendController::class,'showPatientRegisterPage' ])-> name('patient.reg.page')->middleware('admin.redirect');
Route::get('/patient-dashboard',[ FrontendController::class,'showPatientDashPage' ]) -> name('patient.dash.page')-> middleware('admin');
Route::get('/patient-settings',[ PatientProfileController::class,'showPatientSettingsPage' ]) -> name('patient.settings.page')-> middleware('admin');
Route::get('/patient-password',[ PatientProfileController::class,'showPatientPasswordPage' ]) -> name('patient.password.page')-> middleware('admin');
Route::post('/patient-password',[ PatientProfileController::class,'patientPasswordChange' ]) -> name('patient.password.change')-> middleware('admin');

Route::post('/patient-register', [PatientAuthController::class, 'register'])-> name('patient.register');
Route::post('/patient-login', [PatientAuthController::class, 'login'])-> name('patient.login');
Route::get('/patient-logout', [PatientAuthController::class, 'logout'])-> name('patient.logout');


Route::get('/doctor-register', [FrontendController::class, 'showDoctorRegisterPage'])-> name('doctor.reg.page');
Route::get('/doctor-dashboard',[ FrontendController::class,'showDoctorDashPage' ])-> name('doctor.dash.page');
Route::post('/doctor-register',[ DoctorAuthController::class,'register' ])-> name('doctor.register');
Route::post('/doctor-login', [ DoctorAuthController::class, 'login'])-> name('doctor.login');
Route::get('/doctor-logout', [ DoctorAuthController::class, 'logout'])-> name('doctor.logout');