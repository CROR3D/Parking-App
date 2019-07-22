<?php

namespace App\Http\Controllers\App;

use stdClass;
use Illuminate\Http\Request;
use App\Http\Requests\StoreParking;
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
        $page_data = $this->definePageData($uri);

        $database_parking_list = [
            'city_list' => $city_list,
            'parking_list' => $parking_list,
            'city_values' => $city_values,
            'parking_values' => $parking_values,
            'page_data' => $page_data
        ];

        return view('centaur.user.parkings.select')->with($database_parking_list);
    }

    public function getParking(Request $request)
    {
        $parking = Parking::findOrFail($request->selected);

        if(!$parking) {
            session()->flash('info', 'Please select parking lot you want to view.');
            return redirect()->route('view_parking');
        }

        return redirect()->route('view_parking_lot', ['slug' => $parking->slug]);
    }

    public function viewParkingLot($slug)
    {
        $parking = Parking::where('slug', $slug)->first();

        return view('centaur.user.parkings.parking')->with('parking', $parking);
    }

    public function registerOrEdit(Request $request)
    {
        $parking = Parking::find($request->selected);

        return view('centaur.admin.parkings.register_edit')->with('parking', $parking);
    }

    public function store(StoreParking $request)
    {
        $parking = array(
            'city' => $request->get('city'),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'spots' => $request->get('spots'),
            'image' => 'images/parking/' . $request->get('image'),
            'working_time' => sprintf('%02d', $request->get('working_time')) . ':' . sprintf('%02d', $request->get('working_time_two')) . '-' . sprintf('%02d', $request->get('working_time_three')) . ':' . sprintf('%02d', $request->get('working_time_four')),
            'price_per_hour' => $request->get('price_per_hour') . '.' . sprintf('%02d', $request->get('price_per_hour_two')),
            'price_of_reservation' => $request->get('price_of_reservation') . '.' . sprintf('%02d', $request->get('price_of_reservation_two')),
            'price_of_reservation_penalty' => $request->get('price_of_reservation_penalty') . '.' . sprintf('%02d', $request->get('price_of_reservation_penalty_two'))
        );

        $new_parking = new Parking;
        $data = $new_parking->saveParking($parking);

        session()->flash('info', 'New parking lot created in ' . $data->city . '!');
        return redirect()->route('dashboard');
    }

    public function update($id)
    {

    }

    private function definePageData($uri)
    {
        $page_data = new stdClass();

        switch ($uri) {
            case 'simulator':
                $page_data->form_action = 'form_simulator';
                $page_data->page_title = 'Parking Simulator';
                $page_data->button_text = 'ENTER PARKING';
                break;
            case 'update':
                $page_data->form_action = 'update_parking';
                $page_data->page_title = 'Edit Parking Lot';
                $page_data->button_text = 'EDIT PARKING';
                break;
            default:
                $page_data->form_action = 'form_view_parking';
                $page_data->page_title = 'Select Parking Lot';
                $page_data->button_text = 'VIEW PARKING';
                break;
        }

        return $page_data;
    }
}
