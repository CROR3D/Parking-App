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

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('sentinel.auth');

        StaticManager::deleteExpiredReservations();
    }

    public function createReservation($id)
    {
        $user = Sentinel::getUser();

        $parking = Parking::findOrFail($id);
        $parkingID = $parking->id;
        $spotsTotal = $parking->spots;
        $reservationPrice = $parking->price_of_reservation;
        $penaltyPrice = $parking->price_of_reservation_penalty;

        $spotsCurrent = Ticket::where('parking_id', $parkingID)->count();
        $spotsReserved = Reservation::where('parking_id', $parkingID)->count();
        $spotsTaken = $spotsCurrent + $spotsReserved;

        $flashMessage = 'New reservation created in ' . $parking->city . ' (' . $parking->name . ')!';
        $reservationSuccess = true;

        $code = sprintf('%04d', rand(0000, 9999));
        $accountMin = $reservationPrice + $penaltyPrice;

        while(Reservation::where(['code' => $code], ['parking_id' => $parkingID])->first()) {
            $code = sprintf('%04d', rand(0000, 9999));
        }

        $validation = [
            [
                Reservation::where('user_id', $user->id)->exists(),
                'Already have reservation!'
            ],
            [
                $spotsTotal <= $spotsTaken,
                'Parking lot is full!'
            ],
            [
                Ticket::where('userable_id', $user->id)->exists(),
                'Can\'t reserve spot! Located on ' . $parking->name . '!'
            ],
            [
                $user->account < $accountMin,
                'Not enough money on account (' . $accountMin . 'kn needed)!'
            ]
        ];

        for($i = 0; $i < count($validation); $i++) {
            if($validation[$i][0]) {
                $flashMessage = $validation[$i][1];
                $reservationSuccess = false;
                break;
            }
        }

        session()->flash('info', $flashMessage);

        if($reservationSuccess) {
            $reservation = array(
                'user_id' => $user->id,
                'parking_id' => $parkingID,
                'code' => $code,
                'cancellation' => Carbon::now()->addMinute(10),
                'expire_time' => Carbon::now()->addMinute(30)
            );

            $newReservation = new Reservation;
            $newReservation->saveReservation($reservation);
            $credentials = [ 'account' => $user->account - $reservationPrice ];

            Sentinel::update($user, $credentials);
        }

        return redirect()->route('view_parking_lot', ['slug' => $parking->slug]);
    }

    public function cancelReservation($id)
    {
        $user = Sentinel::getUser();

        $parking = Parking::findOrFail($id);

        $userReservation = Reservation::where('user_id', $user->id)->first();
        $cancellation = $userReservation->cancellation;

        if(Carbon::now() <= $cancellation) {
            $credentials = [ 'account' => $user->account + $parking->reservation_price ];
            $refund = true;
        } else {
            $credentials = [ 'account' => $user->account - $parking->penalty_price ];
            $refund = false;
        }

        Sentinel::update($user, $credentials);

        Reservation::where('user_id', $user->id)->delete();

        if($refund) {
            session()->flash('info', 'Reservation canceled in ' . $parking->city . ' (' . $parking->name . ')! You got ' . $parking->reservation_price . ' kn back.');
        } else {
            session()->flash('info', 'Reservation canceled in ' . $parking->city . ' (' . $parking->name . ')! You got ' . $parking->penalty_price . ' kn penalty.');
        }

        return redirect()->route('parking_view', ['slug' => $parking->slug]);
    }
}
