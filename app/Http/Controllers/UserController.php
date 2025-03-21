<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;

class UserController extends Controller
{
    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $this->sendOtp($user);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful, please verify your email',
            'user_id' => $user->id
        ], 201);
    }

    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';
        $data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('mailVerification', ['data'=>$data], function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        $userData = User::where('email',$request->email)->first();

        if(!$userData) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        if($userData->is_verified == 0){
            $this->sendOtp($userData);
            return response()->json([
                'success' => false,
                'message' => 'Email verification required',
                'user_id' => $userData->id
            ], 403);
        }

        if(Auth::attempt($userCredential)){
            $token = $userData->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => [
                    'id' => $userData->id,
                    'name' => $userData->name,
                    'email' => $userData->email
                ]
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Username & Password is incorrect'
        ], 401);
    }

    public function loadDashboard()
    {
        if(Auth::user()){
            return response()->json([
                'success' => true,
                'message' => 'Welcome to dashboard',
                'user' => Auth::user()
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        
        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
        
        if($user->is_verified == 1){
            return response()->json([
                'success' => true,
                'message' => 'Email already verified'
            ], 200);
        }

        $this->sendOtp($user);

        return response()->json([
            'success' => true,
            'message' => 'OTP sent to email',
            'email' => $user->email
        ], 200);
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        
        if(!$otpData){
            return response()->json([
                'success' => false,
                'msg' => 'You entered wrong OTP'
            ], 400);
        }

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){
            User::where('id',$user->id)->update([
                'is_verified' => 1
            ]);
            return response()->json([
                'success' => true,
                'msg' => 'Mail has been verified'
            ], 200);
        }
        
        return response()->json([
            'success' => false,
            'msg' => 'Your OTP has been Expired'
        ], 400);
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        if(!$user || !$otpData){
            return response()->json([
                'success' => false,
                'msg' => 'User not found'
            ], 404);
        }

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){
            return response()->json([
                'success' => false,
                'msg' => 'Please try after some time'
            ], 429);
        }

        $this->sendOtp($user);
        return response()->json([
            'success' => true,
            'msg' => 'OTP has been sent'
        ], 200);
    }
}