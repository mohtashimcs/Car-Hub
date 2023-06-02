<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    //Subject.php
    public function Cars(){
        return $this->belongsToMany(Car::class, 'region_car');
    }
    public function Carhubs(){
        return $this->belongsToMany(Carhub::class, 'regionhub');
    }

}
