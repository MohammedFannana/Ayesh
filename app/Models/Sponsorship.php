<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'orphan_id' , 'supporter_id' , 'external_code' , 'sponsorship_date' , 'status'
    ];



    // العلاقة مع جدول الأيتام
    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }

    public function supporter()
    {
        return $this->belongsTo(Supporter::class, 'supporter_id');
    }

}
