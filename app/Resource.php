<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    protected $fillable = ['name', 'description', 'link', 'file', 'category', 'meeting'];
    use SoftDeletes;
}
