<?php

namespace App\Imports;

use Exception;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\Phone;
use App\Models\Family;
use App\Models\Orphan;
use App\Models\Profile;
use App\Models\Guardian;
use App\Models\Marketing;
use App\Models\Sponsorship;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\CertifiedOrphanExtra;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;


class OrphansImport implements ToModel, WithHeadingRow
{
    protected $supporterId;
    protected $status;


    public function __construct($supporterId , $status = null)
    {
        $this->supporterId = $supporterId;
        $this->status = $status;
    }

    public function model(array $row)
    {

        // dd($row);

           // تجاهل الصفوف الفارغة تمامًا
        if (collect($row)->filter()->isEmpty()) {
            Log::info('تم تجاهل صف فارغ', $row);
            return null;
        }

        // تجاهل الصف إذا لم يحتوي على اسم يتيم
        if (empty($row['asm_alytym'])) {
            Log::warning('اسم اليتيم مفقود، تم تجاهل الصف', $row);
            return null;
        }

        // ابحث عن يتيم موجود بالاسم أو برقم اليتيم
        $existingOrphan = Orphan::where('internal_code', $row['rkm_alytym'])
            ->orWhere('name', $row['asm_alytym'])
            ->first();

        if ($existingOrphan) {
            Log::info("اليتيم '{$row['asm_alytym']}' موجود مسبقًا، سيتم حذفه وإعادة إضافته.", $row);

            // احذف العلاقات المرتبطة
            // احذف الصور من الـ storage
            if ($existingOrphan->images && $existingOrphan->images->count()) {
                foreach ($existingOrphan->images as $image) {
                    $files = [
                        $image->birth_certificate,
                        $image->father_death_certificate,
                        $image->mother_death_certificate,
                        $image->mother_card,
                        $image->orphan_image_4_6,
                        $image->orphan_image_9_12,
                        $image->school_benefit,
                        $image->medical_report,
                        $image->social_research,
                        $image->guardianship_decision,
                        $image->data_validation,
                        $image->agricultural_holding,
                    ];

                    foreach ($files as $file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    }
                }

                // احذف سجلات الصور بعد مسح الملفات
                $existingOrphan->images()->delete();
            }

            $existingOrphan->phones()->delete();
            $existingOrphan->profile()->delete();
            $existingOrphan->guardian()->delete();
            $existingOrphan->marketing()->delete();
            $existingOrphan->sponsorship()->delete();

            // احذف اليتيم نفسه
            $existingOrphan->delete();
        }

        try {
            DB::beginTransaction();

            $birthDate = null;

            try {

                if (!empty($row['tarykh_almylad'])) {
                    if (is_numeric($row['tarykh_almylad'])) {
                        $birthDate = Carbon::instance(Date::excelToDateTimeObject($row['tarykh_almylad']));
                    } else {
                        try {
                            $birthDate = Carbon::createFromFormat('d/m/Y', trim($row['tarykh_almylad']));
                        } catch (\Exception $e) {
                            // تجربة تنسيقات إضافية
                            $birthDate = Carbon::parse(trim($row['tarykh_almylad']));
                        }
                    }
                } else {
                    $birthDate = null;
                }
            } catch (\Exception $e) {
                throw new \Exception("تاريخ الميلاد غير صالح أو مفقود: " . $e->getMessage());
            }


            if (!empty($row['tarykh_almylad']) && is_numeric($row['tarykh_almylad'])) {
                $birthDate = Carbon::instance(Date::excelToDateTimeObject($row['tarykh_almylad']));
            } else {
                $birthDate = $row['tarykh_almylad'];
            }

             if (empty($row['asm_alytym'])) {
                dd($row['asm_alytym']);
            Log::error('اسم اليتيم مفقود في صف:', $row);
            throw new \Exception('الاسم مفقود في ملف الاستيراد');
        }


            // تحقق إذا اليتيم موجود مسبقًا بالاسم
            // $existingOrphan = Orphan::where('name', $row['asm_alytym'])->first();

            // if ($existingOrphan) {
            //     Log::info("اليتيم '{$row['asm_alytym']}' موجود مسبقًا، تم تجاهل الصف.", $row);
            //     return null; // تجاهل هذا السطر
            // }

            $orphan = Orphan::create([
                'internal_code' => $row['rkm_alytym'],
                'name' => $row['asm_alytym'],
                'birth_date' => $birthDate ?? null,
                'case_type' => $row['hal_alytm'] ?? null,
                'visa_number' => $row['rkm_alfyza'] ?? null,
                'bank_name' => $row['noaa_alhsab'] ?? null,
                'gender' => $row['algns'] ?? null,
                'status' => $this->status ,
            ]);

            Image::create([
                'orphan_id' => $orphan->id,
                'birth_certificate' => $row['shhad_almylad'] ?? null,
                'father_death_certificate' => $row['shhad_ofa_alab'] ?? null,
                'mother_death_certificate' => $row['shhad_ofa_alam'] ?? null,
                'mother_card'=> $row['btak_alosy'] ?? null,
                'orphan_image_4_6' => $row['sor_shkhsy46'] ?? null,
                'orphan_image_9_12' => $row['sor_shkhsy912'] ?? null,
                'school_benefit' => $row['alafad_almdrsy'] ?? null,
                'medical_report' => $row['altkryr_altby'] ?? null,
                'social_research' => $row['albhth_alagtmaaay'] ?? null,
                'guardianship_decision' => $row['akrar_blosay'] ?? null,
                'data_validation' => $row['akrar_bsh_albyanat'] ?? null,
                'agricultural_holding' => $row['hyaz_zraaay'] ?? null,
            ]);

            if($row['aadd_alafrad']){
                Family::create([
                    'family_number' => is_numeric($row['aadd_alafrad']) ? (int)$row['aadd_alafrad'] : null,
                    'orphan_id' => $orphan->id,
                ]);
            }

            $numberPhones = explode('/', $row['arkam_altlyfon']);


            foreach ($numberPhones as $phone) {
                if (Str::contains($phone, '\\')) {
                    $instandNumberPhones = explode('\\', trim($phone));
                    foreach ($instandNumberPhones as $value) {
                        Phone::create([
                    'phone_number' => trim($value),
                    'orphan_id' => $orphan->id,
                ]);
                    }
                }else{

                    Phone::create([
                        'phone_number' => trim($phone),
                        'orphan_id' => $orphan->id,
                    ]);
                }
            }

            Profile::create([
                'mother_name' => $row['asm_alam'] ?? null,
                'full_address' => $row['alaanoan'] ?? null,
                'governorate' => $row['almhafth'] ?? null,
                'orphan_id' => $orphan->id ?? null,
            ]);

            Guardian::create([
                'guardian_name' => $row['alos'],
                'guardian_relationship' => $row['aalak_alosy'] ?? null,
                'guardian_national_id' => $row['alrkm_alkom'] ?? null,
                'orphan_id' => $orphan->id,
            ]);

            if($this->status === 'marketing_provider' || $this->status === 'waiting'   || $this->status === 'sponsored'){
                Marketing::create([
                    'orphan_id' => $orphan->id,
                    'supporter_id' => $this->supporterId,
                    'marketing_date' => now(),
                    'status' => 'marketing',
                ]);
            }

            if($this->status === 'sponsored'){
                Sponsorship::create([
                    'orphan_id' => $orphan->id,
                    'supporter_id' => $this->supporterId,
                    'external_code' => $row['rkm_alytym'],
                    'status' => 'sponsored',
                    'sponsorship_date' => now(),
                ]);
            }

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
