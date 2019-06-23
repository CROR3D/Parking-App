<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parking;

class ParkingsController extends Controller
{
    public function selectParking()
    {
        $city_list = Parking::select('city')->distinct()->orderBy('city', 'ASC')->get();
        $parking_list = Parking::all();
        $city_values = [];
        $parking_values = [];
        $count = 0;

        foreach($city_list as $city) {
            $city_values[$city->city] = $count++;
        }

        foreach ($parking_list as $parking) {
            $parking_values[$parking->slug] = $city_values[$parking->city];
        }

        $view = [
            'city_list' => $city_list,
            'parking_list' => $parking_list,
            'city_values' => $city_values,
            'parking_values' => $parking_values
        ];

        return view('centaur.user.parkings.select')->with($view);
    }

    public function getParking()
    {

    }
}
