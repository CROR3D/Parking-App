<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Parking extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'city',
        'address',
        'slug',
        'spots',
        'image',
        'working_time',
        'price_per_hour',
        'price_of_reservation',
        'price_of_reservation_penalty'
    ];

    public function saveParking($parking)
	{
		return $this->create($parking);
	}

    public function updateParking($parking)
	{
		return $this->update($parking);
	}

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => [
                    'first' => 'city',
                    'second' => 'name'
                ]
            ]
        ];
    }
}
