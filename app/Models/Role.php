<?php

namespace App\Models;

use App\ReuseableCode\InitModelWithProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, InitModelWithProperties;
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
