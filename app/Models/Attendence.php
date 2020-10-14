<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendence extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'attendence_date',
        'status'
    ];
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function user_profile(){
        return $this->belongsTo('App\Models\UserProfile');
    }
}
