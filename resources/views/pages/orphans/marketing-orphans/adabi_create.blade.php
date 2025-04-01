<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>
    <h4 class="mb-5 title-color">  {{__('الحالات المدخلة - جمعية دبي الخيرية')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />

    <form action="{{route('orphan.marketing.sharjah.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row orphans-form" style="justify-content:between;">

            <x-form.input name="orphan_id" :value="$orphan->id"  type="hidden"/>


            <!-- name -->
            {{-- :value="$admin->email" --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name" :value="$orphan->name"  class="border" type="text" label=" {{__('اسم اليتيم')}} " placeholder="أدخل اسم اليتيم" disabled/>
            </div>

            {{--nationality--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="nationality" class="border" type="text" label=" الجنسيه " autocomplete="" placeholder="أدخل الجنسيه"/>
            </div> --}}

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input  name="birth_date" :value="$orphan->birth_date" class="border" type="date" label=" {{__('تاريخ ميلاد اليتيم')}}" autocomplete="" disabled/>
            </div>

            {{-- gender --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label class="mb-2"> {{__('الجنس')}} </label>
                <div class="d-flex" style="gap: 180px">
                    <div>
                        <input type="radio" name="gender" id="male" value="ذكر" @checked($orphan->gender === 'ذكر') disabled>
                        <label for="male">{{__('ذكر')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female" value="أنثى" @checked($orphan->gender === 'أنثى') disabled>
                        <label for="female">{{__('أنثى')}}</label>
                    </div>
                </div>

            </div>

            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" :value="$orphan->profile->mother_name" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="ادخل اسم الأم" disabled/>
            </div>

            {{-- mother_marital_status --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="orphan" class="mb-2"> {{__('الحالة الاجتماعية للأم')}}</label>
                <div class="d-flex" style="gap: 180px">
                    <div>
                        <input type="radio" name="mother_marital_status" id="married" value="متزوجة" @checked($orphan->profile->mother_status === 'متزوجة') disabled>
                        <label for="married">{{__('متزوجة')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="mother_marital_status" id="widow" value="أرملة" @checked($orphan->profile->mother_status === 'أرملة') disabled>
                        <label for="widow">{{__('أرملة')}}</label>
                    </div>
                </div>

            </div>


            {{-- father_death --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" :value="$orphan->profile->father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب')}}" autocomplete="" />
            </div>

            {{-- death_reason --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="death_reason" class="border" type="text" label=" سبب الوفاة " autocomplete="" placeholder="ادخل سبب وفاة الأب"/>
            </div> --}}

            {{-- responsible --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" :value="$orphan->guardian->guardian_name" class="border" type="text" label="  {{__('ولي أمر أو المسؤول المباشر عن اليتيم')}}" autocomplete="" placeholder="{{__('أدخل  المسؤول المباشر عن اليتيم')}}" disabled/>
            </div>


            {{--  orphan_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" :value="$orphan->guardian->guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم')}}" autocomplete="" placeholder="{{__('أدخل صلته باليتيم')}}" disabled/>
            </div>

            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" :value="$orphan->family->family_number" class="border" type="number" label=" {{__('عدد أفراد الأسرة')}}"  autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة" disabled/>
            </div>

            {{-- male_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="male_number" :value="$orphan->family->male_number" class="border" type="number" label=" {{__('عدد الذكور')}}" autocomplete="" min="1" placeholder="{{__('أدخل عدد الذكور')}}" disabled/>
            </div>

            {{-- female_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="female_number" :value="$orphan->family->female_number" class="border" type="number" label=" {{__('عدد الاناث')}}" autocomplete="" min="1" placeholder="{{__('أدخل عدد الاناث')}}" disabled/>
            </div>

            {{-- sponsored_number --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="sponsored_number" class="border" type="number" label=" عدد المكفولين منهم " autocomplete="" placeholder=" أدخل عدد المكفولين منهم "/>
            </div> --}}

            {{-- income --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income" :value="$orphan->family->income" class="border" type="text" label=" {{__('دخل الأسرة')}}" autocomplete="" placeholder="{{__('أدخل الدخل')}}" disabled/>
            </div>

            {{-- income_type --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income_type" class="border" type="text" label=" نوع الدخل" autocomplete="" placeholder="أدخل نوع الدخل"/>
            </div> --}}

            {{--  address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="address" :value="$orphan->family->address" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="أدخل العنوان  " disabled/>
            </div>

            {{--  phone --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone" :value="$orphan->profile->phone" class="border" type="text" label=" {{__('الهاتف')}} " autocomplete="" placeholder="أدخل رقم الهاتف " disabled/>
            </div>

            {{-- housing_type --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_type"  class="mb-2"> {{__('نوع السكن')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_type" id="owns" value="ملك" @checked($orphan->family->housing_type ==='ملك') disabled>
                        <label for="owns">{{__('ملك')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_type" id="rent" value="ايجار" @checked($orphan->family->housing_type ==='ايجار') disabled>
                        <label for="rent">{{__('ايجار')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_type" id="shared" value="مشترك" @checked($orphan->family->housing_type ==='مشترك') disabled>
                        <label for="shared">{{__('مشترك')}}</label>
                    </div>
                </div>

            </div>

            {{-- housing_case --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_status" class="mb-2"> {{__('حالة السكن')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_case" id="good" value="جيد"  @checked($orphan->family->housing_case ==='جيد') disabled>
                        <label for="good">{{__('جيد')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_case" id="middle" value="متوسط"  @checked($orphan->family->housing_case ==='متوسط') disabled>
                        <label for="middle">{{__('متوسط')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_case" id="bad" value="سيء"  @checked($orphan->family->housing_case ==='سيء') disabled>
                        <label for="bad">{{__('سيء')}}</label>
                    </div>
                </div>

            </div>

            {{-- Health status --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="health_status" :value="$orphan->health_status" class="border" type="text" label=" {{__('الحالة الصحية لليتيم')}}" autocomplete="" placeholder="أدخل الحالة الصحية لليتبم" disabled/>
            </div>

            {{-- academic_stage --}}
            <div class="col-12 col-md-6 mb-3 ">
                <x-form.input name="academic_stage" :value="$orphan->profile->academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}} " autocomplete="" placeholder="أدخل المرحلة الدراسية  " disabled/>
            </div>

            {{-- class --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="class" :value="$orphan->profile->class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف" disabled/>
            </div>

            {{-- marital_status --}}
            {{-- <div class="col-12 mb-3">
                <x-form.textarea name="marital_status" label=" الحالة الاجتماعية لأسرة اليتيم (رأي المشرف الاجتماعي) " value="ادخل الحالة الاجتماعية"/>
            </div> --}}

            @foreach ($fields as $field)
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ translate_text($field->field_name) }}</label>
                    @if ($field->field_type === 'textarea')
                        <br>

                        <textarea name="fields[{{ $field->id }}][value]"
                                    placeholder="{{ translate_text($field->placeholder) ?? '' }}"
                                    value="{{ old('fields.' . $field->id . '.value') }}"
                                    class="form-control @error('fields.' . $field->id . '.value') is-invalid @enderror"
                                    >

                        </textarea>

                        @error('fields.' . $field->id . '.value')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    @else
                        <input
                            type="{{ $field->field_type }}"
                            name="fields[{{ $field->id }}][value]"
                            placeholder="{{ translate_text($field->placeholder) ?? '' }}"
                            value="{{ old('fields.' . $field->id . '.value') }}"
                            class="form-control @error('fields.' . $field->id . '.value') is-invalid @enderror"
                        >
                        @error('fields.' . $field->id . '.value')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    @endif
                </div>
            @endforeach



            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
            </div>

        </div>

    </form>


</x-main-layout>
