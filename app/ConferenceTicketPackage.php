<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceTicketPackage extends Model
{

	protected $guarded = [''];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}
}
