<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'orphan_id' , 'guardian_name' ,'guardian_national_id' , 'guardian_relationship',
        'guardianship_reason' , 'internal_research', 'research_date','notes'
    ];

    public function orphan()
    {
        return $this->belongsTo(Orphan::class);
    }
}
