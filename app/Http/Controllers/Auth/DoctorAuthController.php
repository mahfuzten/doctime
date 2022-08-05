<?php

namespace App\Http\Controllers\Auth;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorAuthController extends Controller
{
    public function register(Request $request){

       
        $this -> validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'      => 'required',
            'pass'  => 'required|confirmed',
        ]);
        
        $doctor=Doctor::create([
            'name'      => $request -> name,
            'email'     => $request -> email,
            'mobile'    => $request -> mobile,
            'password'  => password_hash($request -> pass, PASSWORD_DEFAULT),

        ]);
        return redirect()->route('doctor.reg.page') -> with('success',"Hi .$doctor->name. , your account is created");
    }
   
}
