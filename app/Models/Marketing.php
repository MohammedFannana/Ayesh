<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $fillable = [
        'orphan_id' , 'donor_id' ,'marketing_date' ,'status'
    ];

    // العلاقة مع جدول الأيتام
    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }

     // العلاقة مع جدول الجمعيات
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

}
