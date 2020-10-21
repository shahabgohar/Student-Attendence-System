<?php
namespace App\Http\Livewire\Student;

use App\Models\StudentClass;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Signup extends Component
{
    use WithFileUploads;
    public $form = [];
    public function mount(){
        $this->form['first_name']=null;
        $this->form['last_name']=null;
        $this->form['mid_name']=null;
        $this->form['email']=null;
        $this->form['password']= null;
        $this->form['father_name']=null;
        $this->form['student_class_id']=null;
        $this->form['roll_number']=null;
        $this->form['gender']=null;
        $this->form['photo']=null;
    }
    protected $rules = [
        'form.first_name' => 'required',
        'form.last_name' => 'required',
        'form.email' => 'required|email|unique:users,email',
        'form.class' => 'integer|max:12',
        'form.roll_number'=>'integer|required',
        'form.gender' => 'required',
        'form.photo' => 'required',
        'form.father_name' => 'required',
        'form.password' => 'required'
    ];
    public function render()
    {
        return view('livewire.student.signup')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
    public function signUpUser(){

            $this->validate($this->rules);
//            creating the user
        $user = new User();
        $user->initiWithValues('users',$this->form);
        $result = $user->save();
        if ($result){
            $class = StudentClass::find($this->form['student_class_id']);
//        setting up user profile
            $profile  = new UserProfile();
            $profile->initiWithValues('user_profiles',$this->form);
            $this->form['photo']->storeAs('users',$user->id);
            $profile->profile_photo = 'users/'.$user->id;
            $profile->student_class()->associate($class);
            $isProfileCreated = $user->user_profile()->save($profile);
            if ($isProfileCreated){
                $user->roles()->attach(2);
            }
        }
//            login the user
        Auth::login($user);
       return redirect('/');


    }
}
