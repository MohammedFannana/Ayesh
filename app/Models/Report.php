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
        'supporter_id' , 'orphan_id' , 'fields' , 'signature'
        ,'supporter_seal' , 'group_photo' , 'thanks_letter' ,'academic_certificate',
        'sponsorship_transfer_receipt','supporter_accreditation', 'payment_receipt' , 'profile_image'
    ];

    // one to many relation
    public function supporter()
    {
        return $this->belongsTo(Supporter::class, 'supporter_id');
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
