<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimulatorController extends Controller
{
    public function index()
    {
        return view('simulator.parking');
    }
}
