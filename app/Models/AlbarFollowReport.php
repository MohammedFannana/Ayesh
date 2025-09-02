<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbarFollowReport extends Model
{
    protected $fillable = [

        'follow_report_data_id' , 'orphan_image' ,
    ];

    public function data()
    {
        return $this->belongsTo(FollowReportData::class, 'follow_report_data_id', 'id');
    }

    


}
