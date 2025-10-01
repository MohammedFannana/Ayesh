<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportField;

class DubiCoordinatesSeeder extends Seeder
{
    public function run()
    {
        $fields = [
            [

                'supporter_id' => 4,
                'name' => 'orphan_number_dbi',
                'x' => 103,
                'y' => 42,
                'width' => 63,
                'height' => 10,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'report_date_dbi',
                'x' => 198.3,
                'y' => 42,
                'width' => 63,
                'height' => 10,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_name_dbi',
                'x' => 123.5,
                'y' => 56.5,
                'width' => 83.5,
                'height' => 10,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_birth_date_dbi',
                'x' => 73,
                'y' => 71,
                'width' => 33,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_governorate_dbi',
                'x' => 149.3,
                'y' => 71,
                'width' => 46.5,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_gender_dbi',
                'x' => 198,
                'y' => 71,
                'width' => 29.4,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_guardian_name_dbi',
                'x' => 149.4,
                'y' => 85,
                'width' => 78.3,
                'height' => 10,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_guardian_relationship_dbi',
                'x' => 95.4,
                'y' => 99.5,
                'width' => 50,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_mother_name_dbi',
                'x' => 114,
                'y' => 113.7,
                'width' => 71.2,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_father_death_date_dbi',
                'x' => 198,
                'y' => 113.9,
                'width' => 45.8,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_health_notes_dbi',
                'x' => 198.2,
                'y' => 142.3,
                'width' => 118.2,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_academic_stage_dbi',
                'x' => 198,
                'y' => 156.7,
                'width' => 148,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'orphan_management_notes_dbi',
                'x' => 199,
                'y' => 185.5,
                'width' => 188.3,
                'height' => 33,
                'options' => [
                    'align' => 'C',
                    'multiline' => true,
                    'border' => 0,
                    'page' => 2
                ]
            ],
            [

                'supporter_id' => 4,
                'name' => 'address_supervising_authority',
                'x' => 199,
                'y' => 229.5,
                'width' => 188.3,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'border' => 0,
                    'page' => 2
                ]
            ],
        ];

        foreach ($fields as $field) {
            $field['options'] = json_encode($field['options']);
            ReportField::create($field);
        }
    }
}
