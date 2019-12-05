<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceOption extends Model
{
    protected $guarded = [''];
	protected $dates = ['registration_start', 'registration_end', 'early_bird_registration_start', 'early_bird_registration_end'];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}

	public function ticket()
	{
		return $this->belongsTo('App\ConferenceRegistration', 'meal_selection_id', 'id');
	}
}
