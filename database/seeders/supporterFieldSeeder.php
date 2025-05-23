<?php

namespace Database\Seeders;

use App\Models\SupporterField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class supporterFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['supporter_id' => '1' , 'field_name' => ' اسم الهيئة ', 'field_type' => 'text' , 'database_name' => 'organization_name' , 'placeholder' => 'أدخل اسم الهيئة'],
            ['supporter_id' => '1' , 'field_name' => ' رقم الهيئة ', 'field_type' => 'text' , 'database_name' => 'organization_number' , 'placeholder' => 'أدخل رقم الهيئة'],
            ['supporter_id' => '1' , 'field_name' => ' اسم الجد ', 'field_type' => 'text' , 'database_name' => 'grandfather_name' , 'placeholder' => 'أدخل اسم الجد '],
            ['supporter_id' => '1' , 'field_name' => ' اسم الأب ', 'field_type' => 'text' , 'database_name' => 'father_name' , 'placeholder' => 'أدخل اسم الأب '],
            ['supporter_id' => '1' , 'field_name' => ' اسم العائلة ', 'field_type' => 'text' , 'database_name' => 'last_name' , 'placeholder' => 'أدخل اسم العائلة '],
            ['supporter_id' => '1' , 'field_name' => ' الجنسبة ', 'field_type' => 'text' , 'database_name' => 'nationality' , 'placeholder' => 'أدخل  الجنسبة '],
            ['supporter_id' => '1' , 'field_name' => ' ديانة الأب ', 'field_type' => 'text' , 'database_name' => 'father_religion' , 'placeholder' => 'أدخل  ديانة الأب '],
            ['supporter_id' => '1' , 'field_name' => ' ديانة الأم  ', 'field_type' => 'text' , 'database_name' => 'mother_religion' , 'placeholder' => 'أدخل  ديانة الأم '],
            ['supporter_id' => '1' , 'field_name' => ' عمل الأم ', 'field_type' => 'text' , 'database_name' => 'mother_work' , 'placeholder' => 'أدخل  عمل الأم '],
            ['supporter_id' => '1' , 'field_name' => ' راتب الأم ', 'field_type' => 'text' , 'database_name' => 'mother_salary' , 'placeholder' => ' أدخل الراتب الشهري '],
            ['supporter_id' => '1' , 'field_name' => ' اعانات أخرى ', 'field_type' => 'text' , 'database_name' => 'other_subsidies' ],
            ['supporter_id' => '1' , 'field_name' => ' عدد الكفولين ', 'field_type' => 'number' , 'database_name' => 'sponsored_number' , 'placeholder' => 'أدخل  عدد المكفولين عنهم '],
            ['supporter_id' => '1' , 'field_name' => ' المسئول عن الهيئة ', 'field_type' => 'text' , 'database_name' => 'authority_official' , 'placeholder' => ' أدخل المسئول عن الهيئة '],
            ['supporter_id' => '1' , 'field_name' => ' تاريخ الاصدار ', 'field_type' => 'date' , 'database_name' => 'release_date' ],
            ['supporter_id' => '1' , 'field_name' => ' التوقيع والختم ', 'field_type' => 'file' , 'database_name' => 'signature_seal'],
            ['supporter_id' => '2' , 'field_name' => ' الجنسبة ', 'field_type' => 'text' , 'database_name' => 'nationality' , 'placeholder' => 'أدخل  الجنسبة ' ],
            ['supporter_id' => '2' , 'field_name' => ' سبب استمرار الكفالة بعد البلوغ ', 'field_type' => 'textarea' , 'database_name' => 'reason_continuing_sponsorship' , 'placeholder' => ' أدخل سبب استمرار الكفالة بعد البلوغ '],
            ['supporter_id' => '2' , 'field_name' => ' الهاتف واتساب ', 'field_type' => 'text' , 'database_name' => 'whatsapp_phone' , 'placeholder' => ' أدخل الهاتف واتساب '],
            ['supporter_id' => '3' , 'field_name' => ' اسم الجمعية الفرعية ', 'field_type' => 'text' , 'database_name' => 'sub_association_name' , 'placeholder' => ' أدخل اسم الجمعية الفرعية  '],
            ['supporter_id' => '3' , 'field_name' => ' ملاحظات ', 'field_type' => 'textarea' , 'database_name' => 'notes' , 'placeholder' => 'أدخل  الملاحظات '],
            ['supporter_id' => '3' , 'field_name' => ' التاريخ ', 'field_type' => 'date' , 'database_name' => 'date'],
            ['supporter_id' => '3' , 'field_name' => ' توقيع المسؤول ', 'field_type' => 'file' , 'database_name' => 'signature_official'],
            ['supporter_id' => '4' , 'field_name' => ' الجنسبة ', 'field_type' => 'text' , 'database_name' => 'nationality' , 'placeholder' => 'أدخل  الجنسبة '],
            ['supporter_id' => '4' , 'field_name' => ' سبب الوفاة ', 'field_type' => 'text' , 'database_name' => 'father_death_reason' , 'placeholder' => 'أدخل  سبب وفاة الاب '],
            ['supporter_id' => '4' , 'field_name' => ' عدد المكفولين منهم ', 'field_type' => 'number' , 'database_name' => 'sponsored_number' , 'placeholder' => 'أدخل  عدد المكفولين عنهم '],
            ['supporter_id' => '4' , 'field_name' => ' الحالة الاجتماعية لأسرة اليتيم (رأي المشرف الاجتماعي) ', 'field_type' => 'textarea' , 'database_name' => 'social_status_orphan' , 'placeholder' => ' أدخل الحالة الاجتماعية لاسرة اليتيم '],

        ];

        foreach ($fields as $field) {
            SupporterField::create($field);
        }
    }
}
