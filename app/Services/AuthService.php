<?php

namespace App\Services;

use App\Interfaces\AuthInterface;

class AuthService{
    
        protected $auth;
    
        public function __construct(AuthInterface $auth)
        {
            $this->auth = $auth;
        }
    
        public function login($data)
        {
            $user = $this->auth->login($data);
            return $user;
        }
    
        public function logout()
        {
            $user = $this->auth->logout();
            return $user;
        }

        public function forgetPassword($data)
        {
            $user = $this->auth->forgetPassword($data);
            return $user;
        }

        public function resetPassword($data)
        {
            $user = $this->auth->resetPassword($data);
            return $user;
        }
}
