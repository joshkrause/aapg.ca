<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceMealSelection extends Model
{
	protected $guarded = [''];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}

	public function ticket()
	{
		return $this->belongsTo('App\ConferenceRegistration', 'id', 'meal_selection_id');
	}
}
