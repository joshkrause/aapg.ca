<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NavButton extends Model
{
	use SoftDeletes;

    protected $guarded = [];

	public function scopeTopLevel($q)
	{
		return $q->whereNull('parent_id');
    }

    public function scopeActive($q)
	{
		return $q->where('active', '1');
	}

	public function getHasChildrenAttribute($q)
	{
		return $this->children->count() > 0;
	}

	public function getHasParentAttribute($q)
	{
		return !empty($this->parent);
	}

	public function children()
	{
		return $this->hasMany('App\NavButton', 'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo('App\NavButton', 'parent_id');
	}
}
