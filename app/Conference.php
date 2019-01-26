<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conference extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'start', 'end', 'active', 'live'
    ];

    public function scopeUpcoming($query)
    {
        $now = now()->format('Y-m-d');
        return $query->where('end', '>', $now)->orderBy('start');
    }
}
