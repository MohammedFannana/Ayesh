<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonorField extends Model
{
    protected $fillable = [
        'donor_id' , 'field_name' ,'field_type' ,'database_name' , 'placeholder'
    ];

    public function donor(){
        return $this->belongsTo(Donor::class);
    }

    public function fieldValues()
    {
        return $this->hasMany(OrphanDonorFieldValue::class, 'donor_field_id');
    }
}
