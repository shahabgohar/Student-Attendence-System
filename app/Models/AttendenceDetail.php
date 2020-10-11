<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
       'student_class_id',
        'attendence_date',
        'start_time',
        'end_time'
    ];
    public function user_profiles(){
        return $this->hasMany('App\Models\UserProfile');
    }
}
