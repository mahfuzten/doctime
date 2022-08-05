<?php

namespace App\Http\Controllers\Auth;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    public function register(Request $request)
    {
        
        
        $this -> validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'      => 'required',
            'pass'  => 'required|confirmed',
        ]);
        
        $patient=Patient::create([
            'name'      => $request -> name,
            'email'     => $request -> email,
            'mobile'    => $request -> mobile,
            'password'  => password_hash($request -> pass, PASSWORD_DEFAULT),

        ]);
    return redirect() -> route('patient.reg.page') -> with('success', "Hi . $patient->name . , your account is created");
    }
    public function login(Request $request)
    {
        
        
        $this -> validate($request, [
        
            'email'     => 'required',
            'password'      => 'required',
        ]);
       if(Auth::guard('patient') -> attempt(['email' => $request -> email, 'password' => $request -> password])
       ||Auth::guard('patient') -> attempt(['mobile' => $request -> email, 'password' => $request -> password])){

            return redirect() -> route('patient.dash.page');
       }else{
            return redirect() -> route('login.page');
       }
       
    }
    public function logout(){
        Auth::guard('patient') -> logout();
        return redirect() -> route('login.page');
    
    }
}
