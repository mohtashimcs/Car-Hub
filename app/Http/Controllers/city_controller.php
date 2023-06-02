<?php

namespace App\Http\Controllers;
use App\Models\city;

use Illuminate\Http\Request;

class city_controller extends Controller
{
    //
    public function create(){
        return view('Test/create');
    }
    public function store(Request $request){
        $cities = new city; // Must import the Model file: use App\Student;
        $cities->name = $request->get('name');

        $cities->save(); /* Store data inside the table */
    }

}
