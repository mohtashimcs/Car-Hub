<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Car extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='cars';
    protected $fillable = [
        'name',
        'type',
        'price',
        'color',
        'description',
        'number_of_cars',
        'picture',
    ];

    public function city()
        {
            return $this->belongsTo(city::class);
        }
        public function regions(){
            return $this->belongsToMany(region::class, 'region_car','cars_id','regions_id');
        }
        public function users(){
            return $this->belongsToMany(User::class, 'users_cars','car_id','user_id');
        }

}
