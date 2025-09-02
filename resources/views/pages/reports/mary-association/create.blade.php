<x-main-layout>

    <h2 class="mb-4">  {{__('انشاء تقرير')}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('جمعية السيدة مريم')}}</h4>


    <form action="{{route('report.maryam.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="bg-white p-3 mb-3 rounded shadow-sm">

            <div class="row" style="justify-content:between;">

                {{-- supporter_id --}}
                <input type="hidden" name="supporter_id" value="{{$supporter_id}}" />

                {{-- orphan_id --}}
                <input type="hidden" name="orphan_id" value=""  id="orphan_id"/>

                <!-- supervising_authority -->
                {{-- <div class="col-12 mb-3">
                    <x-form.input name="supervising_authority"  class="border" type="text" label=" {{__('الجهة المشرفة')}}"  placeholder="{{__('أدخل اسم الجهة المشرفة')}}"/>
                </div> --}}

                <!-- country -->
                {{-- :value="$admin->email" --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="country"  class="border" type="text" label=" {{__('الدولة')}} " placeholder="{{__('أدخل الدولة')}}"/>
                </div>


                <!-- supervising_authority_place -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="supervising_authority_place"  class="border" type="text" label=" {{__('عنوان الجهة المشرفة')}}"  placeholder="{{__('أدخل عنوان الجهة المشرفة')}}"/>
                </div>


                <!-- sponsor_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="sponsor_name"  class="border" type="text" label=" {{__('اسم الكافل')}}"  placeholder="{{__('أدخل اسم الكافل')}}"/>
                </div>

                {{-- sponsor_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="sponsor_number" class="border" type="text" label=" {{__('رقم الكافل')}}" autocomplete="" placeholder="{{__('أدخل رقم الكافل')}}"/>
                </div>

                {{-- orphan_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل اسم اليتيم')}}"/>
                </div>

                {{-- orphan_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_code" id="orphan_code" class="border" type="text" label="  {{__('رقم اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل رقم اليتيم')}}"/>
                </div>

                {{-- gender --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="gender" id="gender" class="border" type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" {{__('أدخل الجنس')}} "/>
                </div>

                {{-- birth_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_date" id="birth_date" class="border" type="text" label=" {{__('تاريخ الميلاد')}}" autocomplete=""/>
                </div>

                {{-- address--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="address" id="address" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="{{__('أدخل العنوان')}}"/>
                </div>

                {{-- phone--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="phone" id="phone" class="border" type="text" label=" {{__('رقم التيلفون')}}" autocomplete="" placeholder="{{__('أدخل رقم التيلفون')}}"/>
                </div>

                {{-- orphan_status--}}
                <div class="col-12  mb-3">
                    <x-form.input name="case_type" id="case_type" class="border" type="text" label="  {{__('حالة اليتيم')}}" autocomplete="" placeholder="{{__('أدخل حالة اليتيم')}}"/>
                </div>

                {{-- health_status --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="health_status" id="health_status" class="border" type="text" label="  {{__('الحالة الصحية')}}" autocomplete="" placeholder="{{__('أدخل الحالة الصحية')}}"/>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="" class="mb-2"> {{__('الحالة الصحية لليتيم')}} </label>
                    <x-form.select id="health_status" name="health_status"
                    :options="['' =>  __('اختر'), 'مريض' => __('مريض'), 'جيدة' => __('جيدة')]"/>
                </div>

                <div class="col-12 col-md-6 mb-3" id="disease_description1">
                    <x-form.input name="disease_description" id="disease_description" class="border" type="text" label="  {{__('نوع المرض')}}" autocomplete="" placeholder="{{__('أدخل نوع المرض')}}"/>
                </div>

                {{-- mother_name--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" id="mother_name" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="{{__('أدخل اسم الأم')}}"/>
                </div>

                {{-- person_responsible--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="guardian_name" id="guardian_name" class="border" type="text" label=" {{__('اسم المسؤول عن اليتيم')}}" autocomplete="" placeholder="{{__('أدخل اسم المسؤول عن اليتيم')}}"/>
                </div>

                {{-- relationship_orphan --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="guardian_relationship" id="guardian_relationship" class="border" type="text" label=" {{__('صلة القرابة')}}" autocomplete="" placeholder="{{__('أدخل صلة القرابة')}}"/>
                </div>


                {{-- religious_behavior --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="religious_behavior" class="border" type="text" label=" {{__('السلوك الديني')}}" autocomplete="" placeholder="{{__('أدخل السلوك الديني')}}"/>
                </div>

                {{-- memorize_quran --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="memorize_quran" class="border" type="number" min="0" max="30" label=" {{__('حفظه للقران')}}" autocomplete="" placeholder="{{__('أدخل حفظه للقران')}}"/>
                </div>

                {{-- class --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="class" id="class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="{{__('أدخل الصف')}}"/>
                </div>


                {{-- academic_level --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="academic_level" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="{{__('أدخل المستوى الدراسي')}}"/>
                </div>


                {{-- letter_thanks --}}
                <div class="col-12  mb-3">
                    <x-form.textarea name="letter_thanks" label=" {{__('رسالة شكر و تقدير من اليتيم')}}"  placeholder="{{__('أدخل رسالة شكر و تقدير من اليتيم')}}"/>
                </div>


                {{-- orphan_birth_certificate  --}}
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2"> {{__('شهادة ميلاد اليتيم')}}</label> <br>
                    <label for="birth_certificate" id="birth_report_label" class="custom-file-upload w-75 text-center"> {{__('ارفق شهادة ميلاد اليتيم')}}
                    <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                    </label>
                    <input class="hidden-file-style" name="birth_certificate" type="file" id="birth_certificate" style="display: none;">
                    <input id="birth_report"   class="text-decoration-none view-file w-75" readonly />
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2"> {{__(' صورة اليتيم ')}}</label> <br>
                    <label for="profile_image" id="birth_report_label" class="custom-file-upload w-75 text-center"> {{__('ارفق  صورة اليتيم')}}
                    <img src="" width="60" alt="">
                            <div class="file-preview mt-2"></div>
                    </label>
                    <input class="hidden-file-style" name="profile_image" type="file" id="profile_image" style="display: none;">
                </div>

                {{-- academic_certificate   --}}
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">  {{__('صورة الشهادة الدراسية')}}</label> <br>
                    <label for="academic_certificate"  class="custom-file-upload w-75 text-center"> {{__('ارفق صورة الشهادة الدراسية')}}
                        <img src="" width="60" alt="">
                        <div class="file-preview mt-2"></div>
                    </label>
                    <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
                </div>


                {{--    --}}
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">  {{__('صورة إيصال الدفع')}}</label> <br>
                    <label for="payment_receipt"  class="custom-file-upload w-75 text-center"> {{__('ارفق صورة إيصال الدفع')}}
                        <img src="" width="60" alt="">
                        <div class="file-preview mt-2"></div>
                    </label>
                    <input class="hidden-file-style" name="payment_receipt" type="file" id="payment_receipt" style="display: none;">
                </div>


            </div>
        </div>


        <div class="d-flex justify-content-center gap-4 mt-4">
            <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
        </div>


    </form>

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
            var orphanGenderInput = document.getElementById("gender");
            var orphanBirthDateInput = document.getElementById("birth_date");
            var orphanMotherNameInput = document.getElementById("mother_name");
            var orphanPhoneInput = document.getElementById("phone");
            var orphanAddressInput = document.getElementById("address");
            var orphanGuardianRelationshipInput = document.getElementById("guardian_relationship");
            var orphanGuardianNameInput = document.getElementById("guardian_name");
            var orphanHealthStatusInput = document.getElementById("health_status");
            var orphanDiseaseDescriptionInput = document.getElementById("disease_description");
            var orphanCaseTypeInput = document.getElementById("case_type");
            var orphanClasseInput = document.getElementById("class");


            // // for image  Medical Report
            var orphanBirthReportImage = document.getElementById("birth_report");
            var BirthReportImageLabel = document.getElementById("birth_report_label");
            orphanBirthReportImage.style.display = "none";
            BirthReportImageLabel.style.display = "block";


            console.log("Script loaded, orphans:", orphans); // تأكد أن البيانات محملة

            function fillOrphanData(orphan) {
                if (orphan) {
                    orphanIdInput.value = orphan.orphan.id || '';
                    orphanCodeInput.value = orphan.orphan.internal_code || '';
                    orphanNameInput.value = orphan.orphan.name || '';
                    orphanGenderInput.value = orphan.orphan.gender || '';
                    orphanBirthDateInput.value = orphan.orphan.birth_date || '';
                    orphanMotherNameInput.value = orphan.orphan.profile.mother_name || '';
                    orphanGuardianNameInput.value = orphan.orphan.guardian.guardian_name || '';
                    orphanGuardianRelationshipInput.value = orphan.orphan.guardian.guardian_relationship || '';
                    orphanPhoneInput.value = orphan.orphan.phones[0].phone_number || '';
                    orphanAddressInput.value =
                        (orphan.orphan.profile.governorate || '') + ' / ' +
                        (orphan.orphan.profile.center || '') + ' / ' +
                        (orphan.orphan.profile.full_address || '');

                    orphanHealthStatusInput.value = orphan.orphan.health_status || '';
                    orphanDiseaseDescriptionInput.value = orphan.orphan.disease_description || '';
                    orphanCaseTypeInput.value = orphan.orphan.case_type || '';
                    orphanClasseInput.value = orphan.orphan.profile.class || '';

                    // image
                    orphanBirthReportImage.value = orphan.orphan.image.birth_certificate || '';

                    if (orphan.orphan.image.birth_certificate) {
                        // إذا كانت هناك قيمة، عرض input وتعبئته بالقيمة
                        orphanBirthReportImage.value = orphan.orphan.image.birth_certificate || '';
                        orphanBirthReportImage.style.display = "block"; // جعل العنصر مرئيًا
                        BirthReportImageLabel.style.display = "none";

                    }



                    // make input have value disabled
                    orphanCodeInput.disabled = orphanCodeInput.value !== '';
                    orphanNameInput.disabled = orphanNameInput.value !== '';
                    orphanGenderInput.disabled = orphanGenderInput.value !== '';
                    orphanBirthDateInput.disabled = orphanBirthDateInput.value !== '';
                    orphanMotherNameInput.disabled = orphanMotherNameInput.value !== '';
                    orphanGuardianNameInput.disabled = orphanGuardianNameInput.value !== '';
                    orphanGuardianRelationshipInput.disabled = orphanGuardianRelationshipInput.value !== '';
                    orphanPhoneInput.disabled = orphanPhoneInput.value !== '';
                    orphanAddressInput.disabled = orphanAddressInput.value !== '';
                    orphanHealthStatusInput.disabled = orphanHealthStatusInput.value !== '';
                    orphanDiseaseDescriptionInput.disabled = orphanDiseaseDescriptionInput.value !== '';
                    orphanCaseTypeInput.disabled = orphanCaseTypeInput.value !== '';
                    orphanClasseInput.disabled = orphanClasseInput.value !== '';


                }
            }

            orphanCodeInput.addEventListener("input", function () {
                let code = orphanCodeInput.value.trim();
                let orphan = orphans.find(o => o.orphan.internal_code === code);
                // console.log("Orphan found by code:", orphan);
                fillOrphanData(orphan);
            });

            orphanNameInput.addEventListener("input", function () {
                let name = orphanNameInput.value.trim();
                let orphan = orphans.find(o => o.orphan.name === name);
                // console.log("Orphan found by name:", orphan);
                fillOrphanData(orphan);
            });

            function getFieldValueByDatabaseName(orphan, databaseName) {
                // قم بالبحث في بيانات الأيتام باستخدام `database_name` (يمكنك تعديلها وفقًا للبيانات المتاحة في الـ orphans)
                let fieldValue = orphan.orphan.supporter_field_values.find(field => field.field.database_name === databaseName);
                return fieldValue ? fieldValue.value : '';
            }

        });
    </script>


{{-- for id="health_status" --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const healthSelect = document.getElementById('health_status');
                const diseaseField = document.getElementById('disease_description1');

                function toggleFields() {
                    const value = healthSelect.value;

                    // أخفِ الجميع أولاً
                    diseaseField.style.display = 'none';

                    // ثم أظهر حسب الاختيار
                    if (value === 'مريض') {
                        diseaseField.style.display = 'block';
                    }
                }

                // عند تحميل الصفحة
                toggleFields();

                // عند تغيير الخيار
                healthSelect.addEventListener('change', toggleFields);
            });
        </script>


    @endpush


</x-main-layout>
