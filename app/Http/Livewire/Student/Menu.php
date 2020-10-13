<?php

namespace App\Http\Livewire\Student;

use App\ReuseableCode\MarkAttendence;
use App\ReuseableCode\ProvideDate;
use Livewire\Component;


class Menu extends Component
{
    use ProvideDate, MarkAttendence;

    public function render()
    {
        return view('livewire.student.menu')
            ->extends('layouts.app')
            ->section('content')
            ;
    }

    public function markAttendence(){
        if($this->markAttendence("present")) \session()->put(['attendence'=>' Your Attendence has been submitted ']);
        else \session()->put(['']);

    }
    public function markLeave(){
        return redirect(route('submit-leave'));
    }
    public function viewAttendence(){
        return redirect(route('view-attendence-page'));
    }
}
