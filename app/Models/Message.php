<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public function saveMessage($message)
	{
		return $this->create($message);
	}

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
