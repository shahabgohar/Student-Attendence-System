<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    public function student_class()
    {
        return $this->belongsTo('App\Models\StudentClass');
    }
    public function attendences(){
        return $this->hasMany('App\Models\Attendence');
    }
    public function attendence_detail(){
        return $this->belongsTo('App\Models\AttendenceDetail');
    }
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query,$type)
    {
        return $query->where([
            ['roll_number','=',$type[0]],
            ['student_class_id','=',$type[1]]
        ]);
    }
}
