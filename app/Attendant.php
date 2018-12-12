<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    public function customers()
    {
        return $this->morphMany('App\Customer', 'customerable');
    }
}
