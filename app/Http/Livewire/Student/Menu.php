<?php

namespace App\Http\Livewire\Student;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        if(Gate::allows('mark-attendence')){
            dd(Gate::allows('mark-attendence'));
        }
        return view('livewire.student.menu')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
