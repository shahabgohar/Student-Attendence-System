<?php

namespace App\Http\Livewire;

use App\Models\AttendenceDetail;
use App\Models\UserProfile;
use App\Rules\ClassIdShouldNotBeInAttendenceDetails;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateAttendence extends Component
{
    public $enter_class = null;
    public $attendence_date = null;
    public $from_time = null;
    public $to_time = null;
    public $rules = [
      'enter_class' => ['required','exists:student_classes,id'],
        'attendence_date' => 'required',
        'from_time' => 'required',
        'to_time' => 'required'
    ];
    public function render()
    {
        return view('livewire.create-attendence')
            ->extends('layouts.app')
            ->section('content');

    }
    public function createAttendence(AttendenceDetail $attendenceDetail){
        $this->validate($this->rules);
        if(AttendenceDetail::where([
            ['student_class_id','=',$this->enter_class],
            ['attendence_date','=',$this->attendence_date]
        ])->exists())
        {
            session()->put(['class_error'=>'Attendence against class '.$this->enter_class.' having date of '.$this->attendence_date.' already exist']);

        }else{
               $attendenceDetail->student_class_id = $this->enter_class;
               $attendenceDetail->attendence_date = $this->attendence_date;
               $attendenceDetail->start_time = $this->from_time;
               $attendenceDetail->end_time = $this->to_time;
               $result = $attendenceDetail->save();

               if($result){
                   UserProfile::
                   where('student_class_id','=',$this->enter_class)
                       ->update(['attendence_detail_id'=>$attendenceDetail->id]);
                   session()->put(['success'=>'Attendence has been created Successfully']);
               }else{
                   session()->put(['error'=>'Attedence creation failed']);
               }
        }

//        dd('here');
    }
}
