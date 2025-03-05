<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'email' , 'address' , 'area' , 'languages' , 'selfie_image'
    ];
}
