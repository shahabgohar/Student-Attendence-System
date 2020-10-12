<?php

namespace App\Http\Livewire\Student;

use App\Models\Attendence;
use App\ReuseableCode\ProvideDate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use MongoDB\Driver\Session;

class Menu extends Component
{
    use ProvideDate;


    public function render()
    {
        return view('livewire.student.menu')
            ->extends('layouts.app')
            ->section('content')
            ;
    }

    public function markAttendence(){
        $userProfile = Auth::user()->user_profile()->first();
        $result = DB::table('attendences')->insert([
            'attendence_date' => $this->provideDate(),
            'status' => 'present',
            'student_class_id' => $userProfile->student_class_id,
            'user_profile_id' => $userProfile->id,
            'attendence_detail_id' => $userProfile->attendence_detail_id
        ]);
        if($result) \session()->put(['attendence'=>' Your Attendence has been submitted ']);
        else \session()->put(['']);

    }
}
