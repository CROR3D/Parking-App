<?php

namespace App\Http\Controllers\App;

use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        $userRole = Sentinel::getUser()->roles->first()->name;

        // TODO get reservation with user_id
        $currentActivity = [
            'hasReservation' => true,
            'hadParked' => false,
            'hasMessages' => false,
            'role' => $userRole
        ];

        return view('centaur.user.dashboard')->with('currentActivity', json_encode($currentActivity));
    }

    public function update_profile()
    {

    }
}
