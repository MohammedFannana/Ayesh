<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'phone' , 'fax' , 'association_name' ,
        'department_name' , 'administrator_name' , 'address' , 'website' , 'email'
    ];


}
