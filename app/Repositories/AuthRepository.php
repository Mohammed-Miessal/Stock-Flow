<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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


    public function forgetPassword($data)
    {
        $user = $this->user::where('email', $data['email'])->first();

        if ($user) {
        // Check if there's an existing token record for the user
        $existingToken = DB::table('password_reset_tokens')->where('email', $user->email)->first();

        // If there's an existing token and its expiration date has passed, delete it
        if ($existingToken && Carbon::parse($existingToken->expires_at)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            $existingToken = null; // Reset $existingToken after deletion
        }

        // If no token exists or the existing token has expired, insert a new token
        if (!$existingToken) {
            $token = Str::random(64);
            $expiresAt = now()->addMinutes(1);
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
                'expires_at' => $expiresAt,
            ]);

            Mail::send('emails.forget-password', ['token' => $token , 'user' => $user], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Reset Password');
            });
        }

        return $user;
        }
        return false;
    }


    public function resetPassword($data)
    {
        $tokenData = DB::table('password_reset_tokens')
                        ->where('token', $data['token'])
                        ->first();

        if ($tokenData && Carbon::parse($tokenData->expires_at)->isFuture()) {
            $user = $this->user::where('email', $tokenData->email)->first();
            $user->update([
                'password' => Hash::make($data['password'])
            ]);

            DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            return $user;
        }else{
            Session::flash('error', 'Token is invalid or expired');
            return false;
        }

    }
}
