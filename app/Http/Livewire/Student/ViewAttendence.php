<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class ViewAttendence extends Component
{
    public function render()
    {
        return view('livewire.student.view-attendence')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
