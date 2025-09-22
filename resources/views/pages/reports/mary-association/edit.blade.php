<x-main-layout>

    <h2 class="mb-5"> {{__('تعديل التقرير')}}</h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="{{route('report.update' , [$report->id , $report->supporter_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">

                    <!-- supervising_authority -->
                    {{-- <div class="col-12 mb-3">
                        <x-form.input name="supervising_authority" :value="$report->fields['supervising_authority']" class="border" type="text" label=" {{__('الجهة المشرفة')}}"  placeholder="أدخل اسم الجهة المشرفة"/>
                    </div> --}}

                    <!-- country -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="country"  class="border" :value="$report->fields['country']" type="text" label=" {{__('الدولة')}} " placeholder="أدخل الدولة"/>
                    </div>


                    <!-- supervising_authority_place -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="supervising_authority_place"  :value="$report->fields['supervising_authority_place']" class="border" type="text" label=" {{__('عنوان الجهة المشرفة')}}"  placeholder="أدخل عنوان الجهة المشرفة"/>
                    </div>


                    <!-- sponsor_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_name"  class="border" :value="$report->fields['sponsor_name']" type="text" label=" {{__('اسم الكافل')}}"  placeholder="أدخل اسم الكافل"/>
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" class="border" :value="$report->fields['sponsor_number']" type="text" label=" {{__('رقم الكافل')}}" autocomplete="" placeholder="أدخل رقم الكافل"/>
                    </div>

                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="name" id="orphan_name" :value="$report->orphan->name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" أدخل اسم اليتيم"  disabled/>
                    </div>

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="internal_code" id="orphan_code" :value="$report->orphan->internal_code" class="border" type="text" label="  {{__('رقم اليتيم')}}" autocomplete="" placeholder=" أدخل رقم اليتيم " disabled/>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" id="gender" class="border" :value="$report->orphan->gender ?? $report->fields['gender'] " type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" أدخل الجنس" :disabled="$report->orphan->gender ? true : false"/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" id="birth_date" class="border" :value="$report->orphan->birth_date ?? $report->fields['birth_date']" type="date" label=" {{__('تاريخ الميلاد')}}" autocomplete=""  :disabled="$report->orphan->birth_date ? true : false" />
                    </div>

                    {{-- address--}}
                    

                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="address" id="address" class="border" type="text" :value=" $report->orphan->profile->full_address ?? $report->fields['address']" label=" {{__('العنوان')}} " autocomplete="" placeholder="أدخل  العنوان"  :disabled="$report->orphan->profile->full_address ? true : false" />
                    </div>

                    {{-- phone--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="phone" id="phone" class="border" type="text" :value="$report->orphan->phones[0]->phone_number ?? $report->fields['phone']" label=" {{__('رقم التيلفون')}}" autocomplete="" placeholder="أدخل رقم التيلفون " :disabled="$report->orphan->profile->phone ? true : false" />
                    </div>

                    {{-- orphan_status--}}
                    <div class="col-12  mb-3">
                        <x-form.input name="case_type" id="case_type" class="border" :value="$report->orphan->case_type ?? $report->fields['case_type']" type="text" label="  {{__('حالة اليتيم')}}" autocomplete="" placeholder="أدخل حالة اليتيم "  :disabled="$report->orphan->case_type ? true : false" />
                    </div>



                     <div class="col-12 col-md-6 mb-3">
                        <label for="" class="mb-2"> {{__('الحالة الصحية لليتيم')}} </label>
                        <x-form.select id="health_status" name="health_status" :disabled="$report->orphan->health_status ? true : false"  :selected="$report->orphan->health_status ?? $report->fields['health_status']"
                        :options="['' =>  __('اختر'), 'مريض' => __('مريض'), 'جيدة' => __('جيدة')]"/>
                    </div>

                    <div class="col-12 col-md-6 mb-3" id="disease_description1">
                        <x-form.input name="disease_description" id="disease_description" :value="$report->orphan->disease_description ?? $report->fields['disease_description']" class="border" type="text" label="  {{__('نوع المرض')}}" autocomplete="" placeholder="{{__('أدخل نوع المرض')}}" :disabled="$report->orphan->disease_description ? true : false" />
                    </div>

                    {{-- mother_name--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_name" id="mother_name" class="border" :value="$report->orphan->profile->mother_name ?? $report->fields['mother_name']" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="أدخل اسم الأم" :disabled="$report->orphan->profile->mother_name ? true : false"/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" id="guardian_name" class="border" type="text" :value="$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']" label=" {{__('اسم المسؤول عن اليتيم')}}" autocomplete="" placeholder="أدخل اسم المسؤول عن اليتيم" :disabled="$report->orphan->guardian->guardian_name ? true : false" />
                    </div>

                    {{-- relationship_orphan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" id="guardian_relationship" class="border" type="text" :value="$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']" label=" {{__('صلة القرابة')}}" autocomplete="" placeholder="أدخل صلة القرابة" :disabled="$report->orphan->guardian->guardian_relationship ? true : false" />
                    </div>


                    {{-- religious_behavior --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="religious_behavior" class="border" type="text" label=" {{__('السلوك الديني')}}" :value="$report->fields['religious_behavior']" autocomplete="" placeholder="أدخل السلوك الديني"/>
                    </div>

                    {{-- memorize_quran --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="memorize_quran" class="border" :value="$report->fields['memorize_quran']" type="text" label=" {{__('حفظه للقران')}}" autocomplete="" placeholder="أدخل حفظه للقران"/>
                    </div>

                    {{-- class --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="class" id="class" class="border" type="text" :value="$report->orphan->profile->class ?? $report->fields['class']" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف"  :disabled="$report->orphan->profile->class ? true : false" />
                    </div>


                    {{-- academic_level --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_level" :value="$report->fields['academic_level']" class="border" type="text" label=" {{__('المستوى الدراسي')}}" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
                    </div>


                    {{-- letter_thanks --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="letter_thanks" :value="$report->fields['letter_thanks']" label=" {{__('رسالة شكر و تقدير من اليتيم')}}" />
                    </div>


                    {{-- orphan_birth_certificate  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">  {{__('شهادة ميلاد اليتيم')}}</label> <br>
                        <label for="birth_certificate" id="birth_report_label" class="custom-file-upload w-75 text-center mb-1" disabled> {{__('ارفق شهادة ميلاد اليتيم')}}</label>
                        <input class="hidden-file-style" name="birth_certificate" type="file" id="birth_certificate" style="display: none;" disabled>
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('شهادة ميلاد اليتيم') }}.{{ pathinfo($report->orphan->image->birth_certificate, PATHINFO_EXTENSION) }}
                        </a>

                    </div>

                    {{-- academic_certificate   --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('صورة الشهادة الدراسية')}}</label> <br>
                        <label for="academic_certificate"  class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة الشهادة الدراسية')}}</label>
                        <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->academic_certificate)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('صورة الشهادة الدراسية') }}.{{ pathinfo($report->academic_certificate, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                </div>
            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('تعديل')}} </button>
            </div>

        </form>

    </div>

</x-main-layout>
