<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = [
        'type' , 'owner_file' ,'file'
    ];

    public function ownerFile()
    {
        return $this->morphTo();
    }
}
