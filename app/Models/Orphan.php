<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    protected $fillable = [
        'name' ,'status' , 'internal_code' , 'application_form'  , 'national_id',
        'birth_date' , 'birth_place' , 'gender' ,'age' , 'case_type' ,'health_status','disease_description',
        'disability_type','bank_name' , 'visa_number',
    ];


    // one to one relationship with profile table
    public function profile() {
        return $this->hasOne(Profile::class)->withDefault();
    }

    // one to one relationship with guardians table
    public function guardian() {
        return $this->hasOne(Guardian::class)->withDefault();
    }

    // one to one relationship with family table
    public function family() {
        return $this->hasOne(Family::class)->withDefault();
    }

    // one to one relationship with image table
    public function image() {
        return $this->hasOne(Image::class)->withDefault();
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


    // one to many ralation with OrphanSupporterFieldValue
    public function supporterFieldValues()
    {
        return $this->hasMany(OrphanSupporterFieldValue::class, 'orphan_id')->with('field');
    }

    // برجع القيم الخاصة في اليتيم مع الحقل الخاصةفيها بناء على الجمعية
    public function supporterFieldValuesForCurrentSupporter($supporterId)
    {
        return $this->hasMany(OrphanSupporterFieldValue::class, 'orphan_id')
                    ->whereHas('field', function ($query) use ($supporterId) {
                        $query->where('supporter_id', $supporterId);
                    })->with('field');
    }

    public function getFieldValueByDatabaseName($databaseName)
    {
        return $this->supporterFieldValues()
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
    // public function expenses()
    // {
    //     return $this->hasMany(Expense::class);
    // }

       public function expenses()
        {
            return $this->hasMany(ExpenseOrphan::class, 'internal_code', 'internal_code');
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

    public function sponsor()
    {
        return $this->hasOne(Sponsor::class, 'internal_code', 'internal_code');
    }

    public function data(){
        return $this->hasOne(FollowReportData::class);
    }


    public function scopeSponsoredWithRelationsFilters($query, $request)
    {
        return $query->where('status', 'sponsored')

            // فلتر البحث بالاسم
            ->when($request->search, function ($builder, $value) {
                $builder->where('name', 'LIKE', "%{$value}%");
            })

            // فلتر الجمعية (supporter)
            ->when($request->filter, function ($builder, $filters) {
                $builder->whereHas('marketing.supporter', function ($q) use ($filters) {
                    $q->whereIn('name', $filters);
                });
            })

            // فلتر المحافظة من جدول profile
            ->when($request->governorate, function ($builder, $governorate) {
                $builder->whereHas('profile', function ($q) use ($governorate) {
                    $q->where('governorate', $governorate);
                });
            })

            // فلتر العمر من جدول orphans (age أو birth_date)
            ->when($request->age_from || $request->age_to, function ($builder) use ($request) {
                $ageFrom = $request->age_from ?? 0;
                $ageTo   = $request->age_to ?? 25;

                $builder->where(function($q) use ($ageFrom, $ageTo) {
                    // إذا العمر موجود
                    $q->whereBetween('age', [$ageFrom, $ageTo])
                      ->orWhere(function($q2) use ($ageFrom, $ageTo) {
                          $q2->whereNull('age')
                             ->whereNotNull('birth_date')
                             ->whereDate('birth_date', '<=', now()->subYears($ageFrom))
                             ->whereDate('birth_date', '>=', now()->subYears($ageTo));
                      });
                });
            })

            // جلب العلاقات المطلوبة
            ->with([
                'profile:id,orphan_id,governorate',
                'family:id,orphan_id',
                'sponsorship:orphan_id,external_code,supporter_id',
                'marketing:id,orphan_id,supporter_id',
                'marketing.supporter:id,name',
                'phones'
            ])

            // اختيار الأعمدة الأساسية
            ->select('id', 'internal_code', 'name', 'age', 'birth_date');
    }






}
