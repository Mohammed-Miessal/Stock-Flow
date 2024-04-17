<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function showLoginForm()
    {
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
}
