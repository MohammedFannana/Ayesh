<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Expense extends Model
{
    protected $fillable = [
        'orphan_id' , 'payment_date' , 'amount'  , 'payment_image'
    ];

    public function orphan()
    {
        return $this->belongsTo(Orphan::class);
    }



    // use to delete the image fron storage if delete the balance
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($expense) {
            if ($expense->payment_image) {
                Storage::disk('public')->delete($expense->payment_image);

            }
        });
    }
}
