<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrphanSupporterFieldValue extends Model
{
    protected $fillable = [
        'orphan_id' , 'supporter_field_id' , 'value'
    ];

    // one to many ralation with SupporterField
    public function field()
    {
        return $this->belongsTo(SupporterField::class , 'supporter_field_id');
    }

    // one to many ralation with Orphan

    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }
}
