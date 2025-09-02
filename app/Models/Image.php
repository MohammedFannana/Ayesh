<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $appends = ['display_name']; // يضيف الخاصية عند استرجاع البيانات

    protected $fillable = [
        'orphan_id' , 'birth_certificate' , 'father_death_certificate' , 'mother_death_certificate' , 'mother_card' ,
        'orphan_image_4_6' , 'orphan_image_9_12' , 'school_benefit' , 'medical_report' , 'social_research' ,
        'guardianship_decision' ,'agricultural_holding' , 'data_validation' , 'visa_file'
    ];

    public function orphan(){
        return $this->belongsTo(Orphan::class);
    }

    // Accessor to display image name
    // public function getDisplayNameAttribute()
    // {
    //     if ($this->birth_certificate) {
    //         return 'شهادة الميلاد';
    //     } elseif ($this->father_death_certificate) {
    //         return 'شهادة وفاة الأب';
    //     } elseif ($this->mother_death_certificate) {
    //         return 'شهادة وفاة الأم';
    //     } elseif ($this->mother_card) {
    //         return 'بطاقة الأم';
    //     } elseif ($this->orphan_image_4_6) {
    //         return 'صورة اليتيم (4×6)';
    //     } elseif ($this->orphan_image_9_12) {
    //         return 'صورة اليتيم (9×12)';
    //     } elseif ($this->school_benefit) {
    //         return 'إفادة مدرسية';
    //     } elseif ($this->medical_report) {
    //         return 'تقرير طبي';
    //     } elseif ($this->social_research) {
    //         return 'بحث اجتماعي';
    //     } elseif ($this->guardianship_decision) {
    //         return 'قرار الوصاية';
    //     } else {
    //         return 'ملف غير محدد';
    //     }
    // }

    public function getDisplayNameAttribute()
{
    // استخراج اسم الملف من أي من الأعمدة المخزنة
    $filePath = $this->birth_certificate ??
                $this->father_death_certificate ??
                $this->mother_death_certificate ??
                $this->mother_card ??
                $this->orphan_image_4_6 ??
                $this->orphan_image_9_12 ??
                $this->school_benefit ??
                $this->medical_report ??
                $this->social_research ??
                $this->guardianship_decision ??
                $this->visa_file ??
                null;

    if (!$filePath) {
        return 'ملف غير محدد';
    }

    // استخراج الامتداد
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);

    // تحديد الاسم بناءً على نوع المستند
    if ($this->birth_certificate) {
        $name = 'شهادة الميلاد';
    } elseif ($this->father_death_certificate) {
        $name = 'شهادة وفاة الأب';
    } elseif ($this->mother_death_certificate) {
        $name = 'شهادة وفاة الأم';
    } elseif ($this->mother_card) {
        $name = 'بطاقة الأم';
    } elseif ($this->orphan_image_4_6) {
        $name = 'صورة اليتيم (4×6)';
    } elseif ($this->orphan_image_9_12) {
        $name = 'صورة اليتيم (9×12)';
    } elseif ($this->school_benefit) {
        $name = 'إفادة مدرسية';
    } elseif ($this->medical_report) {
        $name = 'تقرير طبي';
    } elseif ($this->social_research) {
        $name = 'بحث اجتماعي';
    } elseif ($this->guardianship_decision) {
        $name = 'قرار الوصاية';
    } elseif ($this->visa_file) {
        $name = ' بطاقة الفيزا ';
    }else {
        $name = 'ملف غير محدد';
    }

    return $name . ' .' . $extension;
}


}
