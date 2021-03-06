<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $dates = ['start', 'end'];
	protected $guarded = [];

	public function conference()
	{
		return $this->belongsTo('App\Conference');
	}
}
