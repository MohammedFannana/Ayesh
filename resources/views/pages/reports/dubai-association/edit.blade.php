<x-main-layout>

    @push('styles')

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @endpush

    <h2 class="mb-5"> {{__('تعديل التقرير')}}</h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="{{route('report.update' , [$report->id , $report->supporter_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="bg-white p-3 mb-3 rounded shadow-sm">

                <div class="row" style="justify-content:between;">

                    {{-- orphan_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_number" :value="$report->orphan->internal_code" id="orphan_code" class="border" type="text" label="  {{__('رقم اليتيم')}}" autocomplete="" placeholder=" أدخل رقم اليتيم " disabled/>
                    </div>

                    {{-- report_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="report_date" id="report_date" value="{{$report->fields['report_date']}}" class="border" type="text" label="  {{__('تاريخ التقرير')}}" autocomplete=""/>
                    </div>

                    {{-- orphan_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="orphan_name" :value="$report->orphan->name" id="orphan_name" class="border" type="text" label=" {{__('اسم اليتيم')}}" autocomplete="" placeholder=" أدخل اسم اليتيم" disabled/>
                    </div>

                    {{-- nationality --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality" value="مصري" id="nationality" class="border" type="text" label=" {{__('الجنسية')}} " autocomplete="" placeholder=" أدخل الجنسية  " disabled/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" :value="$report->orphan->birth_date ?? $report->fields['birth_date']" id="birth_date" class="border" type="text" label="{{__('تاريخ الميلاد')}}" />
                    </div>

                    {{-- birth_place --}}
                    <div class="col-12 col-md-6 row mb-3">
                        <label class="mb-2"> {{__('مكان الميلاد')}}  </label>
                        <div class="col-6  mb-3">
                            
                            <select id="governorate" class="form-control form-select" name="governorate">
                                <option value="">اختر المحافظة</option>
                                @foreach($governorates as $gov)
                                    <option value="{{ $gov->id }}" data-name="{{ $gov->name }}" @selected(($report->orphan->profile->governorate ?? $report->fields['governorate']) === $gov->name) >
                                        {{ $gov->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <!--<label for="city-select" class="mb-3"> اسم المدينة </label>-->
                            <select id="city-select" class="form-control form-select" name="center">
                                <option value="">اختر المدينة</option>
                            </select>
                        </div>
                    </div>

                    {{-- gender --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="gender" id="gender" :value="$report->orphan->gender ?? $report->fields['gender']" class="border" type="text" label=" {{__('الجنس')}} " autocomplete="" placeholder=" أدخل الجنس  " :disabled="$report->orphan->gender ? true : false"/>
                    </div>

                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_name" :value="$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name']" id="guardian_name" class="border" type="text" label=" {{__('اسم المسؤول عن اليتيم')}}" autocomplete="" placeholder="أدخل اسم المسؤول عن اليتيم" :disabled="$report->orphan->guardian->guardian_name ? true : false"/>
                    </div>
                    
                    {{-- person_responsible--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="guardian_relationship" :value="$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship']"  id="guardian_relationship" class="border" type="text" label=" {{__(' صلة القرابة ')}}"  placeholder="{{__('أدخل صلة القرابة ')}} " :disabled="$report->orphan->guardian->guardian_relationship? true : false"/>
                    </div>

                    {{-- mother_name--}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="mother_name" :value="$report->orphan->profile->mother_name ?? $report->fields['mother_name']" id="mother_name" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="أدخل اسم الأم" :disabled="$report->orphan->profile->mother_name ? true : false"/>
                    </div>

                    {{-- father_death --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="father_death_date" :value="$report->orphan->profile->father_death_date ?? $report->fields['father_death_date']" id="father_death_date" class="border" type="text" label=" {{__('تاريخ وفاة الأب')}}" autocomplete="" :disabled="$report->orphan->profile->father_death_date ? true : false"/>
                    </div>


                    {{-- academic_stage --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="academic_stage" :value="$report->orphan->profile->academic_stage ?? $report->fields['academic_stage']" id="academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}}" autocomplete="" placeholder="أدخل المرحلة الدراسية" :disabled="$report->orphan->profile->academic_stage ? true : false"/>
                    </div>

                    {{-- health_status --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="health_status" :value="$report->orphan->health_status ?? $report->fields['health_status']" id="health_status" class="border" type="text" label="  {{__('الحالة الصحية')}}" autocomplete="" placeholder="أدخل الحالة الصحية" :disabled="$report->orphan->health_status ? true : false"/>
                    </div>


                    {{-- Health notes --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="health_notes" :value="$report->fields['health_notes']" label=" {{__('ملاحظات على الحالة الصحية')}}"  placeholder="أدخل ملاحظات على الحالة الصحية"/>
                    </div>

                    {{-- orphanage_management_notes --}}
                    <div class="col-12  mb-3">
                        <x-form.textarea name="orphan_management_notes" :value="$report->fields['orphan_management_notes']" label="  {{__('ملاحظات إدارة الأيتام')}}"  placeholder="أدخل  ملاحظات إدارة الأيتام"/>
                    </div>


                    {{-- address_supervising_authority --}}
                    <div class="col-12 mb-3">
                        <x-form.input name="address_supervising_authority" :value="$report->fields['address_supervising_authority']" class="border" type="text" label=" {{__('عنوان الجهة المشرفة')}}" autocomplete="" placeholder="أدخل عنوان الجهة المشرفة"/>
                    </div>

                    {{-- electronic_supervisory_seal --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('ختم اللجنة المشرفة الالكتروني')}}</label> <br>
                        <label for="supporter_seal" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق ختم اللجنة المشرفة الالكتروني')}}</label>
                        <input class="hidden-file-style" name="supporter_seal" type="file" id="supporter_seal" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->supporter_seal)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('ختم اللجنة المشرفة الالكتروني') }}.{{ pathinfo($report->supporter_seal, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                    {{-- dubai_accreditation --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2">   {{__('اعتماد جمعية دبي الخيرية')}}</label> <br>
                        <label for="supporter_accreditation" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق اعتماد جمعية دبي الخيرية')}} </label>
                        <input class="hidden-file-style" name="supporter_accreditation" type="file" id="supporter_accreditation" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->supporter_accreditation)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('اعتماد جمعية دبي الخيرية') }}.{{ pathinfo($report->supporter_accreditation, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                    {{-- image --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('صورة اليتيم')}}</label> <br>
                        <label for="orphan_image" id="orphan_image_label" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق  صورة اليتيم')}} </label>
                        <input class="hidden-file-style" name="orphan_image" type="file" id="orphan_image" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->orphan->image->orphan_image_4_6)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('صورة اليتيم') }}.{{ pathinfo($report->orphan->image->orphan_image_4_6, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                    {{-- group_photo --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('صورة جماعية')}}</label> <br>
                        <label for="group_photo" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق صورة جماعية')}}</label>
                        <input class="hidden-file-style" name="group_photo" type="file" id="group_photo" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->group_photo)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('صورة جماعية') }}.{{ pathinfo($report->group_photo, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                    {{-- orphan_message--}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('رسالة اليتيم للكافل')}}</label> <br>
                        <label for="thanks_letter" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق رسالة اليتيم للكافل')}}</label>
                        <input class="hidden-file-style" name="thanks_letter" type="file" id="thanks_letter" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->thanks_letter)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('رسالة اليتيم للكافل') }}.{{ pathinfo($report->thanks_letter, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                    {{-- orphan_educational  --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('شهادة اليتيم الدارسية')}}</label> <br>
                        <label for="academic_certificate" class="custom-file-upload w-75 text-center mb-1"> {{__('ارفق شهادة اليتيم الدارسية')}}</label>
                        <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
                        <a href="{{route('orphan.image' , ['file' => encrypt($report->academic_certificate)])}}" type="button" class="text-decoration-none view-file w-75">
                            {{ __('شهادة اليتيم الدارسية') }}.{{ pathinfo($report->academic_certificate, PATHINFO_EXTENSION) }}
                        </a>
                    </div>


                </div>
            </div>


            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('تعديل')}} </button>
            </div>

        </form>

    </div>

    @push('scripts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            const dateFields = [
                "#father_death_date",
                "#birth_date",
                "#report_date"
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
            const governorates = @json($governorates);
            const selectedCenter = @json($report->orphan->profile->center ?? $report->fields['center']);
        
            $(document).ready(function () {
                $('#governorate').select2({ placeholder: 'اختر المحافظة' });
                $('#city-select').select2({ placeholder: 'اختر المدينة' });
        
                // عند تحميل الصفحة: تشغيل تغيير لتعبئة المدن إذا كانت المحافظة مختارة
                if ($('#governorate').val()) {
                    $('#governorate').trigger('change');
                }
        
                $('#governorate').on('change', function () {
                    const selectedId = parseInt($(this).val());
                    const citySelect = $('#city-select');
        
                    citySelect.empty().append('<option value="">اختر المدينة</option>');
        
                    const selectedGov = governorates.find(g => g.id === selectedId);
                    if (selectedGov && selectedGov.cities.length > 0) {
                        selectedGov.cities.forEach(city => {
                            const isSelected = city.name === selectedCenter ? 'selected' : '';
                            citySelect.append(`<option value="${city.name}" ${isSelected}>${city.name}</option>`);
                        });
                    }
        
                    citySelect.trigger('change');
                });
                    $('#governorate').trigger('change');
            });
        </script>
    @endpush

</x-main-layout>
