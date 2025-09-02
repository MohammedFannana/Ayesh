<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        // , 'address'
        'orphan_id' , 'family_number' ,'male_number' , 'female_number' ,'income',
        'income_source' , 'housing_type' , 'housing_case'
    ];

    public function orphan()
    {
        return $this->belongsTo(Orphan::class);
    }
}
