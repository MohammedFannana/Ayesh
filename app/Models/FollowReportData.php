<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowReportData extends Model
{
    
    protected $table = 'follow_report_datas';
    
    protected $fillable = [

        'orphan_id' ,'sponsor_name' , 'sponsor_number' ,'age' ,'academic_stage' ,'class' , 'guardian_relationship' , 'save_orphan_quran',
        'academic_level' , 'orphan_obligations_islam' , 'changes_orphan_year' , 'other_changes_orphan_year' ,
        'authority_comment_guarantee' , 'other_authority_comment_guarantee' , 'orphan_message' , 'orphan_image_message' , 'health_status' , 'gender'
    ];

    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'orphan_id');
    }

    public function report()
    {
        return $this->belongsTo(AlbarFollowReport::class, 'follow_report_id');
    }

}
