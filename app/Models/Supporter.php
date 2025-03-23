<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'phone' , 'fax' , 'association_name' ,
        'department_name' , 'administrator_name' , 'address' , 'website' , 'emails'
    ];

    protected $casts = [
        'administrator_name' => 'array', // تحويل الحقل إلى مصفوفة تلقائيًا
        'emails' => 'array', // تحويل الحقل إلى مصفوفة تلقائيًا
    ];

    public function marketings()
    {
        return $this->hasMany(Marketing::class, 'supporter_id');
    }


    //one to many relation ship with supporter_fields table
    public function fields()
    {
        return $this->hasMany(SupporterField::class);
    }

    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class, 'supporter_id');
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
