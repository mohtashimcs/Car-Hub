<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carhub extends Model
{
    use HasFactory;
    public function regions(){
        return $this->belongsToMany(region::class, 'regionhub','cars_id','regions_id');
    }
}
