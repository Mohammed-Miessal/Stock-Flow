<?php 

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($data)
    {
        
        $user = $this->user::where('email', $data['email'])->first();
        if ($user) {
            if (password_verify($data['password'], $user->password)) {
                Auth::login($user);
                return $user;
            }
        }
        return false;
    }

    public function logout()
    {
        Auth::logout(); 
        Session::flush(); 
        return true;
    }
}
