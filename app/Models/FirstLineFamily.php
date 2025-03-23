<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstLineFamily extends Model
{
    protected $fillable = [
        'families_number' , 'authority_number' , 'authority_name' , 'country' , 'city' , 'parents_status' ,'name' ,
        'nationality' , 'birth_date' , 'marital_status' , 'family_number' ,'family_male_number' ,'family_female_number' ,
        'income' , 'income_source' , 'subsidies' , 'financial_status' ,'birth'

    ];

    public function first_line_familie_profile(){
        return $this->hasOne(FirstLineFamilyProfile::class);
    }
}
