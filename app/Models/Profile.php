<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // public $timestamps = false;

    protected $fillable = [
        'orphan_id' , 'father_death_date' ,'mother_death_date' , 'parents_orphan' , 'mother_name' , 'mother_national_id' , 'mother_work' , 'mother_status' ,
        'academic_stage' , 'class' , 'phone' ,'full_address' ,'governorate' ,'center' , 'recipient_name' ,'registrar_name' ,'registrar_date' ,'knowledge'
    ];

    // one to one relationship with orphan table
    public function orphan() {
        return $this->belongsTo(Orphan::class);
    }
}
