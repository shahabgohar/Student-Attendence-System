<?php

namespace App\Models;

use App\ReuseableCode\InitModelWithProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory, InitModelWithProperties;
    protected $fillable = [
      'attendence_detail_id'
    ];
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
    public function user(){
        return $this->belongsTo('App\Models\User');
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
