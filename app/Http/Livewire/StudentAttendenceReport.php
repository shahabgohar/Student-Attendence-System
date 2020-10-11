<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StudentAttendenceReport extends Component
{
    public $roll_number = null;
    public $student_class_id = null;
    public $from_date = null;
    public $to_date = null;

    protected $rules = [
      'roll_number' => 'required|integer',
        'student_class_id' => 'required|max:12|exists:StudentClass,id|inetger',
        'from_date' => 'required'
    ];

    public function render()
    {
        return view('livewire.student-attendence-report')
            ->extends('layouts.app')
            ->section('content');
    }
    public function submitReport (){

    }
}
