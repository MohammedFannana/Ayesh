<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'fax' ,'website' , 'email' ,'address'
    ];
}
