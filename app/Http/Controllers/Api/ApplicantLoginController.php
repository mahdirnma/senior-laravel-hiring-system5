<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApplicantLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user=Applicant::where('email',$request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token=$user->createToken('applicant-token')->plainTextToken;
            return response()->json([
                'token'=>$token,
                'user'=>$user,
            ]);
        }
        return response()->json('Unauthorize',401);
    }
}
