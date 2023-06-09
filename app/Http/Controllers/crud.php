<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region;
use App\Models\Carhub;
use App\Models\City;
use App\Models\User;
use App\Models\Car;
use App\Models\Car_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class crud extends Controller
{
    public function index()
    {
        $many= car_user::all();
        return view('crud/index', compact('many'));
    }
    //
    public function create(){
        $regions=region::all();
        $cars=Carhub::all();
        return view('crud/create')->with(['cars'=> $cars])->with(['regions'=> $regions]);
    }
    // public function store(Request $request){
    //     $cars = new Carhub; // Must import the Model file: use App\Student;
    //     $cars->name = $request->get('name');
    //     $region = region::find($request->get('region'));
    //     $cars->save(); /* Store data inside the table */
    //     $cars->regions()->attach($region->id);
    // }
    public function edit($id){
        $many= car_user::where('car_id',$id)->first();
        $User= User::all();
        return view('crud/edit', compact('many','User'));
    }
    public function update(Request $request){
        $many = car_user::where('car_id',$request->id)->first();
        $many->user_id=$request->get('user');
        //$car->users()->sync(user);
        //$many->user_id=$user->id;
        $many->save(); /* Store data inside the table */
        return redirect('crud/index')->with('success', 'Car Updated successfully');
    }
    public function destroy($id)
    {
        $many = car_user::where('car_id',$id)->first();
        $many->delete();
        return redirect('crud/index')->with('success', 'Car Deleted successfully');
    }
}
