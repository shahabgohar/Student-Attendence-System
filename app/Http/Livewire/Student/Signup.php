<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Signup extends Component
{
    public function render()
    {
        return view('livewire.student.signup')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
