<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportField;

class MariamCoordinatesSeeder extends Seeder
{

    public function run()
    {
        $fields = [
            [

                'supporter_id' => 3,
                'name' => 'country_mar',
                'x' => 101,
                'y' => 74,
                'width' => 70,
                'height' => 9,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'supervising_authority_place_mar',
                'x' => 200,
                'y' => 74,
                'width' => 49,
                'height' => 9,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'sponsor_name_mar',
                'x' => 101,
                'y' => 85.5,
                'width' => 70,
                'height' => 9,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'sponsor_number_mar',
                'x' => 200,
                'y' => 85.5,
                'width' => 70,
                'height' => 9,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'orphan_name_mar',
                'x' => 101,
                'y' => 97,
                'width' => 70,
                'height' => 16,
                'options' => [
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'internal_code_mar',
                'x' => 200,
                'y' => 97.2,
                'width' => 70,
                'height' => 9,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'orphan_status_mar',
                'x' => 101,
                'y' => 115,
                'width' => 70,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'birth_date_mar',
                'x' => 200,
                'y' => 115,
                'width' => 57.5,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'address_mar',
                'x' => 101,
                'y' => 127,
                'width' => 70,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'age_mar',
                'x' => 200,
                'y' => 127,
                'width' => 70,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'case_type_mar',
                'x' => 101,
                'y' => 138,
                'width' => 70,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'phone_number_mar',
                'x' => 200,
                'y' => 138,
                'width' => 67.5,
                'height' => 10,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'health_status_mar',
                'x' => 101,
                'y' => 164,
                'width' => 64,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'mother_name_mar',
                'x' => 200,
                'y' => 164,
                'width' => 66.5,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'guardian_name_mar',
                'x' => 101,
                'y' => 175.5,
                'width' => 49.5,
                'height' => 15,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'guardian_relationship_mar',
                'x' => 200,
                'y' => 175.5,
                'width' => 66.5,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'religious_behavior_mar',
                'x' => 101,
                'y' => 192,
                'width' => 64,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'memorize_quran_mar',
                'x' => 200,
                'y' => 192,
                'width' => 66.5,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'academic_stage_mar',
                'x' => 101,
                'y' => 204,
                'width' => 60,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'academic_level_mar',
                'x' => 200,
                'y' => 204,
                'width' => 57,
                'height' => 9.5,
                'options' => [
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'page' => 1
                ]
            ],
            [

                'supporter_id' => 3,
                'name' => 'letter_thanks_mar',
                'x' => 200,
                'y' => 229,
                'width' => 190,
                'height' => 29,
                'options' => [
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [0,0,0],
                    'fillColor' => null,
                    'borderStyle' => 'none',
                    'page' => 1
                ]
            ],
        ];

        foreach ($fields as $field) {
            $field['options'] = json_encode($field['options']);
            ReportField::create($field);
        }
    }
}
