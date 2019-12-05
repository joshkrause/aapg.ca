<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conference extends Model
{
    use SoftDeletes;

    protected $guarded = [''];
	protected $dates = ['start', 'end', 'live'];
	protected $casts = [
		'meal_selection_required' => 'boolean',
		'affiliate' => 'boolean',
		'active' => 'boolean',
    ];

    public function scopeUpcoming($query)
    {
        $now = now()->format('Y-m-d');
        return $query->where('end', '>', $now)->orderBy('start');
	}

	public function options()
	{
		return $this->hasOne('App\ConferenceOption')->withDefault();
	}

	public function ticketPackages()
	{
		return $this->hasMany('App\ConferenceTicketPackage');
	}

	public function mealSelections()
	{
		return $this->hasMany('App\ConferenceMealSelection');
	}

	public function events()
	{
		return $this->hasMany('App\ConferenceSchedule');
	}

	public function meals()
	{
		return $this->hasMany('App\ConferenceMealSelection');
	}

	public function tickets()
	{
		return $this->hasMany('App\ConferenceRegistration');
	}

	public function orders()
	{
		return $this->hasMany('App\Order');
	}
}
