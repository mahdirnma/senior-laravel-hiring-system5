<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function managerLoginForm(){
        return view('auth.manager.login');
    }
/*    public function applicantLoginForm(){
        return view('auth.applicant.login');
    }*/

    public function managerLogin(LoginRequest $request)
    {
        $myData=$request->only('email','password');
        if (!Auth::guard('managers')->attempt($myData)) {
            return redirect()->back();
        }
        return redirect()->intended(route('manager.dashboard'));
    }
/*    public function applicantLogin(LoginRequest $request){
        $myData=$request->only('email','password');
        if (!Auth::guard('applicants')->attempt($myData)) {
            return redirect()->back();
        }
        return redirect()->intended(route('applicant.dashboard'));
    }
*/
    public function managerLogout()
    {
        Auth::guard('managers')->logout();
        return redirect()->route('manager.login');
    }
}
