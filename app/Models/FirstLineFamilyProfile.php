<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstLineFamilyProfile extends Model
{
    protected $fillable = [
        'first_line_family_id' , 'family_city' , 'family_directorate' , 'family_village' ,'family_neighborhood' , 'landmark' , 'housing_status'
        ,'search_status' , 'researcher_name' , 'signature' , 'phone' ,'supporting_documents',
        'authority_official' , 'authority_official_signature' , 'birth_certificate' , 'death_certificate' , 'date' ,'sponsor_number'

    ];

    public function first_line_family(){
        return $this->belongsTo(FirstLineFamily::class);
    }
}
