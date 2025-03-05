<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    protected $fillable = [
        'status' , 'internal_code' , 'application_form' , 'name' , 'national_id',
        'birth_date' , 'birth_place' , 'gender' ,'age' , 'case_type' ,'health_status'
    ];


    // one to one relationship with profile table
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    // one to one relationship with guardians table
    public function guardian() {
        return $this->hasOne(Guardian::class);
    }

    // one to one relationship with family table
    public function family() {
        return $this->hasOne(Family::class);
    }

    // one to one relationship with image table
    public function image() {
        return $this->hasOne(Image::class);
    }

    // one to money relationship with phone table

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    // relationship with reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
