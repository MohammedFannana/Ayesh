<x-main-layout>

    <h2 class="mb-5"> {{__('تعديل التقرير ')}}</h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="{{route('report.update' , [$report->id , $report->donor_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">

                    <!-- supervising_authority -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority" :value="$report->fields['supervising_authority']"  class="border" type="text" label="  {{__('اسم الجهة المشرفة ')}}"  placeholder="أدخل اسم الجهة المشرفة"/>
                    </div>


                    <!-- country -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority_country" :value="$report->fields['supervising_authority_country']"  class="border" type="text" label=" {{__('الدولة')}} " placeholder="أدخل الدولة"/>
                    </div>

                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name"  :value="$report->fields['sponsor_name']" class="border" type="text" label=" {{__('اسم الكافل ')}}"  placeholder="أدخل اسم الكافل "/>
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" :value="$report->fields['sponsor_number']" class="border" type="text" label=" {{__('رقم ملف الكافل ')}}" autocomplete="" placeholder="أدخل رقم ملف الكافل"/>
                    </div>

                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="name" :value="$report->orphan->name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم ')}}" autocomplete="" placeholder=" أدخل اسم اليتيم" disabled/>
                    </div>

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="internal_code" id="orphan_code" :value="$report->orphan->internal_code" class="border" type="text" label="  {{__('رقم ملف اليتيم ')}}" autocomplete="" placeholder=" أدخل رقم ملف اليتيم " disabled/>
                    </div>

                    {{-- orphan_nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" :value="$report->orphan->getFieldValueByDatabaseName('nationality')" id="nationality" class="border" type="text" label="  {{__('جنسية اليتيم ')}}" autocomplete="" placeholder=" أدخل جنسية اليتيم  " disabled/>
                    </div>

                    {{-- orphan_age --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="age" :value="$report->orphan->age" id="age"  class="border" type="text" label="  {{__('عمر اليتيم ')}}" autocomplete="" placeholder=" أدخل عمر اليتيم  " disabled/>
                    </div>


                    {{-- Health status --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="health_status" :value="$report->orphan->health_status" id="health_status" label="{{__('الحالة الصحية لليتيم')}}"  placeholder="أدخل الحالة الصحية لليتبم" disabled/>
                    </div>

                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" id="academic_stage" :value="$report->orphan->profile->academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية ')}}" autocomplete="" placeholder="أدخل المرحلة الدراسية" disabled/>
                    </div>

                    {{-- class --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="class" id="class" :value="$report->orphan->profile->class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف" disabled/>
                    </div>


                    {{-- academic_level --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_level" :value="$report->fields['academic_level']" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
                    </div>



                    {{-- orphan_obligations_islam --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_obligations_islam" :value="$report->fields['orphan_obligations_islam']" class="border" type="text" label=" {{__('التزامات اليتيم بتعاليم الاسلام ')}}" autocomplete="" placeholder="أدخل التزامات اليتيم بتعاليم الاسلام"/>
                    </div>

                    {{-- save_orphan_quran --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="save_orphan_quran" :value="$report->fields['save_orphan_quran']" class="border" type="text" label=" {{__('حفظ اليتيم من القران الكريم ')}}" autocomplete="" placeholder="أدخل حفظ اليتيم من القران الكريم"/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" :value="$report->orphan->guardian->guardian_name" id="guardian_name" class="border" type="text" label=" {{__('المسؤول المباشر عن اليتيم')}}" autocomplete="" placeholder="أدخل المسؤول المباشر عن اليتيم" disabled/>
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" :value="$report->orphan->guardian->guardian_relationship" id="guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم')}}" autocomplete="" placeholder="أدخل صلته باليتيم" disabled/>
                    </div>


                    {{-- changes_orphan_year --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="changes_orphan_year" :value="$report->fields['changes_orphan_year']" label=" {{__('أبرز التغيرات التي طرأت على اليتيم هذه السنة ')}}" />
                    </div>


                    {{--  authority_comment_guarantee --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="authority_comment_guarantee" :value="$report->fields['authority_comment_guarantee']" label=" {{__('تعليق الهيئة على أثر الكفالة ')}}"  placeholder="أدخل تعليق الهيئة على أثر الكفالة"/>
                    </div>


                    {{-- orphan_message--}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="orphan_message"  :value="$report->fields['orphan_message']" label=" {{__('رسالة اليتيم للكافل ')}}"  />
                    </div>


                </div>

            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__(' تعديل ')}} </button>
            </div>


        </form>

    </div>

</x-main-layout>
