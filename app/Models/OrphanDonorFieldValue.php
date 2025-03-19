<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrphanDonorFieldValue extends Model
{
    protected $fillable = [
        'orphan_id' , 'donor_field_id' , 'value'
    ];

    // one to many ralation with DonorField
    public function field()
    {
        return $this->belongsTo(DonorField::class , 'donor_field_id');
    }

    // one to many ralation with Orphan

    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }
}
