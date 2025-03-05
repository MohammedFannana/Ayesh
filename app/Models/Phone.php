<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'orphan_id' , 'phone_number'
    ];

    public function orphan(){

        return $this->belongsTo(Orphan::class);
    }
}
