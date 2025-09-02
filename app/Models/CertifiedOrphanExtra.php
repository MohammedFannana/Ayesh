<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertifiedOrphanExtra extends Model
{
    protected $fillable = [
        // 'description_orphan_condition'  - 'volunteer_id' -  'father_card' ,  'health_insurance' , 'school_enrollment'
        'orphan_id' , 'country' , 'city'  , 'supporter_id'
         ,'signature' , 'supervisory_accreditation'
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
