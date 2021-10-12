<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    public function showLogin()
    {
        return response()->view('cms.login');
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
            'remember_me' => 'required|boolean',
        ], [
            'email.required' => 'Please Enter Your Email',
            'email.email' => 'Please Enter Valid Email',
            'password.required' => 'Please Enter Your Password'
        ]);
        $credinntials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        if (!$validator->fails()) {
            // if (Auth::guard('web')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->get('remember_me')));
            if (Auth::guard('web')->attempt($credinntials, $request->get('remember_me'))) {
                Auth::guard('web')->user()->assignRole('Super-Admin');
                return response()->json(['message' => 'Logged  In Successfully'], 200);
            }else{
                return response()->json(['message'=>'error credintials'],400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
    public function editProfile()
    {
    }
    public function updateProfile()
    {
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
