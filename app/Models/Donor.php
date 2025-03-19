<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'fax' ,'website' , 'email' ,'address'
    ];

    public function marketings()
    {
        return $this->hasMany(Marketing::class, 'donor_id');
    }


    //one to many relation ship with donor_fields table
    public function fields()
    {
        return $this->hasMany(DonorField::class);
    }

    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class, 'donor_id');
    }


    // morph relationship with balances
    public function balances()
    {
        return $this->hasMany(Balance::class);
    }

    // المتبرع لديه تقارير عديدة
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    
    public function files()
    {
        return $this->morphMany(File::class, 'owner_file');
    }


}
