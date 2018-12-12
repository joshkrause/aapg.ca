<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'title', 'start', 'end', 'active', 'live'
    ];

    public function scopeUpcoming($query)
    {
        $now = now()->format('Y-m-d');
        return $query->where('end', '>', $now)->orderBy('start');
    }
}
