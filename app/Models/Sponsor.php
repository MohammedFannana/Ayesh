<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'internal_code' , 'orphan_name' , 'sponsor_name' , 'sponsor_number'
    ];
}
