<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Parking;
use App\Models\Reservation;

class StaticManager
{
    public function deleteExpiredReservations() {

        $expire_time = Carbon::now();
        $expire = Reservation::where('expire_time', '<', $expire_time)->get();

        if($expire) {
            foreach($expire as $value) {
                if($value->penalty) {

                    $user_res = User::findOrFail($value->user_id);
                    $parking_res = Parking::findOrFail($value->parking_id);
                    $account_res = $user_res->account;

                    $user_arr = [
                        'account' => $account_res - $parking_res->price_of_reservation_penalty
                    ];

                    $user_res->updateUser($user_arr);
                    $user_res->save();
                }

                Reservation::where('user_id', $value->user_id)->delete();
            }
        }
    }
}
