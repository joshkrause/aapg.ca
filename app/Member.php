<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    protected $fillable = ['name', 'type', 'joined'];

    use SoftDeletes;
}
