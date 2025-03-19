<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'name' , 'country' , 'phone' , 'email' , 'address' , 'area' , 'languages' , 'selfie_image'
    ];

    protected $casts = [
        'area' => 'array', // تحويل الحقل إلى مصفوفة تلقائيًا
        'languages' => 'array', // تحويل الحقل إلى مصفوفة تلقائيًا
    ];


    public function files()
    {
        return $this->morphMany(File::class, 'owner_file');
    }
}
