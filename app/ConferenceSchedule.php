<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceSchedule extends Model
{
    protected $dates = ['start', 'end'];
	protected $guarded = [];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}
}
