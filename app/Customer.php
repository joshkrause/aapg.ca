<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
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
