<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LeaveApproval extends Component
{
    public function render()
    {
        return view('livewire.leave-approval')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
