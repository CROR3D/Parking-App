<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Parking;
use App\Models\Reservation;

class StaticManager
{
    public function deleteExpiredReservations() {

        $now = Carbon::now();
        $expired_reservations = Reservation::where('expire_time', '<', $now)->get();

        if($expired_reservations) {
            foreach($expired_reservations as $reservation) {
                if($reservation->penalty) {

                    $user = User::findOrFail($reservation->user_id);
                    $parking = Parking::findOrFail($reservation->parking_id);
                    $account = $user->account;

                    $user_data = [
                        'account' => $account - $parking->price_of_reservation_penalty
                    ];

                    $user->updateUser($user_data);
                    $user->save();
                }

                Reservation::where('user_id', $reservation->user_id)->delete();
            }
        }
    }
}
