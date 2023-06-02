<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region;
use App\Models\Carhub;

class crud extends Controller
{
    //
    public function create(){
        $regions=region::all();
        $cars=Carhub::all();
        return view('crud/create')->with(['cars'=> $cars])->with(['regions'=> $regions]);
    }
    public function store(Request $request){
        $cars = new Carhub; // Must import the Model file: use App\Student;
        $cars->name = $request->get('name');
        $region = region::find($request->get('region'));
        $cars->save(); /* Store data inside the table */
        $cars->regions()->attach($region->id);
    }
    public function edit(){
        $regions=region::all();
        $cars = Carhub::all();
        return view('crud/create')->with(['cars'=> $cars])->with(['regions'=> $regions]);
    }
    public function update(Request $request){
        $car = Carhub::find($request->id);
        $region = region::find($request->get('region'));
        $car->regions()->sync($region->id);
        $cars->save(); /* Store data inside the table */
    }
}
