<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'orphan_id' , 'birth_certificate' , 'father_death_certificate' , 'mother_death_certificate' , 'mother_card' ,
        'orphan_image_4_6' , 'orphan_image_9_12' , 'school_benefit' , 'medical_report' , 'social_research' , 'guardianship_decision'
    ];

    public function orphan(){
        return $this->belongsTo(Orphan::class);
    }
}
