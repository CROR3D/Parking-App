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
        StaticManager::deleteExpiredReservations();
    }

    public function createReservation($slug)
    {
        $user = Sentinel::getUser();
        $parking = Parking::where('slug', $slug)->first();
        $parkingID = $parking->id;
        $spotsTotal = $parking->spots;
        $spotsCurrent = Ticket::where('parking_id', $parkingID)->count();
        $spotsReserved = Reservation::where('parking_id', $parkingID)->count();
        $spotsTaken = $spotsCurrent + $spotsReserved;
        $reservationPrice = $parking->price_of_reservation;
        $penaltyPrice = $parking->price_of_reservation_penalty;

        $doesUserTicketExist = Ticket::where('userable_id', $user->id)->exists();
        $doesUserReservationExist = Reservation::where('user_id', $user->id)->exists();

        $code = sprintf('%04d', rand(0000, 9999));

        while(Reservation::where(['code' => $code], ['parking_id' => $parkingID])->first()) {
            $code = sprintf('%04d', rand(0000, 9999));
        }

        if($spotsTaken < $spotsTotal && !$doesUserTicketExist) {
            $reservation = array(
                'user_id' => $user->id,
                'parking_id' => $parkingID,
                'code' => $code,
                'cancellation' => Carbon::now()->addMinute(10),
                'expire_time' => Carbon::now()->addMinute(30)
            );

            if($doesUserReservationExist) {
                session()->flash('info', 'You already have reservation!');
            } elseif($user->account <= ($reservationPrice + $penaltyPrice)) {
                session()->flash('info', 'You don\'t have enough money on your account to make this reservation!');
            } else {
                $newReservation = new Reservation;
                $newReservation->saveReservation($reservation);

                $credentials = [ 'account' => $user->account - $reservationPrice ];

                Sentinel::update($user, $credentials);

                session()->flash('info', 'New reservation created in ' . $parking->city . ' (' . $parking->name . ')!');
            }
        } elseif($doesUserTicketExist) {
            session()->flash('error', 'Can\'t reserve spot! Your pressence is already located in ' . $parking->city . ' (' . $parking->name . ')!');
        } else {
            session()->flash('error', 'This parking lot is full!');
        }
        return redirect()->route('view_parking_lot', ['slug' => $slug]);
    }

    public function cancelReservation()
    {
        $userReservation = Reservation::where('user_id', $this->userID)->first();
        $cancellation = $userReservation->cancellation;

        if(Carbon::now() <= $cancellation) {

            $profile = [
                'account' => $this->userAccount + $this->reservation_price
            ];

            $refund = true;

        } else {

            $profile = [
                'account' => $this->account - $this->penalty_price
            ];

            $refund = false;

        }

        $error = array(
            'user_id' => $this->user_id,
            'about' => 'cancellation',
            'expire_time' => Carbon::now()->addMinute(10)
        );

        $new_error = new Error;
        $new_error->saveError($error);

        $this->user->updateUser($profile);
        $this->user->save();

        Reservation::where('user_id', Sentinel::getUser()->id)->delete();

        if($refund) {
            session()->flash('info', 'Reservation canceled in ' . $this->parking->city . ' (' . $this->parking->name . ')! You got ' . $this->reservation_price . ' kn back.');
        } else {
            session()->flash('info', 'Reservation canceled in ' . $this->parking->city . ' (' . $this->parking->name . ')! You got ' . $this->penalty_price . ' kn penalty.');
        }

        return redirect()->route('parking_view', ['slug' => $this->slug]);
    }
}
