<?php
namespace App\ReuseableCode;
use App\Models\User;

trait RoleCheckForLogin{
    public function checkForRole(){
        $user = User::where(
            'email' ,'=', $this->email
        )->first();
        $role = $user->roles()->first();
        if($role->role === 'admin'){
            return true;
        }
        return false;
    }
}
