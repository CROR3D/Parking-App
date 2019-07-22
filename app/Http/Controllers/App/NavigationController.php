<?php

namespace App\Http\Controllers\App;

use Sentinel;
use StaticManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\Reservation;
use App\Models\Ticket;

class NavigationController extends Controller
{
    public function __construct()
    {
        StaticManager::deleteExpiredReservations();
    }

    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        $user = Sentinel::getUser();
        $userReservation = Reservation::where('user_id', $user->id)->first();
        $userTicket = Ticket::where(['userable_type' => 'App\Models\User'], ['userable_id' => $user->id])->first();

        if($userReservation) $userReservationParking = Parking::findOrFail($userReservation->parking_id);
        if($userTicket) $userParking = Parking::findOrFail($userTicket->parking_id);

        $currentActivity = [
            'reservation' =>
                (!$userReservation) ? null : [
                'city' => $userReservationParking->city,
                'parking' => $userReservationParking->name,
                'created' => $userReservation->created_at->format('d/m/Y H:i:s'),
                'expires' => Carbon::parse($userReservation->expire_time)->format('d/m/Y H:i:s'),
                'code' => $userReservation->code
            ],
            'parked' =>
                (!$userTicket) ? null : [
                'city' => $userReservationParking->city,
                'parking' => $userReservationParking->name,
            ],
            'hasMessages' => false,
            'role' => $user->roles->first()->name
        ];

        return view('centaur.user.dashboard')->with('currentActivity', json_encode($currentActivity));
    }

    public function updateProfile()
    {

    }
}
