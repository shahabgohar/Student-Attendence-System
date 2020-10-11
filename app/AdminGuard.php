<?php


namespace App;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminGuard implements Guard
{
        public function __construct(){
            dd('here');
        }
    public function check()
    {
        Log::alert('check');
        echo 'here';
//        $user = Auth::user();
//        $role = $user->roles()->get()[0];
//        if($user!== null){
//            if($role->role === 'admin'){
//                return true;
//            }
//        }
//        return false;
        dd('check');
    }

    public function guest()
    {
        echo 'here';
        Log::alert('check');
        dd('guest');
    }

    public function user()
    {
        echo 'here';
        Log::alert('check');
        dd('user');
    }

    public function id()
    {
        echo 'here';
        Log::alert('check');
        dd('id retreive');
    }

    public function validate(array $credentials = [])
    {
        echo 'here';
        Log::alert('check');
        dd($credentials);
    }

    public function setUser(Authenticatable $user)
    {
        Log::alert('check');
        echo 'here';
        dd($user);
    }
}
