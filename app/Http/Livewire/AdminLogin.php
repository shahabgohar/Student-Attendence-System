<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\ReuseableCode\checkForUserRole;
use App\ReuseableCode\RoleCheckForLogin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AdminLogin extends Component
{
    use RoleCheckForLogin;
    public $login = "login";
    public $email= null;
    public $password = null;
    protected $rules= [
      'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ];
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];


    public function login_user(){

     $validatedData = $this->validate(
         $this->rules
     );

        if($this->checkForRole()){
            if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
                return $this->redirectRoute('admin-dashboard');
            }else{
               \session(['error-general'=>'Failed to login User']);

            }
        }else{
            dd('not a admin');
        }

    }
    public function render()
    {

            return view('livewire.admin-login')
                ->extends('layouts.app')
                ->section('content');


    }

}
