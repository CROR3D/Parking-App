<?php

namespace App\Http\Controllers\App;

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
        // TODO get reservation with user_id
        $currentActivity = [
            'hasReservation' => true,
            'hadParked' => false,
            'hasMessages' => false
        ];

        return view('centaur.user.dashboard')->with($currentActivity);
    }

    public function update_profile()
    {
        
    }
}
