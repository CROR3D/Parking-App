<?php

namespace App\Http\Controllers\App;

use StaticManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function __construct()
    {
        StaticManager::deleteExpiredReservations();
    }
}
