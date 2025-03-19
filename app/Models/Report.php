<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $casts = [
        'fields' => 'array',
    ];

    protected $fillable = [
        'donor_id' , 'orphan_id' , 'fields' , 'signature'
        ,'donor_seal' , 'group_photo' , 'thanks_letter' ,'academic_certificate',
        'sponsorship_transfer_receipt','donor_accreditation',
    ];

    // one to many relation
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    // علاقة التقرير مع اليتيم (كل تقرير ينتمي ليتيم واحد)
    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }


    // formate for update_at
    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('j F Y');
    }

}
