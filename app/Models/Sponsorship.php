<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'orphan_id' , 'donor_id' , 'external_code' , 'sponsorship_date' , 'status'
    ];



    // العلاقة مع جدول الأيتام
    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

}
