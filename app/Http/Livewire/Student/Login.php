<?php

namespace App\Http\Livewire\Student;

use App\ReuseableCode\RoleCheckForLogin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    use RoleCheckForLogin;
    public $email = null;
    public $password = null;

    protected $rules = [
      'email' => 'required|exists:users,email',
      'password' => 'required'
    ];

    public function login_user(){
        $this->validate($this->rules);
        if(!$this->checkForRole()){
//            it is a user
            if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
                return redirect(route('student-home'));
            }
        }else{
            session()->put(['ability'=>'I know you but you are not allowed here !!!']);
        }
    }
    public function render()
    {
        return view('livewire.student.login')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
