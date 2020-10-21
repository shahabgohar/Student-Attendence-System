<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AttendenceDetails extends Component
{
    public function render()
    {
        return view('livewire.attendence-details')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
