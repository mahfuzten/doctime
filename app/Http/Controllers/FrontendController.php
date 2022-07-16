<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function showHomePage()
    {
        return view('frontend.home');
    }
    
    public function showLoginPage()
    {
        return view('frontend.login');
    }
    public function showPatientRegisterPage()
    {
        return view('frontend.patient.register');
    }
    public function showPatientDashPage()
    {
        return view('frontend.patient.dashboard');
    }
    public function showDoctorRegisterPage()
    {
        return view('frontend.doctor.register');
    }
    public function showDoctorDashPage()
    {
        return view('frontend.doctor.dashboard');
    }
}
