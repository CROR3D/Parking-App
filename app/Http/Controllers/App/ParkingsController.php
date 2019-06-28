<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parking;

class ParkingsController extends Controller
{
    public function selectParking(Request $request)
    {
        $city_list = Parking::select('city')->distinct()->orderBy('city', 'ASC')->get();
        $parking_list = Parking::all();
        $city_values = $parking_values = [];
        $count = 0;

        foreach ($city_list as $city) {
            $city_values[$city->city] = $count++;
        }

        foreach ($parking_list as $parking) {
            $parking_values[$parking->slug] = $city_values[$parking->city];
        }

        $uri = $request->path();

        if($uri == 'simulator') {
            $page_data = [
                'form_action' => 'form_simulator',
                'page_title' => 'Parking Simulator',
                'button_text' => 'ENTER PARKING'
            ];
        } else {
            $page_data = [
                'form_action' => 'form_view_parking',
                'page_title' => 'Select Parking Lot',
                'button_text' => 'VIEW PARKING'
            ];
        }

        $database_parking_list = [
            'city_list' => $city_list,
            'parking_list' => $parking_list,
            'city_values' => $city_values,
            'parking_values' => $parking_values,
            'page_data' => $page_data
        ];

        return view('centaur.user.parkings.select')->with($database_parking_list);
    }

    public function getParking()
    {

    }
}
