<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // public $timestamps = false;

    protected $fillable = [
        //   phone , 'recipient_name'  ,'knowledge'
        'orphan_id' , 'father_death_date' ,'mother_death_date' , 'mother_name' , 'mother_national_id' , 'mother_work' , 'mother_status' , 'governorate' , 'center',
        'academic_stage', 'academic_stage_details' ,'academic_secondary_details' , 'reason_not_registering' , 'other_reason_not_registering' , 'class'  ,'full_address' ,'registrar_name' ,'registrar_date'
    ];

    // one to one relationship with orphan table
    public function orphan() {
        return $this->belongsTo(Orphan::class);
    }
    
   
}
