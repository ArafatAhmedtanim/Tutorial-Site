<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $fillable = [
        'tutorial_id','file_name',
    ];
}
