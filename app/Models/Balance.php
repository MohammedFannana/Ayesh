<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Balance extends Model
{
    protected $fillable = [
        'supporter_id' , 'payment_date' , 'amount'  , 'payment_image'
    ];

    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }



    // use to delete the image fron storage if delete the balance
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($balance) {
            if ($balance->payment_image) {
                Storage::disk('public')->delete($balance->payment_image);
            }
        });
    }


}
