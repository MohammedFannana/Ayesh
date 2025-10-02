<div class="orphans_form">

    {{-- basic-information --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> {{__('المعلومات الأساسية')}}</p>
        <div class="row orphans-form" style="justify-content:between;">

            <!-- code -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="internal_code"  value="{{$orphan->internal_code}}" class="border" type="text" label=" {{__('كود اليتيم الداخلي')}}"  placeholder="{{__('أدخل كود اليتيم')}}" />
            </div>

            <!-- name -->
            {{-- :value="$admin->email" --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name"  class="border" value="{{$orphan->name}}" type="text" label=" {{__('اسم اليتيم')}} " placeholder="{{__('أدخل اسم اليتيم')}}" />
            </div>

            {{-- national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="national_id" class="border" value="{{$orphan->national_id}}" type="text" label=" {{__('الرقم القومي لليتيم')}}" autocomplete="" placeholder="{{__('أدخل الرقم القومي لليتيم')}}" />
            </div>

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" class="border" value="{{$orphan->birth_date}}" id="birth_date" type="text" label=" {{__('تاريخ الميلاد')}}" autocomplete="" placeholder="{{__('ادخل تاريخ الميلاد')}}" />
            </div>

            {{-- birth_place--}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_place" class="border" value="{{$orphan->birth_place}}"  type="text" label=" {{__('جهة الميلاد')}}" autocomplete="" placeholder="{{__('ادخل جهة الميلاد')}}" />
            </div>

            {{-- gender --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="type" class="mb-2"> {{__('النوع')}} </label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="gender" id="male" value="ذكر"  @checked($orphan->gender =="ذكر" || old('gender')=='ذكر')>
                        <label for="male">{{__('ذكر')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female" value="أنثى" @checked($orphan->gender =="أنثى" || old('gender')=='أنثى')>
                        <label for="female">{{__('أنثى')}}</label>
                    </div>
                </div>

            </div>

            {{-- age --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="age" value="{{$orphan->age}}" class="border" type="number" label=" {{__('السن')}} " placeholder="{{__('ادخل السن')}}" min="1" autocomplete=""  />
            </div> --}}

            {{-- case_type --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2"> {{__('نوع الحالة')}} </label>
                <x-form.select id="case_type"  name="case_type" :selected="$orphan->case_type"
                    :options="['' =>  __('اختر'), 'يتيم الأبوين' => __('يتيم الأبوين'), 'يتيم' => __('يتيم')]"/>

            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2"> {{__('الحالة الصحية لليتيم')}} </label>
                <x-form.select id="health_status" name="health_status" :selected="$orphan->health_status"
                    :options="['' =>  __('اختر'), 'مريض' => __('مريض'), 'جيدة' => __('جيدة'), 'معاق' => __('معاق')]"/>
            </div>


            <div class="col-12 col-md-6 mb-3" id="disease_description">
                <x-form.input name="disease_description" value="{{$orphan->disease_description}}" class="border" type="text" label=" {{__('وصف المرض')}}" autocomplete="" placeholder="{{__('أدخل وصف المرض')}}" />
            </div>

            <div class="col-12 col-md-6 mb-3" id="disability_type">
                <x-form.input name="disability_type" value="{{$orphan->disability_type}}" class="border" type="text" label=" {{__('نوع الإعاقة')}}" autocomplete="" placeholder="{{__('أدخل نوع الإعاقة')}}" />
            </div>

            {{-- father_death_date --}}

            {{-- @if($orphan->profile && $orphan->profile->father_death_date) --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_death_date" value="{{$orphan->profile->father_death_date}}"  class="border" id="father_death_date" type="text" label=" {{__('تاريخ وفاة الأب')}}" placeholder="{{__('ادخل تاريخ وفاة الأب')}}"  autocomplete="" />
                </div>
            {{-- @endif --}}

            {{-- parents_orphan --}}
            {{-- <div class="col-12 col-md-6 mb-3 ">
                <label class="mb-2"> {{__('يتيم الأبوين')}}</label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="parents_orphan" id="both_yes" value="نعم" @checked($orphan->parents_orphan =="نعم"|| old('parents_orphan')=='نعم')>
                        <label for="yes">{{__('نعم')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="parents_orphan" id="both_no" value="لا" @checked($orphan->parents_orphan =="لا" || old('parents_orphan')=='لا')>
                        <label for="no">{{__('لا')}}</label>
                    </div>
                </div>

            </div> --}}


            {{-- mother_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" value="{{$orphan->profile->mother_name}}" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="{{__('أدخل اسم الأم')}}"/>
                </div>

            {{-- mother_national_id --}}
            {{-- @if($orphan->profile && $orphan->profile->mother_national_id) --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_national_id" class="border" value="{{$orphan->profile->mother_national_id}}" type="text" label=" {{__('الرقم القومي للأم')}} " autocomplete="" placeholder="{{__('أدخل الرقم القومي للأم')}}" />
                </div>
            {{-- @endif --}}

            {{-- mother_death_date 11 --}}
            <div class="col-12 col-md-6 mb-3" id="mother-death">
                <x-form.input name="mother_death_date" value="{{$orphan->profile->mother_death_date}}" class="border" id="mother_death_date" type="text" label=" {{__('تاريخ وفاة الأم')}}"  placeholder="{{__('ادخل تاريخ وفاة الأم')}}" />
            </div>


            {{-- mother_work --}}
            <div class="col-12 col-md-6 mb-3" id="mother-work-section">
                <label  class="mb-2"> {{__('هل تعمل الأم')}}</label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="mother_work" id="mother_work" value="نعم" @checked($orphan->profile->mother_work =="نعم" || old('mother_work')=='نعم')>
                        <label for="mother_work">{{__('نعم')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="mother_work" id="no_work" value="لا" @checked($orphan->profile->mother_work =="لا" || old('mother_work')=='لا')>
                        <label for="no_work">{{__('لا')}}</label>
                    </div>
                </div>

            </div>

            {{-- mother_condition --}}
            <div class="col-12 col-md-6 mb-3" id="mother-status">
                <label for="" class="mb-2"> {{__('حالة الأم')}} </label>
                <x-form.select name="mother_status" :selected="$orphan->profile->mother_status"
                    :options="['' => __('اختر'), 'متزوجة' => __('متزوجة'), 'أرملة' => __('أرملة')]" />

            </div>

            {{-- guardian_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" class="border" value="{{$orphan->guardian->guardian_name}}" type="text" label=" {{__('اسم الوصي')}}" autocomplete="" placeholder="{{__('أدخل اسم الوصي')}}" />
            </div>

            {{-- guardian_national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_national_id" value="{{$orphan->guardian->guardian_national_id}}" class="border" type="text" label=" {{__('الرقم القومي للوصي')}}" autocomplete="" placeholder="{{__('أدخل الرقم القومي للوصي')}}" />
            </div>

            {{-- guardian_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" value="{{$orphan->guardian->guardian_relationship}}" class="border" type="text" label=" {{__('صلة القرابة')}}" autocomplete="" placeholder="{{__('أدخل صلة القرابة')}}" />
            </div>

            {{-- guardianship_reason --}}
            <div class="col-12 col-md-6 mb-3" style="position: relative">
                <span class="text-danger" style="position: absolute; right:106px">{{__('(اختياري)')}}</span>
                <x-form.input name="guardianship_reason" value="{{$orphan->guardian->guardianship_reason}}" class="border" type="text" label=" {{__('سبب الوصاية')}}" autocomplete="" placeholder="{{__('أدخل سبب الوصاية')}}"/>
            </div>



            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" value="{{$orphan->family->family_number}}" class="border" type="number" label=" {{__('عدد أفراد الأسرة')}} " autocomplete="" min="0" placeholder="{{__('أدخل عدد أفراد الأسرة')}}" />
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="male_number" value="{{$orphan->family->male_number}}" class="border" type="number" label=" {{__('عدد الذكور')}}" autocomplete="" min="0" placeholder="{{__('أدخل عدد الذكور')}}" />
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="female_number" value="{{$orphan->family->female_number}}" class="border" type="number" label=" {{__('عدد الاناث')}}" autocomplete="" min="0" placeholder="{{__('أدخل عدد الاناث')}}" />
            </div>

            <div class="col-6 col-md-3 mb-3">
                <label for="governorate" class="mb-3"> اسم المحافظة </label>
                <select id="governorate" class="form-control form-select" name="governorate">
                    <option value="">اختر المحافظة</option>
                    @foreach($governorates as $gov)
                        <option value="{{ $gov->id }}" data-name="{{ $gov->name }}" @selected($orphan->profile->governorate === $gov->name)>
                            {{ $gov->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <label for="city-select" class="mb-3"> اسم المدينة </label>
                <select id="city-select" class="form-control form-select" name="center">
                    <option value="">اختر المدينة</option>
                </select>
            </div>


            {{-- address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="full_address" value="{{$orphan->profile->full_address}}" class="border" type="text" label=" {{__('العنوان')}}" autocomplete="" placeholder="{{__('أدخل العنوان')}}" />
            </div>

            {{-- housing_type --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_type" class="mb-2"> {{__('نوع السكن')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_type" id="owns" value="ملك" @checked($orphan->family->housing_type =="ملك" || old('housing_type')=='ملك')>
                        <label for="owns">{{__('ملك')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_type" id="rent" value="ايجار" @checked($orphan->family->housing_type=="ايجار" || old('housing_type')=='ايجار')>
                        <label for="rent">{{__('ايجار')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_type" id="shared" value="مشترك" @checked($orphan->family->housing_type =="مشترك" || old('housing_type')=='مشترك')>
                        <label for="shared">{{__('مشترك')}}</label>
                    </div>
                </div>

            </div>


            {{-- housing_case --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_status" class="mb-2"> {{__('حالة السكن')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_case" id="good" value="جيد" @checked($orphan->family->housing_case =="جيد" || old('housing_case')=='جيد')>
                        <label for="good">{{__('جيد')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_case" id="middle" value="متوسط" @checked($orphan->family->housing_case =="متوسط" || old('housing_case')=='متوسط')>
                        <label for="middle">{{__('متوسط')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_case" id="bad" value="سيء" @checked($orphan->family->housing_case =="سيء" || old('housing_case')=='سيء')>
                        <label for="bad">{{__('سيء')}}</label>
                    </div>
                </div>

            </div>

            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border"  type="text" label=" {{__('رقم التيلفون 1')}}" autocomplete="" placeholder="{{__('أدخل رقم التيلفون 1')}}" />
            </div>

            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border"  type="text" label=" {{__('رقم التيلفون 2')}}" autocomplete="" placeholder="{{__('أدخل رقم التيلفون 2')}}" />
            </div>

            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border"  type="text" label=" {{__('رقم التيلفون 3')}}" autocomplete="" placeholder="{{__('أدخل رقم التيلفون 3')}}" />
            </div>

            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border"  type="text" label=" {{__('رقم التيلفون 4')}}" autocomplete="" placeholder="{{__('أدخل رقم التيلفون 4')}}" />
            </div> --}}

            @foreach($orphan->phones as $index => $phone)
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input
                        name="phone_number[]"
                        class="border"
                        type="text"
                        label="{{ __('رقم التليفون') . ' ' . ($index + 1) }}"
                        value="{{ $phone->phone_number }}"
                        autocomplete=""
                        placeholder="{{ __('أدخل رقم التليفون') . ' ' . ($index + 1) }}"
                    />
                </div>
            @endforeach

            {{-- لو بدك تظهر فراغات إضافية لرقم جديد --}}
            @for($i = count($orphan->phones); $i < 4; $i++)
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input
                        name="phone_number[]"
                        class="border"
                        type="text"
                        label="{{ __('رقم التليفون') . ' ' . ($i + 1) }}"
                        autocomplete=""
                        placeholder="{{ __('أدخل رقم التليفون') . ' ' . ($i + 1) }}"
                    />
                </div>
            @endfor




            {{-- academic_stage --}}
            <div class="col-12 col-md-6  mb-3 ">
                <label  class="mb-2"> {{__('التعليم')}}</label>
                <div class="d-flex row justify-content-between gap-1">

                    <div class="col-6 col-md-5">
                        <input type="radio" name="academic_stage" id="under_age" value="تحت السن" @checked($orphan->profile->academic_stage =="تحت السن" || old('academic_stage')=="تحت السن")>
                        <label for="under_age">{{__('تحت السن')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage" id="general" value="عام" @checked($orphan->profile->academic_stage =="عام" || old('academic_stage')=='عام')>
                        <label for="general">{{__('عام')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage" id="Azhari" value="أزهري" @checked($orphan->profile->academic_stage =="أزهري" || old('academic_stage')=='أزهري')>
                        <label for="Azhari">{{__('أزهري')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage"  id="stage_not_enrolled" value="غير مقيد(خارج التعليم)" @checked($orphan->profile->academic_stage =="غير مقيد(خارج التعليم)" || old('academic_stage')=="غير مقيد(خارج التعليم)")>
                        <label for="stage_not_enrolled">{{__('غير مقيد(خارج التعليم)')}}</label>
                    </div>
                </div>

            </div>

            {{-- academic_stage_details --}}
            <div class="col-12 col-md-6 mb-3 " id="academic_stage_details" style="display: none">
                <label  class="mb-2"> {{__('المرحلة الدراسية')}}</label>
                <div class="d-flex row justify-content-between gap-1">

                    <div class="col-6 col-md-5">
                        <input type="radio" name="academic_stage_details" id="kindergarten" value="روضة" @checked($orphan->profile->academic_stage_details =="روضة" || old('academic_stage_details')=="روضة")>
                        <label for="kindergarten">{{__('روضة')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage_details" id="primary" value="ابتدائي" @checked($orphan->profile->academic_stage_details =="ابتدائي" || old('academic_stage_details')=='ابتدائي')>
                        <label for="primary">{{__('ابتدائي')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage_details" id="preparatory1" value="إعدادي" @checked($orphan->profile->academic_stage_details =="إعدادي" || old('academic_stage_details')=='إعدادي')>
                        <label for="preparatory1">{{__('إعدادي')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_stage_details"  id="secondary" value="ثانوي" @checked($orphan->profile->academic_stage_details =="ثانوي" || old('academic_stage_details')=="ثانوي")>
                        <label for="secondary">{{__('ثانوي')}}</label>
                    </div>
                </div>

            </div>

            {{-- academic_secondary_details --}}
            <div class="col-12 col-md-6 mb-3 " id="academic_secondary_details" style="display: none">
                <label  class="mb-2"> {{__('المرحلة الثانوية')}}</label>
                <div class="d-flex row justify-content-between gap-1">

                    <div class="col-6 col-md-5">
                        <input type="radio" name="academic_secondary_details" id="general_secondary" value="ثانوي عام" @checked($orphan->profile->academic_secondary_details =="ثانوي عام" || old('academic_secondary_details')=="ثانوي عام")>
                        <label for="general_secondary">{{__('ثانوي عام')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_secondary_details" id="commercial" value="تجاري" @checked($orphan->profile->academic_secondary_details =="تجاري" || old('academic_secondary_details')=='تجاري')>
                        <label for="commercial">{{__('تجاري')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_secondary_details" id="industrial" value="صناعي" @checked($orphan->profile->academic_secondary_details =="صناعي" || old('academic_secondary_details')=='صناعي')>
                        <label for="industrial">{{__('صناعي')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_secondary_details"  id="agricultural" value="زراعي" @checked($orphan->profile->academic_secondary_details =="زراعي" || old('academic_secondary_details')=="زراعي")>
                        <label for="agricultural">{{__('زراعي')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="academic_secondary_details"  id="nursing" value="تمريض" @checked($orphan->profile->academic_secondary_details =="تمريض" || old('academic_secondary_details')=="تمريض")>
                        <label for="nursing">{{__('تمريض')}}</label>
                    </div>
                </div>

            </div>

            {{-- Reason for not registering --}}
            <div class="col-12 col-md-6 mb-3" id="reason_not_registering" style="display: none">
                <label  class="mb-2"> {{__('سبب عدم القيد')}}</label>
                <div class="d-flex row justify-content-between gap-1">

                    <div class="col-6 col-md-5">
                        <input type="radio" name="reason_not_registering" id="sick1" value="مريض" @checked($orphan->profile->reason_not_registering =="مريض" || old('reason_not_registering')=="مريض")>
                        <label for="sick1">{{__('مريض')}}</label>
                    </div>

                    <div  class="col-6 col-md-5">
                        <input type="radio" name="reason_not_registering" id="handicapped" value="معاق" @checked($orphan->profile->reason_not_registering =="معاق" || old('reason_not_registering')=='معاق')>
                        <label for="handicapped">{{__('معاق')}}</label>
                    </div>
                    <div  class="col-6 col-md-5">
                        <input type="radio" name="reason_not_registering" id="other" value="أخرى" @checked($orphan->profile->reason_not_registering =="أخرى" || old('reason_not_registering')=='أخرى')>
                        <label for="other">{{__('أخرى')}}</label>
                    </div>

                </div>

            </div>

            {{-- other_reason_not_registering --}}
            <div class="col-12 mb-2" id="other_reason_not_registering" style="display: none">

                <x-form.textarea name="other_reason_not_registering" value="{{$orphan->profile->other_reason_not_registering}}" label="{{__('سبب عدم القيد')}}" placeholder="{{__('اكتب سبب عدم القيد')}}"/>

            </div>


            {{-- الصف الدراسي --}}
            <div class="col-12 col-md-6 mb-3" id="academic_class" style="display: none">
                <label for="" class="mb-2"> {{ __('الصف') }} </label>
                <x-form.select name="class" class="border">
                    <option value="">{{ __('اختر الصف') }}</option>
                    {{-- سيتم توليد الخيارات ديناميكيًا عبر JavaScript --}}
                </x-form.select>
            </div>




            {{-- income --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income" value="{{$orphan->family->income}}" class="border" type="text" label=" {{__('دخل الأسرة')}} "  autocomplete="" placeholder="{{__('أدخل الدخل')}}" />
            </div>

            {{-- income_source --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income_source" value="{{$orphan->family->income_source}}" class="border" type="text" label=" {{__('مصدر الدخل')}} " autocomplete="" placeholder="{{__('أدخل مصدر الدخل')}}" />
            </div>

            <div class="col-12 col-md-6 mb-3" style="position: relative">
                <x-form.input name="bank_name" value="{{$orphan->bank_name}}" class="border" type="text" label=" {{__('نوع الحساب')}}" autocomplete="" placeholder="{{__('أدخل نوع الحساب')}}"/>
            </div>

            <div class="col-12 col-md-6 mb-3" style="position: relative">
                <x-form.input name="visa_number" value="{{$orphan->visa_number}}" class="border" type="text" label=" {{__('رقم الفيزا')}}" autocomplete="" placeholder="{{__('أدخل رقم الفيزا')}}"/>
            </div>


            {{-- description --}}
            <div class="col-12 mb-3">

                <x-form.textarea name="notes" value="{{$orphan->guardian->notes}}" label="{{__('ملاحظات')}}" placeholder="{{__('اكتب ملاحظات')}}" />

            </div>

            {{-- Internal field research --}}
            <div class="col-12 mb-3">

                <x-form.textarea name="internal_research" value="{{$orphan->guardian->internal_research}}" label="{{__('البحث الميداني الداخلي')}}" value="{{__('الاسره مكونه من 4 افراد ويعيشون علي دخل بسيط وهذا الدخل لايكفي احتياجات الاسره ويحتاجون للمساعده نظرا للظروف القاسيه التي تمر بها الاسره الام تطلب استمرار الكفاله لانها الملجأ الوحيد لها')}}" />

            </div>

            {{-- internal_field_research_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="research_date"  value="{{ old('research_date', optional($orphan->guardian)->research_date ?? \Carbon\Carbon::now()->format('Y-m-d')) }}" class="border flatpickr-input" id="research_date" type="text" label=" {{__('تاريخ البحث الميداني الداخلي')}}" autocomplete=""  />
            </div>



        </div>
    </div>

    {{-- image and file  --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> {{__('الصور والملفات المطلوبة')}}</p>

        <div class="row" style="justify-content:between;">

            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('استمارة تقديم الأيتام')}}</label> <br>

                @if ($orphan->image->orphan_image_4_6)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->application_form)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{__('استمارة تقديم الأيتام')}}
                        </a>
                    </div>
                @endif


                <label for="application_form" class="custom-file-upload w-75 text-center"> {{__('ارفق الاستمارة')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>

                </label>
                <x-form.input name="application_form" class="border hidden-file-style" type="file" id="application_form" style="display: none;"  accept=".jpg,.jpeg,.png,.pdf"  autocomplete="" />
            </div>

            {{--1-  orphan_image_4_6--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('صورة اليتيم 4*6 جديدة')}}</label> <br>

                @if ($orphan->image->orphan_image_4_6)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->orphan_image_4_6)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->orphan_image_4_6) }}
                        </a>
                    </div>
                @endif


                <label for="orphan_image_4_6" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة اليتيم')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>

                </label>
                <x-form.input name="orphan_image_4_6" class="border hidden-file-style" type="file" id="orphan_image_4_6" style="display: none;"  accept=".jpg,.jpeg,.png,.pdf"  autocomplete="" />
            </div>

            {{--2- birth_certificate --}}
            <div class="col-12 col-md-6 mb-3">

                <label class="mb-2"> {{__('شهادة الميلاد اصل كمبيوتر')}}</label> <br>

                @if ($orphan->image->birth_certificate)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->birth_certificate)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->birth_certificate) }}
                        </a>
                    </div>
                @endif

                <label for="birth_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة الميلاد')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                {{-- <input class="hidden-file-style" name="birth_certificate" type="file" id="birth_certificate" style="display: none;"> --}}
                <x-form.input name="birth_certificate" class="border hidden-file-style" type="file" id="birth_certificate" style="display: none;" accept=".jpg,.jpeg,.png,.pdf" autocomplete="" />


            </div>

            {{--3- father_death_certificate --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__('شهادة وفاة الأب اصل كمبيوتر')}}</label> <br>

                @if ($orphan->image->father_death_certificate)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->father_death_certificate)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->father_death_certificate) }}
                        </a>
                    </div>
                @endif

                <label for="father_death_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة وفاة الأب')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="father_death_certificate" class="border hidden-file-style" type="file" id="father_death_certificate" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />
            </div>

            {{--4- mother_card --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('صورة من بطاقة الأم أو الوصي')}}</label> <br>

                @if ($orphan->image->mother_card)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->mother_card)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->mother_card) }}
                        </a>
                    </div>
                @endif

                <label for="mother_card" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة بطاقة الأم أو الوصي')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="mother_card" class="border hidden-file-style" type="file" id="mother_card" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />

            </div>

            {{--5- school_benefit --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">   {{__('الافادة المدرسية')}} </label> <br>

                @if ($orphan->image->school_benefit)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->school_benefit)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->school_benefit) }}
                        </a>
                    </div>
                @endif

                <label for="school_benefit" class="custom-file-upload w-75 text-center">  {{__('أرفق صورة الافادة المدرسية')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="school_benefit" class="border hidden-file-style" type="file" id="school_benefit" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />

            </div>

            {{--6 social_research --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   {{__('البحث الاجتماعى')}} </label> <br>

                @if ($orphan->image->social_research)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->social_research)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->social_research) }}
                        </a>
                    </div>
                @endif

                <label for="social_research" class="custom-file-upload w-75 text-center">  {{__('أرفق البحث الاجتماعى')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="social_research" class="border hidden-file-style" type="file" id="social_research" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />

            </div>

            {{--7 medical_report --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">  {{__('التقرير الطبي')}} </label> <br>

                @if ($orphan->image->medical_report)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->medical_report)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->medical_report) }}
                        </a>
                    </div>
                @endif

                <label for="medical_report" class="custom-file-upload w-75 text-center">  {{__('ارفق صورة التقرير الطبي')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="medical_report" class="border hidden-file-style" type="file" id="medical_report" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />

            </div>


            {{--8 mother_death_certificate --}}
            <div class="col-12 col-md-6 mb-3" id="div_mother_death_certificate" style="display: none">
                <label class="mb-2"> {{__('شهادة وفاة الأم اصل كمبيوتر')}}</label> <br>

                @if ($orphan->image->mother_death_certificate)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->mother_death_certificate)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->mother_death_certificate) }}
                        </a>
                    </div>
                @endif

                <label for="mother_death_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة وفاة الأم')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="mother_death_certificate" class="border hidden-file-style" type="file" id="mother_death_certificate" style="display: none;" accept=".jpg,.jpeg,.png,.pdf" autocomplete="" />

            </div>

             {{--9 data_validation --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">   {{__('إقرار بصحة البيانات')}} </label> <br>

                @if ($orphan->image->data_validation)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->data_validation)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->data_validation) }}
                        </a>
                    </div>
                @endif

                <label for="data_validation" class="custom-file-upload w-75 text-center">  {{__('أرفق إقرار بصحة البيانات')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="data_validation" class="border hidden-file-style" type="file" id="data_validation" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />

            </div>


            {{-- 10 orphan_image_9_12--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__('صورة اليتيم كاملة 9*12')}} </label> <br>

                @if ($orphan->image->orphan_image_9_12)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->orphan_image_9_12)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->orphan_image_9_12) }}
                        </a>
                    </div>
                @endif

                <label for="orphan_image_9_12" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة اليتيم')}}
                    <img src="" width="60"  alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="orphan_image_9_12" class="border hidden-file-style" type="file" id="orphan_image_9_12" style="display: none;"  autocomplete="" accept=".jpg,.jpeg,.png,.pdf" />
            </div>

            {{--11 guardianship_decision --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   {{__('قرار وصاية')}} </label> <br>

                @if ($orphan->image->guardianship_decision)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->guardianship_decision)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->guardianship_decision) }}
                        </a>
                    </div>
                @endif

                <label for="guardianship_decision" class="custom-file-upload w-75 text-center">  {{__('أرفق قرار وصاية')}}
                        <img src="" width="60" alt="">
                        <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="guardianship_decision" class="border hidden-file-style" type="file" id="guardianship_decision" style="display: none;"  accept=".jpg,.jpeg,.png,.pdf" autocomplete="" />

            </div>


            {{-- agricultural_holding --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">   {{__(' حيازة زراعية ')}} </label> <br>

                @if ($orphan->image->agricultural_holding)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->agricultural_holding)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->agricultural_holding) }}
                        </a>
                    </div>
                @endif

                <label for="agricultural_holding" class="custom-file-upload w-75 text-center">  {{__('أرفق صورة حيازة زراعية')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="agricultural_holding" class="border hidden-file-style" type="file" id="agricultural_holding" style="display: none;" accept=".jpg,.jpeg,.png,.pdf"  autocomplete="" />
            </div>

            {{-- visa_file --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">  {{__(' صورة الفيزا ')}} </label> <br>

                @if ($orphan->image->visa_file)
                    <div class="w-75 mb-2">
                        <a href="{{ route('orphan.image', ['file' => encrypt($orphan->image->visa_file)]) }}" type="button"
                            class="text-decoration-none view-file w-100">
                            {{ basename($orphan->image->visa_file) }}
                        </a>
                    </div>
                @endif

                <label for="visa_file" class="custom-file-upload w-75 text-center">  {{__('أرفق صورة الفيزا')}}
                    <img src="" width="60" alt="">
                    <div class="file-preview mt-2"></div>
                </label>
                <x-form.input name="visa_file" class="border hidden-file-style" type="file" id="visa_file" style="display: none;" accept=".jpg,.jpeg,.png,.pdf"  autocomplete="" />
            </div>

            {{-- registrar_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_name" class="border" type="text" label="  {{__('التسجيل')}} " autocomplete="" placeholder=" {{__('أدخل اسم المسجل')}}"  value="{{ old('registrar_name', $orphan->profile->registrar_name ?? auth()->user()->name) }}"/>
            </div>

            {{-- registrar_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_date" class="border flatpickr-input"  id="registrar_date"  type="text" label="{{__('تاريخ التسجيل')}}" autocomplete=""      value="{{ old('registrar_date', $orphan->profile->registrar_date ?? \Carbon\Carbon::today()->toDateString()) }}" />
            </div>


        </div>

    </div>


    <div class="d-flex justify-content-center gap-4 mt-4">
        <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
    </div>

</div>
