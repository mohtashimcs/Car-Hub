<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_user extends Model
{
    protected $primaryKey = 'car_id';
    public $timestamps = false;
    use HasFactory;
    protected $table='users_cars';
    public function Car(){
        return $this->belongsTo(Car::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
