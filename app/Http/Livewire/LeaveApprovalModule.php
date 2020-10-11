<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LeaveApprovalModule extends Component
{
    public function render()
    {
        return view('livewire.leave-approval-module')
            ->extends('layouts.app')
            ->section('content')
            ;
    }
}
