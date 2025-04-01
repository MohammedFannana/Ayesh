<x-main-layout>

    <h2 class="mb-4">  {{__('انشاء تقرير ')}}</h2>
    <h4 class="mb-4" style="color:var(--title-color);"> {{__('جمعية دار البر ')}}</h4>


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('report.Albar.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">


                    {{-- supporter_id --}}
                    <input type="hidden" name="supporter_id" value="{{$supporter_id}}" />

                    {{-- orphan_id --}}
                    <input type="hidden" name="orphan_id" value=""  id="orphan_id"/>

                    <!-- supervising_authority -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority"  class="border" type="text" label="  {{__('الجهة المشرفة')}}"  placeholder="{{__('أدخل اسم الجهة المشرفة')}}"/>
                    </div>


                    <!-- country -->
                    {{-- :value="$admin->email" --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority_country"  class="border" type="text" label=" {{__('الدولة')}} " placeholder="{{__('أدخل الدولة')}}"/>
                    </div>

                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name"  class="border" type="text" label=" {{__('اسم الكافل')}}"  placeholder="{{__('أدخل اسم الكافل')}}"/>
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" class="border" type="text" label=" {{__('رقم ملف الكافل')}}" autocomplete="" placeholder="{{__('أدخل رقم ملف الكافل')}}"/>
                    </div>

                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل اسم اليتيم')}}"/>
                    </div>

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_code" id="orphan_code" class="border" type="text" label="  {{__('رقم ملف اليتيم')}}" autocomplete="" placeholder="{{__('أدخل رقم ملف اليتيم')}}"/>
                    </div>

                    {{-- orphan_nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" id="nationality" class="border" type="text" label="  {{__('جنسية اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل جنسية اليتيم')}} "/>
                    </div>

                    {{-- orphan_age --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="age" id="age" class="border" type="text" label="  {{__('عمر اليتيم')}}" autocomplete="" placeholder=" {{__('أدخل عمر اليتيم')}} "/>
                    </div>


                    {{-- Health status --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="health_status" id="health_status" label="{{__('الحالة الصحية لليتيم')}}"  placeholder="{{__('أدخل الحالة الصحية لليتبم')}}"/>
                    </div>

                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}}" autocomplete="" placeholder="{{__('أدخل المرحلة الدراسية')}}"/>
                    </div>

                    {{-- class --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="class" id="class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="{{__('أدخل الصف')}}"/>
                    </div>


                    {{-- academic_level --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_level" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="{{__('أدخل المستوى الدراسي')}}"/>
                    </div>



                    {{-- orphan_obligations_islam --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_obligations_islam" class="border" type="text" label=" {{__('التزامات اليتيم بتعاليم الاسلام')}}" autocomplete="" placeholder="{{__('أدخل التزامات اليتيم بتعاليم الاسلام')}}"/>
                    </div>

                    {{-- save_orphan_quran --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="save_orphan_quran" class="border" type="text" label=" {{__('حفظ اليتيم من القران الكريم')}}" autocomplete="" placeholder="{{__('أدخل حفظ اليتيم من القران الكريم')}}"/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" id="guardian_name" class="border" type="text" label=" {{__('المسؤول المباشر عن اليتيم')}}" autocomplete="" placeholder="{{__('أدخل المسؤول المباشر عن اليتيم')}}"/>
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" id="guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم')}}" autocomplete="" placeholder="{{__('أدخل صلته باليتيم')}}"/>
                    </div>


                    {{-- changes_orphan_year --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="changes_orphan_year" label=" {{__('أبرز التغيرات التي طرأت على اليتيم هذه السنة')}}" />
                    </div>


                    {{--  authority_comment_guarantee --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="authority_comment_guarantee" label=" {{__('تعليق الهيئة على أثر الكفالة')}}"  placeholder="{{__('أدخل تعليق الهيئة على أثر الكفالة')}}"/>
                    </div>


                    {{-- orphan_message--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="orphan_message" label=" {{__('رسالة اليتيم للكافل')}}"  />
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
                var orphanNationalityInput = document.getElementById("nationality");
                var orphanAgeInput = document.getElementById("age");
                var orphanGuardianRelationshipInput = document.getElementById("guardian_relationship");
                var orphanGuardianNameInput = document.getElementById("guardian_name");
                var orphanHealthStatusInput = document.getElementById("health_status");
                var orphanAcademicStageInput = document.getElementById("academic_stage");
                var orphanClassInput = document.getElementById("class");



                console.log("Script loaded, orphans:", orphans); // تأكد أن البيانات محملة

                function fillOrphanData(orphan) {
                    if (orphan) {
                        orphanIdInput.value = orphan.orphan.id || '';
                        orphanCodeInput.value = orphan.orphan.internal_code || '';
                        orphanNameInput.value = orphan.orphan.name || '';
                        orphanNationalityInput.value = getFieldValueByDatabaseName(orphan, 'nationality') || '';
                        orphanAgeInput.value = orphan.orphan.age || '';
                        orphanGuardianNameInput.value = orphan.orphan.guardian.guardian_name || '';
                        orphanGuardianRelationshipInput.value = orphan.orphan.guardian.guardian_relationship || '';
                        orphanHealthStatusInput.value = orphan.orphan.health_status || '';
                        orphanAcademicStageInput.value = orphan.orphan.profile.academic_stage || '';
                        orphanClassInput.value = orphan.orphan.profile.class || '';



                        // make input have value disabled
                        orphanCodeInput.disabled = orphanCodeInput.value !== '';
                        orphanNameInput.disabled = orphanNameInput.value !== '';
                        orphanNationalityInput.disabled = orphanNationalityInput.value !== '';
                        orphanAgeInput.disabled = orphanAgeInput.value !== '';
                        orphanGuardianNameInput.disabled = orphanGuardianNameInput.value !== '';
                        orphanGuardianRelationshipInput.disabled = orphanGuardianRelationshipInput.value !== '';
                        orphanHealthStatusInput.disabled = orphanHealthStatusInput.value !== '';
                        orphanAcademicStageInput.disabled = orphanAcademicStageInput.value !== '';
                        orphanClassInput.disabled = orphanClassInput.value !== '';

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
