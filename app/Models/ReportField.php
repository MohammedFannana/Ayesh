<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportField extends Model
{
    // use HasFactory;
    protected $fillable = [
        'supporter_id',
        'name',
        'x',
        'y',
        'width',
        'height',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function report()
    {
        return $this->belongsTo(Supporter::class);
    }

}

