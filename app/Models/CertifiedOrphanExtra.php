<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertifiedOrphanExtra extends Model
{
    protected $fillable = [
        'orphan_id' , 'country' , 'city' , 'description_orphan_condition' , 'supporter_id' , 'volunteer_id'
        , 'father_card' , 'school_enrollment' , 'health_insurance'
    ];

    public function orphan() {
        return $this->belongsTo(Orphan::class);
    }


    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }

}
