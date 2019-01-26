<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendant extends Model
{
    use SoftDeletes;

    public function customers()
    {
        return $this->morphMany('App\Customer', 'customerable');
    }
}
