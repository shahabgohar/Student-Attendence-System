<?php

namespace App\Http\Livewire;

use App\Models\StudentClass;
use App\Models\UserProfile;
use Livewire\Component;

class Dashboard extends Component
{
    public $total_students = null;
    public $total_classes = null;
    public $attendence_percentage = null;

    public function getTotalStudents(UserProfile  $userProfile){
        $this->total_students = $userProfile::count();
    }
    public function getTotalClasses(StudentClass $studentClass){
        $this->total_classes = $studentClass::count();
    }
    public function  getAttendencePercentage(\App\Models\Attendence $attendence){
        $totalAttendence = $attendence::count('id');
        $presentAttendence = $attendence::where('status','=','present')->count();
        $this->attendence_percentage = (float) ($presentAttendence/$totalAttendence)*100;
    }
    public function mount(UserProfile $userProfile,StudentClass $studentClass,\App\Models\Attendence $attendence){
        $this->getTotalStudents($userProfile);
        $this->getTotalClasses($studentClass);
        $this->getAttendencePercentage($attendence);
    }
    public function render()
    {

        return view('livewire.dashboard');
    }
    public function toSomeThing(){
        dd('here');
    }
}
