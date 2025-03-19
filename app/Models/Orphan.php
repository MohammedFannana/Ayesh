<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    protected $fillable = [
        'name' ,'status' , 'internal_code' , 'application_form'  , 'national_id',
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

    // one to one relationship with certified_orphan_extras table
    public function certified_orphan_extras(){
        return $this->hasOne(CertifiedOrphanExtra::class);

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

    // العلاقة مع جدول التسويق
    public function marketing()
    {
        return $this->hasOne(Marketing::class, 'orphan_id');
    }


    // one to many ralation with OrphanDonorFieldValue
    public function donorFieldValues()
    {
        return $this->hasMany(OrphanDonorFieldValue::class, 'orphan_id')->with('field');
    }

    // برجع القيم الخاصة في اليتيم مع الحقل الخاصةفيها بناء على الجمعية
    public function donorFieldValuesForCurrentDonor($donorId)
    {
        return $this->hasMany(OrphanDonorFieldValue::class, 'orphan_id')
                    ->whereHas('field', function ($query) use ($donorId) {
                        $query->where('donor_id', $donorId);
                    })->with('field');
    }

    public function getFieldValueByDatabaseName($databaseName)
    {
        return $this->donorFieldValues()
                    ->whereHas('field', function ($query) use ($databaseName) {
                        $query->where('database_name', $databaseName);
                    })
                    ->pluck('value')
                    ->first();
    }

    // العلاقة مع جدول الكفالات
    public function sponsorship()
    {
        return $this->hasOne(Sponsorship::class, 'orphan_id');
    }

    // one to many relation ship with expenses model المدفوعات
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    // one to one relationship with report
    // كل يتيم لديه تقرير واحد فقط.
    public function report()
    {
        return $this->hasOne(Report::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'owner_file');
    }


}
