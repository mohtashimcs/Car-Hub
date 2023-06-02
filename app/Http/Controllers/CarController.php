<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use App\Models\city;
use App\Models\region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\users_cars;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        if (Auth::user()->role == 'Administrator') {
            $OraderCount = Order::where('status', '=', 'incomplete')->count();
        } else {
            $OraderCount = Order::where('user_id', '=', Auth::user()->id)->where('status', '=', 'incomplete')->count();
        }
        $myProfile = User::find(Auth::user()->id)->Profile;
        $user_id=$myProfile->id;
        //$cars = Car::find($user_id);
        //ar->user()
        //$cars = Car::where('number_of_cars', '>', 0)->latest()->paginate(10);
        $cars = Auth::user()->cars;
        
        
        //$cars = DB::table('users_cars')->join(
        //    'cars', 'users_cars.car_id', '=', 'cars.id')->where('users_cars.user_id', $user_id)->get();
        $cities = city::all();
        $regions=region::all();
        
        return view('cars.index', compact('myProfile', 'cars', 'OraderCount'))->with(['cities' => $cities])->with(['regions'=> $regions]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Administrator') {
            $OraderCount = Order::where('status', '=', 'incomplete')->count();
        } else {
            $OraderCount = Order::where('user_id', '=', Auth::user()->id)->where('status', '=', 'incomplete')->count();
        }
        $cities = city::all();
        $regions=region::all();
        $myProfile = User::find(Auth::user()->id)->Profile;
        return view('cars.create', compact('myProfile','OraderCount'))->with(['cities' => $cities])->with(['regions'=> $regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'color' => 'required',
            'description' => 'required',
            'number_of_cars' => 'required',
            'picture' => 'required',
        ]);
        if ($request->hasFile($request->input('picture'))) {
            $car = new Car();
            $file = $request->file('picture');
            $extension  = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('users/cars', $fileName);
            $request->picture = $fileName;
            $input = $request->all();
            $car->city_id = $request->get('city');
            $region = region::find($request->get('region'));
            $car->fill($input)->save();
            $car->picture = $fileName;
            $myProfile = User::find(Auth::user()->id)->Profile;
            $car->save();
            $car->regions()->attach($region->id);
            $car->users()->attach($myProfile->id);
            return redirect()->back()->with('success', 'New Car Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == 'Administrator') {
            $OraderCount = Order::where('status', '=', 'incomplete')->count();
        } else {
            $OraderCount = Order::where('user_id', '=', Auth::user()->id)->where('status', '=', 'incomplete')->count();
        }
        $car = Car::find($id);
        $myProfile = User::find(Auth::user()->id)->Profile;
        $regions=region::all();
        return view('cars.edit', compact('car', 'myProfile','OraderCount'))->with(['regions'=> $regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'color' => 'required',
            'description' => 'required',
            'number_of_cars' => 'required',
        ]);
        $car = Car::find($request->id);
        $input = $request->all();
        $region = region::find($request->get('region'));
        $car->regions()->sync($region->id);
        $car->fill($input)->save();
        if ($request->hasFile($request->input('picture'))) {
            $file = $request->file('picture');
            $extension  = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('users/cars', $fileName);
            $request->picture = $fileName;
            $car->picture = $fileName;
            $region = region::find($request->get('region'));
            $car->save();
        }
        return redirect()->route('cars-index')->with('success', 'Car Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $region = region::find($id);
        $car->regions()->detach($region);
        $myProfile = User::find(Auth::user()->id)->Profile;
        $car->users()->detach($myProfile->id);
        $car->delete();
        return redirect()->route('cars-index')->with('success', 'Car Deleted successfully');
    }
    public function file_download($file){
        return response()->download(public_path('users/cars/'.$file));
        }
        
}
