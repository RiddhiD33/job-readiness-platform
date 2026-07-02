<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'role' => 'required|in:student,recruiter,admin',
    ]);

    $user = User::create($validated);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully.',
        'user' => $user,
        'token' => $token,
    ]);
}
    public function login(Request $request){
        $validated =$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:8',
        ]);

        $user = User::where('email',$validated['email'])->first();

        if(!$user){
            return response()->json([
                'message'=>'Invalid Credentials'
            ],401);
        }

        if(!Hash::check($validated['password'], $user->password)){
            return response()->json([
                'message'=>'Invalid Credentails'
            ],401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=>'User Logged Successfull',
            'user'=>$user,
            'token'=>$token,

        ]);

}
        public function logout(Request $request){
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message'=>'User logged out succesfully.'
            ]);
        }
    }



