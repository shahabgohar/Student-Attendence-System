<?php

namespace App\Http\Livewire\Student;
use Illuminate\Http\Request as Request;
use Livewire\Component;

class SubmitLeave extends Component
{
    public $application = null;
    public function render()
    {
        return view('livewire.student.submit-leave')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
    public function submitLeave(){
        dd($this->application);
    }
}
