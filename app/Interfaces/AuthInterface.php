<?php

namespace App\Interfaces;

interface AuthInterface
{
    public function login($data);
    public function logout();
    public function forgetPassword($data);
    public function resetPassword($data);
}