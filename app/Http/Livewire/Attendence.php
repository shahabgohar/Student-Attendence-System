<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Attendence extends Component
{
    public $searchOptions=[
        'search by Name' => 'name',
        'search by Class' => 'class',
        'search by Email'=> 'email',
        'search by Roll Number'=> 'rollNumber'
        ];
    public function render()
    {
        return view('livewire.attendence')
            ->extends('layouts.app')
            ->section('content');
    }
}
