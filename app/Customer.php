<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public function invoices()
    {
        return $this->hasMany('App\Invoices');
    }

    public function customerable()
    {
        return $this->morphTo();
    }

    public function attendant()
    {
        return $this->hasMany('App\Attendant');
    }
}
