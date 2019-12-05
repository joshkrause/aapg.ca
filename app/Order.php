<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
	protected $guarded = [];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}

	public function tickets()
	{
		return $this->hasMany('App\ConferenceRegistration');
	}

	public function options()
	{
		return $this->hasOne('App\ConferenceOption');
	}
}
