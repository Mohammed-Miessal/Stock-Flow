<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->auth->login($data);

        if ($user) {
        return redirect()->route('home');
        }else{
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect()->route('login');
    }

    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function forgetPasswordPost()
    {
        $data = request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = $this->auth->forgetPassword($data);

        if ($user) {
            // return redirect()->route('forget-password');
            return back()->withInput()->with('success', 'Reset password link sent to your email');
        }else{
            return back()->withInput()->withErrors(['email' => 'Invalid email']);
        }
    }

    public function resetPassword($token)
    {
        return view('auth.reset-password' , compact('token'));
    }

    public function resetPasswordPost($token)
    {
        $data = request()->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $data['token'] = $token;

        $user = $this->auth->resetPassword($data);

        if ($user) {
            return redirect()->route('login');
        }else{
            return back()->withInput()->withErrors(['password' => 'Invalid token']);
        }
    }
}
