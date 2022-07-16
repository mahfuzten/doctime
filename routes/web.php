<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login',[ FrontendController::class,'showLoginPage' ])-> name('login.page');

Route::get('/patient-register',[ FrontendController::class,'showPatientRegisterPage' ])-> name('patient.reg.page');
Route::get('/patient-dashboard',[ FrontendController::class,'showPatientDashPage' ])-> name('patient.dash.page');

Route::get('/doctor-register',[ FrontendController::class,'showDoctorRegisterPage' ])-> name('doctor.reg.page');
Route::get('/doctor-dashboard',[ FrontendController::class,'showDoctorDashPage' ])-> name('doctor.dash.page');

