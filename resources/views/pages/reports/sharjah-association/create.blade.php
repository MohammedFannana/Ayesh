<x-main-layout>

    @push('styles')

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @endpush


    <h2 class="mb-4">  {{__('انشاء تقرير')}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('جمعية الشارقة الخيرية')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />
    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('report.sharjah.store')}}" id="reportForm" method="post" enctype="multipart/form-data">
            @csrf

            {{-- basic-information --}}
            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" >

                    {{-- supporter_id --}}
                    <input type="hidden" name="supporter_id" value="{{$supporter_id}}" />

                    {{-- orphan_id --}}
                    <input type="hidden" name="orphan_id" value=""  id="orphan_id"/>


                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder="أدخل اسم اليتيم"/>
                    </div>

                    {{-- orphan_code --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_code" id="orphan_code" class="border" type="text" label="  {{__('كود اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل كود اليتيم')}}"/>
                    </div>


                    {{-- month_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="month_number" class="border" type="text" label=" {{__('عن عدد الأشهر')}}" autocomplete="" placeholder=" {{__('أدخل عدد الأشهر')}} "/>
                    </div>

                </div>

                <div class="row" >

                    {{-- sponsor_code --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_code" class="border" type="text" label=" {{__('كود الكافل')}}" autocomplete="" placeholder="{{__('أدخل كود الكافل')}}"/>
                    </div>

                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name"  class="border" type="text" label=" {{__('اسم الكافل')}}"  placeholder="{{__('أدخل اسم الكافل')}}"/>
                    </div>

                    {{-- phone--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_phone" class="border" type="text" label=" {{__('الهاتف')}}  " autocomplete="" placeholder="{{__('أدخل الهاتف')}}"/>
                    </div>

                    {{-- email--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_email" class="border" type="email" label=" {{__('البريد الالكتروني')}} " autocomplete="" placeholder="{{__('أدخل البريد الالكتروني')}}  "/>
                    </div>

                    {{-- mailbox--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_mailbox" class="border" type="text" label=" {{__('صندوق البريد')}} " autocomplete="" placeholder="{{__('أدخل صندوق البريد')}}  "/>
                    </div>

                    {{-- address--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_address" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="{{__('أدخل العنوان')}}"/>
                    </div>

                    {{-- orphan_fullname --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_fullname" id="orphan_fullname" class="border" type="text" label=" {{__('اسم الكامل اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل اسم الكامل اليتيم')}}" />
                    </div>

                    {{-- orphan_type --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_type" id="orphan_type" class="border" type="text" label=" {{__('نوع اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل نوع اليتيم')}}"/>
                    </div>

                    {{-- birth_place --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_place" id="birth_place" class="border" type="text" label="  {{__('مكان الميلاد')}}" autocomplete="" placeholder=" {{__('أدخل مكان الميلاد')}}"/>
                    </div>

                    {{-- nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality"  class="border" type="text" label=" {{__('الجنسية')}} " value="مصري/ة" autocomplete="" placeholder=" {{__('أدخل الجنسية')}} " disabled/>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" id="gender" class="border" type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" {{__('أدخل الجنس')}} "/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" id="birth_date" class="border flatpickr-input" type="text" label="  {{__('تاريخ الميلاد')}}" autocomplete=""/>
                    </div>


                    {{-- age --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="age" id="age" class="border" type="text" label=" {{__('السن')}} " autocomplete="" placeholder=" {{__('أدخل السن')}} "/>
                    </div>

                    {{-- reason_continuing_sponsorship--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="reason_continuing_sponsorship" id="reason_continuing_sponsorship" label="{{__('سبب استمرار الكفالة بعد البلوغ')}}"  />
                    </div>

                    {{-- father_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="father_death" class="border flatpickr-input" id="father_death" type="text" label="  {{__('تاريخ وفاة الأب')}}" autocomplete=""/>
                    </div>

                    {{-- mother_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_name" class="border" id="mother_name" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder=" {{__('أدخل اسم الأم')}} "/>
                    </div>

                    {{-- mother_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_death" class="border flatpickr-input" id="mother_death" type="text" label="  {{__('تاريخ وفاة الأم')}}" autocomplete=""/>
                    </div>

                    {{-- family_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_number" class="border" id="family_number" type="number" label=" {{__('عدد افراد الاسرة')}} " min="0" autocomplete="" placeholder=" {{__('أدخل عدد افراد الاسرة')}}  "/>
                    </div>


                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" class="border" id="guardian_name" type="text" label=" {{__('اسم ولي الأمر')}}"  autocomplete="" placeholder="{{__('أدخل اسم  ولي الأمر')}}"/>
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" class="border" id="guardian_relationship" type="text" label=" {{__('صلة القرابة')}}" autocomplete="" placeholder="{{__('أدخل صلة القرابة')}}"/>
                    </div>

                    {{-- person_responsible_phone --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="phone" class="border" id="phone" type="text" label=" {{__('الهاتف')}} " autocomplete="" placeholder="{{__('أدخل الهاتف')}}"/>
                    </div>

                    {{-- person_responsible_whatsapp --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="whatsapp_phone" id="whatsapp_phone" class="border" type="text" label=" {{__('هاتف واتس اب')}}" autocomplete="" placeholder="{{__('أدخل هاتف واتس اب')}} "/>
                    </div>


                    {{-- live_mother --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="live_mother" class="border" type="text" label=" {{__('هل يعيش مع امه؟')}}"   placeholder=" {{__('أجب بنعم أو لا')}}" autocomplete="" />
                    </div>

                    {{-- reason --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="reason_live" class="border" type="text" label="  {{__('السبب')}}  " autocomplete="" placeholder="{{__('أدخل السبب')}} "/>
                    </div>

                    {{-- housing_type --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="housing_type"  id="housing_type" class="border" type="text" label="  {{__('نوع السكن')}} " autocomplete="" placeholder="{{__('أدخل نوع السكن')}}  "/>
                    </div>

                </div>

                <div class="row" >


                    {{-- conditions_orphan--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="conditions_orphan" label=" {{__('الأحوال التي مر بها اليتيم مؤخرا و عائلته')}}" />
                    </div>

                    {{-- health_status --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="health_status" id="health_status" class="border" type="text" label="  {{__('الحالة الصحية لليتيم')}}" autocomplete="" placeholder="{{__('أدخل الحالة الصحية لليتيم')}}"/>
                    </div>

                    {{-- chronic_disease --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="chronic_disease" class="border" type="text" label="  {{__('مرض مزمن')}} " autocomplete="" placeholder="{{__('أدخل مرض مزمن')}}"/>
                    </div>

                    {{-- Type_disease --}}
                    <div class="col-12  mb-3">
                        <x-form.input name="Type_disease"  id="Type_disease" class="border" type="text" label="  {{__('نوع المرض و أسبابه')}}" autocomplete="" placeholder="{{__('أدخل  نوع المرض و أسبابه')}}"/>
                    </div>


                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}}" autocomplete="" placeholder="{{__('أدخل المرحلة الدراسية')}}"/>
                    </div>


                    {{-- academic_level --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_level" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="{{__('أدخل المستوى الدراسي')}}"/>
                    </div>


                    {{-- reason_notStudying --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="reason_notStudying" class="border" type="text" label=" {{__('سبب عدم الدراسة')}}" autocomplete="" placeholder="{{__('أدخل سبب عدم الدراسة')}}"/>
                    </div>

                    {{-- alternative_approach --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="alternative_approach" class="border" type="text" label="  {{__('التوجه البديل')}} " autocomplete="" placeholder="{{__('أدخل التوجه البديل')}} "/>
                    </div>

                    {{-- actions_supervisor --}}
                    <div class="col-12  mb-3">
                        <x-form.input name="actions_supervisor" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="{{__('أدخل الاجراءات التي اتخذها المشرف')}}"/>
                    </div>

                    {{-- regular_praying --}}
                    <div class="col-3  mb-3">
                        <x-form.input name="regular_praying" class="border" type="text" label="  {{__('يواظب على الصلاة')}}" autocomplete="" placeholder=" {{__('أجب بنعم أو لا')}}"/>
                    </div>

                    {{-- actions_supervisor_praying --}}
                    <div class="col-9 mb-3">
                        <x-form.input name="actions_supervisor_praying" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="{{__('أدخل الاجراءات التي اتخذها المشرف')}}"/>
                    </div>

                    {{-- ramadan_fasting --}}
                    <div class="col-3  mb-3">
                        <x-form.input name="ramadan_fasting" class="border" type="text" label="  {{__('صوم رمضان')}}" autocomplete="" placeholder=" {{__('أجب بنعم أو لا')}}"/>
                    </div>


                    {{-- actions_supervisor_ramadan --}}
                    <div class="col-9  mb-3">
                        <x-form.input name="actions_supervisor_ramadan" class="border" type="text" label="  {{__('الاجراءات التي اتخذها المشرف')}} " autocomplete="" placeholder="{{__('أدخل الاجراءات التي اتخذها المشرف')}}"/>
                    </div>

                    {{--quran_memorized? --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="quran_memorized" class="border" type="number"  min="0" max="30" label="   {{__('كم يحفظ من القران الكريم')}}" autocomplete="" placeholder=" {{__('أدخل كم يحفظ من القران الكريم')}}"/>
                    </div>

                </div>

                <div class="row" >


                    <!-- orphan_supervisor -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_supervisor"  class="border" type="text" label=" {{__('مشرف الأيتام')}} "  placeholder="{{__('أدخل مشرف الأيتام')}} "/>
                    </div>


                    <!-- date -->
                    {{-- :value="$admin->email" --}}
                    <div class="col-12 col-md-6  mb-3">
                        <x-form.input name="date" id="date1" class="border flatpickr-input" type="text"  label=" {{__('التاريخ')}} " />
                    </div>


                    {{-- signature  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('التوقيع')}}</label> <br>
                        <label for="signature" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة التوقيع')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">
                    </div>

                    {{-- seal_association   --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('ختم الجمعية المشرفة')}}</label> <br>
                        <label for="supporter_seal" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة ختم الجمعية المشرفة')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="supporter_seal" type="file" id="supporter_seal" style="display: none;">
                    </div>

                    {{-- orphan_photo with batch plate  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('صوة اليتيم مع لوحة الدفعة')}}</label> <br>
                        <label for="group_photo" class="custom-file-upload w-75 text-center"> {{__('ارفق صوة اليتيم مع لوحة الدفعة')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="group_photo" type="file" id="group_photo" style="display: none;">
                    </div>

                    {{-- Thank you letter from orphan to sponsor  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('رسالة شكر من اليتيم للكافل')}}</label> <br>
                        <label for="thanks_letter" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة رسالة شكر من اليتيم للكافل')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="thanks_letter" type="file" id="thanks_letter" style="display: none;">
                    </div>

                    {{-- The last certificate the orphan obtained and the last grades  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('اخر شهادة حصل عليها اليتيم و اخر درجات')}}</label> <br>
                        <label for="academic_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة اخر شهادة')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
                    </div>

                    {{-- medical_report  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('التقرير الطبي')}}</label> <br>
                        <label for="medical_report" id="medical_report_label"  class="custom-file-upload w-75 text-center"> {{__('ارفق صورة التقرير الطبي')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" id="medical_report" name="medical_report" type="file" style="display: none;" >
                        <input id="medical_report_read"   class="text-decoration-none view-file w-75" readonly />

                    </div>




                    {{-- Receipt of transferring the sponsorship amount to the orphan’s account  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('ايصال تحويل مبلغ الكفالة الى حساب اليتيم')}}</label> <br>
                        <label for="sponsorship_transfer_receipt" class="custom-file-upload w-75 text-center"> {{__('أرفق صورة الايصال')}}
                            <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                        </label>
                        <input class="hidden-file-style" name="sponsorship_transfer_receipt" type="file" id="sponsorship_transfer_receipt" style="display: none;">
                    </div>


                </div>
            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
            </div>

        </form>

    {{-- </div> --}}

    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const dateFields = [
            "#father_death",
            "#birth_date",
            "#mother_death",
            '#date1',

        ];

        dateFields.forEach(id => {
            flatpickr(id, {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d-m-Y",
                allowInput: true
            });
        });

    </script>

    <script>
        let orphans = @json($orphans);
    </script>

    {{-- عشان يملأ الحقول المخزنة مسبقا بشكل تلقائي --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var orphanIdInput = document.getElementById("orphan_id");
            var orphanCodeInput = document.getElementById("orphan_code");
            var orphanNameInput = document.getElementById("orphan_name");
            var orphanfullNameInput = document.getElementById("orphan_fullname");
            var orphanTypeInput = document.getElementById("orphan_type");
            var orphanBirthPlaceInput = document.getElementById("birth_place");
            var orphanGenderInput = document.getElementById("gender");
            var orphanBirthDateInput = document.getElementById("birth_date");
            var orphanAgeInput = document.getElementById("age");
            var orphanReasonContinuingSponsorshipInput = document.getElementById("reason_continuing_sponsorship");
            var orphanFatherDeathInput = document.getElementById("father_death");
            var orphanMotherNameInput = document.getElementById("mother_name");
            var orphanMotherDeathInput = document.getElementById("mother_death");
            var orphanFamilyNumberInput = document.getElementById("family_number");
            var orphanPhoneInput = document.getElementById("phone");
            var orphanWhatsappPhoneInput = document.getElementById("whatsapp_phone");
            var orphanGuardianRelationshipInput = document.getElementById("guardian_relationship");
            var orphanGuardianNameInput = document.getElementById("guardian_name");
            var orphanHousingTypeInput = document.getElementById("housing_type");
            var orphanHealthStatusInput = document.getElementById("health_status");
            var orphanHTypeDiseaseInput = document.getElementById("Type_disease");
            var orphanAcademicStageInput = document.getElementById("academic_stage");


            // for image  Medical Report
            var orphanMedicalReportImage = document.getElementById("medical_report_read");
            var MedicalReportImageLabel = document.getElementById("medical_report_label");
            orphanMedicalReportImage.style.display = "none";
            MedicalReportImageLabel.style.display = "block";




            console.log("Script loaded, orphans:", orphans); // تأكد أن البيانات محملة

            function fillOrphanData(orphan) {
                if (orphan) {
                    orphanIdInput.value = orphan.orphan.id || '';
                    orphanCodeInput.value = orphan.orphan.internal_code || '';
                    orphanNameInput.value = orphan.orphan.name || '';
                    orphanfullNameInput.value = orphan.orphan.name || '';
                    orphanTypeInput.value = orphan.orphan.gender || '';
                    orphanBirthPlaceInput.value = orphan.orphan.birth_place || '';
                    orphanGenderInput.value = orphan.orphan.gender || '';
                    // orphanBirthDateInput.value = orphan.orphan.birth_date || '';
                    if (orphan.orphan.birth_date) {
                        if (orphanBirthDateInput._flatpickr) {
                            orphanBirthDateInput._flatpickr.setDate(orphan.orphan.birth_date, true, "d-m-Y");
                        } else {
                            orphanBirthDateInput.value = orphan.orphan.birth_date;
                        }
                        orphanBirthDateInput.disabled = true;
                    } else {
                        orphanBirthDateInput.value = '';
                        orphanBirthDateInput.disabled = false;
                    }


                    orphanAgeInput.value = orphan.orphan.age || '';
                    orphanReasonContinuingSponsorshipInput.value = getFieldValueByDatabaseName(orphan, 'reason_continuing_sponsorship') || '';
                    // orphanFatherDeathInput.value = orphan.orphan.profile.father_death_date || '';
                    if (orphan.orphan.profile.father_death_date) {
                        if (orphanFatherDeathInput._flatpickr) {
                            orphanFatherDeathInput._flatpickr.setDate(orphan.orphan.profile.father_death_date, true, "d-m-Y");
                        } else {
                            orphanFatherDeathInput.value = orphan.orphan.profile.father_death_date;
                        }
                        orphanFatherDeathInput.disabled = true;
                    } else {
                        orphanFatherDeathInput.value = '';
                        orphanFatherDeathInput.disabled = false;
                    }


                    orphanMotherNameInput.value = orphan.orphan.profile.mother_name || '';
                    // orphanMotherDeathInput.value = orphan.orphan.profile.mother_death_date || '';
                    if (orphan.orphan.profile.mother_death_date) {
                        if (orphanMotherDeathInput._flatpickr) {
                            orphanMotherDeathInput._flatpickr.setDate(orphan.orphan.profile.mother_death_date, true, "d-m-Y");
                        } else {
                            orphanMotherDeathInput.value = orphan.orphan.profile.mother_death_date;
                        }
                        orphanMotherDeathInput.disabled = true;
                    } else {
                        orphanMotherDeathInput.value = '';
                        orphanMotherDeathInput.disabled = false;
                    }

                    orphanGuardianNameInput.value = orphan.orphan.guardian.guardian_name || '';
                    orphanGuardianRelationshipInput.value = orphan.orphan.guardian.guardian_relationship || '';
                    orphanFamilyNumberInput.value = orphan.orphan.family.family_number || '';
                    orphanPhoneInput.value = orphan.orphan.phones[0]?.phone_number || '';
                    orphanWhatsappPhoneInput.value =  getFieldValueByDatabaseName(orphan, 'whatsapp_phone') || '';
                    orphanHousingTypeInput.value = orphan.orphan.family.housing_type || '';
                    orphanHealthStatusInput.value = orphan.orphan.health_status || '';
                    orphanHTypeDiseaseInput.value = orphan.orphan.disease_description || '';
                    orphanAcademicStageInput.value = orphan.orphan.profile.academic_stage || '';

                    // image
                    // orphanMedicalReportImage.value = orphan.orphan.image.medical_report || '';

                    if (orphan.orphan.image.medical_report) {
                        // إذا كانت هناك قيمة، عرض input وتعبئته بالقيمة
                        orphanMedicalReportImage.value = orphan.orphan.image.medical_report || '';
                        orphanMedicalReportImage.style.display = "block"; // جعل العنصر مرئيًا
                        MedicalReportImageLabel.style.display = "none";

                    }



                    // make input have value disabled
                    orphanCodeInput.disabled = orphanCodeInput.value !== '';
                    orphanNameInput.disabled = orphanNameInput.value !== '';
                    orphanfullNameInput.disabled = orphanfullNameInput.value !== '';
                    orphanTypeInput.disabled = orphanTypeInput.value !== '';
                    orphanBirthPlaceInput.disabled = orphanBirthPlaceInput.value !== '';
                    orphanGenderInput.disabled = orphanGenderInput.value !== '';
                    orphanBirthDateInput.disabled = orphanBirthDateInput.value !== '';
                    orphanAgeInput.disabled = orphanAgeInput.value !== '';
                    orphanReasonContinuingSponsorshipInput.disabled = orphanReasonContinuingSponsorshipInput.value !== '';
                    orphanFatherDeathInput.disabled = orphanFatherDeathInput.value !== '';
                    orphanMotherNameInput.disabled = orphanMotherNameInput.value !== '';
                    orphanMotherDeathInput.disabled = orphanMotherDeathInput.value !== '';
                    orphanGuardianNameInput.disabled = orphanGuardianNameInput.value !== '';
                    orphanGuardianRelationshipInput.disabled = orphanGuardianRelationshipInput.value !== '';
                    orphanFamilyNumberInput.disabled = orphanFamilyNumberInput.value !== '';
                    orphanPhoneInput.disabled = orphanPhoneInput.value !== '';
                    orphanWhatsappPhoneInput.disabled = orphanWhatsappPhoneInput.value !== '';
                    orphanHousingTypeInput.disabled = orphanHousingTypeInput.value !== '';
                    orphanHealthStatusInput.disabled = orphanHealthStatusInput.value !== '';
                    orphanHTypeDiseaseInput.disabled = orphanHTypeDiseaseInput.value !== '';
                    orphanAcademicStageInput.disabled = orphanAcademicStageInput.value !== '';


                }
            }

            orphanCodeInput.addEventListener("input", function () {
                let code = orphanCodeInput.value.trim();
                let orphan = orphans.find(o => o.orphan.internal_code === code);
                console.log("Orphan found by code:", orphan);
                fillOrphanData(orphan);
            });

            orphanNameInput.addEventListener("input", function () {
                let name = orphanNameInput.value.trim();
                let orphan = orphans.find(o => o.orphan.name === name);
                console.log("Orphan found by name:", orphan);
                fillOrphanData(orphan);
            });

            function getFieldValueByDatabaseName(orphan, databaseName) {
                // قم بالبحث في بيانات الأيتام باستخدام `database_name` (يمكنك تعديلها وفقًا للبيانات المتاحة في الـ orphans)
                let fieldValue = orphan.orphan.supporter_field_values.find(field => field.field.database_name === databaseName);
                return fieldValue ? fieldValue.value : '';
            }

        });
    </script>


    @endpush

</x-main-layout>
