<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceRegistration extends Model
{
    protected $guarded = [''];

    public function meal()
    {
        return $this->hasOne('App\ConferenceMealSelection', 'id', 'meal_selection_id');
	}

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}

}
