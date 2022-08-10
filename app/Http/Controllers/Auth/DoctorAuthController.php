<?php

namespace App\Http\Controllers\Auth;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    public function register(Request $request){

       
        $this -> validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required',
            'pass'      => 'required|confirmed',
        ]);
        
        $doctor=Doctor::create([
            'name'      => $request -> name,
            'email'     => $request -> email,
            'mobile'    => $request -> mobile,
            'password'  => password_hash($request -> pass, PASSWORD_DEFAULT),

        ]);
        return redirect()->route('doctor.reg.page') -> with('success',"Hi .$doctor->name. , your account is created");
    }
    public function login(Request $request)
    {
        
        
        $this -> validate($request, [
        
            'email'     => 'required',
            'password'      => 'required',
        ]);
       if(Auth::guard('doctor') -> attempt(['email' => $request -> email, 'password' => $request -> password])
       ||Auth::guard('doctor') -> attempt(['mobile' => $request -> email, 'password' => $request -> password])){

            return redirect() -> route('doctor.dash.page');
       }else{
            return redirect() -> route('login.page');
       }
       
    }
    public function logout(){
        Auth::guard('doctor') -> logout();
        return redirect() -> route('login.page');
    
    }
   
}
