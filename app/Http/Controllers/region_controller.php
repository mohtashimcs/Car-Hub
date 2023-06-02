<?php

namespace App\Http\Controllers;
use App\Models\region;

use Illuminate\Http\Request;

class region_controller extends Controller
{
    //
    public function create(){
        return view('Test/addregion');
    }
    public function store(Request $request){
        $regions = new region; // Must import the Model file: use App\Student;
        $regions->name = $request->get('region');

        $regions->save(); /* Store data inside the table */
    }
}
