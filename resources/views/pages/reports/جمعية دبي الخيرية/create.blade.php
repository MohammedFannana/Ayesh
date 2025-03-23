<x-main-layout>

    <h2 class="mb-4"> {{__(' انشاء تقرير ')}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('جمعية دبي الخيرية ')}}</h4>


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('report.dubai.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">


                    {{-- supporter_id --}}
                    <input type="hidden" name="supporter_id" value="{{$supporter_id}}" />

                    {{-- orphan_id --}}
                    <input type="hidden" name="orphan_id" value=""  id="orphan_id"/>

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_number" id="orphan_code" class="border" type="text" label="  {{__('رقم اليتيم ')}}" autocomplete="" placeholder=" أدخل رقم اليتيم "/>
                    </div>

                    {{-- report_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="report_date" class="border" type="date" label="  {{__('تاريخ التقرير ')}}" autocomplete=""/>
                    </div>

                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم ')}}" autocomplete="" placeholder=" أدخل اسم اليتيم"/>
                    </div>

                    {{-- nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" id="nationality" class="border" type="text" label=" {{__('الجنسية')}} " autocomplete="" placeholder=" أدخل الجنسية  "/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" id="birth_date" class="border" type="date" label="  {{__('تاريخ الميلاد ')}}" autocomplete=""/>
                    </div>

                    {{-- birth_place --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_place" id="birth_place" class="border" type="text" label=" {{__('مكان الميلاد ')}} " autocomplete="" placeholder=" أدخل مكان الميلاد   "/>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" id="gender" class="border" type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" أدخل الجنس  "/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" id="guardian_name" class="border" type="text" label=" {{__('اسم المسؤول عن اليتيم')}}" autocomplete="" placeholder="أدخل اسم المسؤول عن اليتيم"/>
                    </div>

                    {{-- mother_name--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_name" id="mother_name" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="أدخل اسم الأم"/>
                    </div>

                    {{-- father_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="father_death_date" id="father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب ')}}" autocomplete=""/>
                    </div>


                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية ')}}" autocomplete="" placeholder="أدخل المرحلة الدراسية"/>
                    </div>

                    {{-- health_status --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="health_status" id="health_status" class="border" type="text" label="  {{__('الحالة الصحية ')}}" autocomplete="" placeholder="أدخل الحالة الصحية"/>
                    </div>


                    {{-- Health notes --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="health_notes" label=" {{__('ملاحظات على الحالة الصحية ')}}"  placeholder="أدخل ملاحظات على الحالة الصحية"/>
                    </div>

                    {{-- orphanage_management_notes --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="orphan_management_notes" label="  {{__('ملاحظات إدارة الأيتام ')}}"  placeholder="أدخل  ملاحظات إدارة الأيتام"/>
                    </div>


                    {{-- address_supervising_authority --}}
                    <div class="col-12 mb-3">
                        <x-form.input name="address_supervising_authority" class="border" type="text" label=" {{__('عنوان الجهة المشرفة')}}" autocomplete="" placeholder="أدخل عنوان الجهة المشرفة"/>
                    </div>

                    {{-- electronic_supervisory_seal --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('ختم اللجنة المشرفة الالكتروني')}}</label> <br>
                        <label for="supporter_seal" class="custom-file-upload w-75 text-center"> {{__('ارفق ختم اللجنة المشرفة الالكتروني ')}}</label>
                        <input class="hidden-file-style" name="supporter_seal" type="file" id="supporter_seal" style="display: none;">
                    </div>


                    {{-- dubai_accreditation --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">   {{__('اعتماد جمعية دبي الخيرية')}}</label> <br>
                        <label for="supporter_accreditation" class="custom-file-upload w-75 text-center"> {{__('ارفق اعتماد جمعية دبي الخيرية ')}} </label>
                        <input class="hidden-file-style" name="supporter_accreditation" type="file" id="supporter_accreditation" style="display: none;">
                    </div>


                    {{-- image --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('صورة اليتيم')}}</label> <br>
                        <label for="orphan_image" id="orphan_image_label" class="custom-file-upload w-75 text-center"> {{__('ارفق  صورة اليتيم ')}} </label>
                        <input class="hidden-file-style" name="orphan_image" type="file" id="orphan_image" style="display: none;">
                        <input id="orphan_report"   class="text-decoration-none view-file w-75" readonly />

                    </div>


                    {{-- group_photo --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('صورة جماعية')}}</label> <br>
                        <label for="group_photo" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة جماعية ')}}</label>
                        <input class="hidden-file-style" name="group_photo" type="file" id="group_photo" style="display: none;">
                    </div>


                    {{-- orphan_message--}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('رسالة اليتيم للكافل')}}</label> <br>
                        <label for="thanks_letter" class="custom-file-upload w-75 text-center"> {{__('ارفق رسالة اليتيم للكافل ')}}</label>
                        <input class="hidden-file-style" name="thanks_letter" type="file" id="thanks_letter" style="display: none;">
                    </div>


                    {{-- orphan_educational  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('شهادة اليتيم الدارسية')}}</label> <br>
                        <label for="academic_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق شهادة اليتيم الدارسية ')}}</label>
                        <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
                    </div>


                </div>
            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
            </div>

        </form>

    {{-- </div> --}}

    @push('scripts')

    <script>
        let orphans = @json($orphans);
    </script>

    {{-- عشان يملأ الحقول المخزنة مسبقا بشكل تلقائي --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var orphanIdInput = document.getElementById("orphan_id");
            var orphanCodeInput = document.getElementById("orphan_code");
            var orphanNameInput = document.getElementById("orphan_name");
            var orphanBirthPlaceInput = document.getElementById("birth_place");
            var orphanNationalityInput = document.getElementById("nationality");
            var orphanGenderInput = document.getElementById("gender");
            var orphanBirthDateInput = document.getElementById("birth_date");
            var orphanFatherDeathInput = document.getElementById("father_death_date");
            var orphanMotherNameInput = document.getElementById("mother_name");
            var orphanAcademicStageInput = document.getElementById("academic_stage");
            var orphanGuardianNameInput = document.getElementById("guardian_name");
            var orphanHealthStatusInput = document.getElementById("health_status");


            // for image  Medical Report
            var orphanOrphanReportImage = document.getElementById("orphan_report");
            var orphanReportImageLabel = document.getElementById("orphan_image_label");
            orphanOrphanReportImage.style.display = "none";
            orphanReportImageLabel.style.display = "block";






            console.log("Script loaded, orphans:", orphans); // تأكد أن البيانات محملة

            function fillOrphanData(orphan) {
                if (orphan) {
                    orphanIdInput.value = orphan.orphan.id || '';
                    orphanCodeInput.value = orphan.orphan.internal_code || '';
                    orphanNameInput.value = orphan.orphan.name || '';
                    orphanBirthPlaceInput.value = orphan.orphan.birth_place || '';
                    orphanNationalityInput.value = getFieldValueByDatabaseName(orphan, 'nationality') || '';
                    orphanGenderInput.value = orphan.orphan.gender || '';
                    orphanBirthDateInput.value = orphan.orphan.birth_date || '';
                    orphanFatherDeathInput.value = orphan.orphan.profile.father_death_date || '';
                    orphanMotherNameInput.value = orphan.orphan.profile.mother_name || '';
                    orphanGuardianNameInput.value = orphan.orphan.guardian.guardian_name || '';
                    orphanHealthStatusInput.value = orphan.orphan.health_status || '';
                    orphanAcademicStageInput.value = orphan.orphan.profile.academic_stage || '';

                    // image
                    orphanOrphanReportImage.value = orphan.orphan.image.orphan_image_4_6 || '';

                    if (orphan.orphan.image.orphan_image_4_6) {
                        // إذا كانت هناك قيمة، عرض input وتعبئته بالقيمة
                        orphanOrphanReportImage.value = orphan.orphan.image.orphan_image_4_6 || '';
                        orphanOrphanReportImage.style.display = "block"; // جعل العنصر مرئيًا
                        orphanReportImageLabel.style.display = "none";

                    }



                    // make input have value disabled
                    orphanCodeInput.disabled = orphanCodeInput.value !== '';
                    orphanNameInput.disabled = orphanNameInput.value !== '';
                    orphanBirthPlaceInput.disabled = orphanBirthPlaceInput.value !== '';
                    orphanNationalityInput.disabled = orphanNationalityInput.value !== '';
                    orphanGenderInput.disabled = orphanGenderInput.value !== '';
                    orphanBirthDateInput.disabled = orphanBirthDateInput.value !== '';
                    orphanFatherDeathInput.disabled = orphanFatherDeathInput.value !== '';
                    orphanMotherNameInput.disabled = orphanMotherNameInput.value !== '';
                    orphanGuardianNameInput.disabled = orphanGuardianNameInput.value !== '';
                    orphanHealthStatusInput.disabled = orphanHealthStatusInput.value !== '';
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
