<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupporterField extends Model
{
    protected $fillable = [
        'supporter_id' , 'field_name' ,'field_type' ,'database_name' , 'placeholder'
    ];

    public function supporter(){
        return $this->belongsTo(Supporter::class);
    }

    public function fieldValues()
    {
        return $this->hasMany(OrphanSupporterFieldValue::class, 'supporter_field_id');
    }
}
