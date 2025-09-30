<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportField;


class DarAlberCoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fields = [
            [
                'supporter_id' => 1,
                'name' => 'sponsor_name_ber',
                'x' => 143,
                'y' => 95,
                'width' => 90,
                'height' => 9,
                'options' => ['align' => 'C', 'multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'sponsor_number_ber',
                'x' => 143,
                'y' => 105,
                'width' => 90,
                'height' => 9,
                'options' => ['align' => 'C', 'multiline' => false,'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_name_ber',
                'x' => 103,
                'y' => 122.5,
                'width' => 64,
                'height' => 8.5,
                'options' => ['align' => 'C','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_code_ber',
                'x' => 200,
                'y' => 122.5,
                'width' => 63,
                'height' => 8.5,
                'options' => ['align' => 'C','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_gender',
                'x' => 200,
                'y' => 132,
                'width' => 41.3,
                'height' => 8.5,
                'options' => ['align' => 'C','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_old_ber',
                'x' => 137.3,
                'y' => 132,
                'width' => 41.3,
                'height' => 8.5,
                'options' => ['align' => 'C','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_status_ber',
                'x' => 200,
                'y' => 149,
                'width' => 130,
                'height' => 8.5,
                'options' => ['align' => 'C', 'multiline' => false,'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_dkno_ber',
                'x' => 200,
                'y' => 158,
                'width' => 190,
                'height' => 8.5,
                'options' => ['align' => 'C', 'multiline' => false,'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_academic_stage_ber',
                'x' => 72.5,
                'y' => 175,
                'width' => 30,
                'height' => 8.5,
                'options' => ['align' => 'C','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_academic_level_ber',
                'x' => 200,
                'y' => 175,
                'width' => 30,
                'height' => 9,
                'options' => ['align' => '', 'multiline' => false,'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_class_ber',
                'x' => 137,
                'y' => 175,
                'width' => 46,
                'height' => 9,
                'options' => ['align' => '', 'multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_class_description_ber',
                'x' => 200,
                'y' => 185,
                'width' => 190,
                'height' => 8,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_obligations_islam_ber',
                'x' => 103,
                'y' => 194,
                'width' => 39,
                'height' => 9,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'save_orphan_quran_ber',
                'x' => 200,
                'y' => 194,
                'width' => 39,
                'height' => 9,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_guardian_name_ber',
                'x' => 133,
                'y' => 212,
                'width' => 60,
                'height' => 8,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_guardian_relationship_ber',
                'x' => 200,
                'y' => 212,
                'width' => 37,
                'height' => 9,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_changes_orphan_year_ber',
                'x' => 200,
                'y' => 221.7,
                'width' => 130,
                'height' => 15,
                'options' => ['align' => '', 'multiline' => true, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_authority_comment_guarantee_ber',
                'x' => 200,
                'y' => 247,
                'width' => 190,
                'height' => 9,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
            [
                'supporter_id' => 1,
                'name' => 'orphan_message_ber',
                'x' => 200,
                'y' => 265,
                'width' => 190,
                'height' => 9,
                'options' => ['align' => '','multiline' => false, 'page' => 1],
            ],
        ];

        foreach ($fields as $field) {
            $field['options'] = json_encode($field['options']);
            ReportField::create($field);
        }
    }
}
