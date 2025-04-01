<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>
    <h4 class="mb-5 title-color">  {{__('الحالات المدخلة - جمعية دار البر')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />

    <form action="{{route('orphan.marketing.alBer.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row orphans-form" style="justify-content:between;">
            <x-form.input name="orphan_id" :value="$orphan->id"  type="hidden"/>

            <!-- orphan_id -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="internal_code" value="{{$orphan->internal_code}}" class="border" type="text" label=" {{__('رقم اليتيم')}}"  placeholder=" أدخل رقم اليتيم " disabled/>
            </div>

            <!-- organization_name -->
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="organization_name"  class="border" type="text" label=" {{__('اسم الهيئة ')}}"  placeholder=" أدخل اسم الهيئة "/>
            </div> --}}

            <!-- organization_id -->
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="organization_number"  class="border" type="text" label=" {{__('رقم الهيئة ')}}"  placeholder=" أدخل رقم الهيئة "/>
            </div> --}}

            <!-- country -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="country" value="{{$orphan->certified_orphan_extras->country}}" class="border" type="text" label="{{__('الدولة')}}"  placeholder=" أدخل الدولة" disabled/>
            </div>

            <!-- city -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="city" value="{{$orphan->certified_orphan_extras->city}}" class="border" type="text" label="{{__('المدينة')}}"  placeholder=" أدخل المدينة" disabled/>
            </div>

            <!-- name -->
            {{-- :value="$admin->email" --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name" :value="$orphan->name"  class="border" type="text" label="{{__('اسم اليتيم')}}" placeholder="{{__('أدخل اسم اليتيم')}}" disabled/>
            </div>

            <!-- father_name -->
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_name"  class="border" type="text" label="{{__('اسم الاب')}}" placeholder="أدخل اسم الاب"/>
            </div> --}}

            <!-- grandfather_name -->
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="grandfather_name"  class="border" type="text" label="{{__('اسم الجد')}}" placeholder="أدخل اسم الجد"/>
            </div> --}}


            <!-- last_name -->
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="last_name"  class="border" type="text" label="{{__('اسم العائلة')}}" placeholder="أدخل اسم العائلة"/>
            </div> --}}

            {{--nationality--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="nationality" class="border" type="text" label=" {{__('الجنسيه')}} " autocomplete="" placeholder="أدخل الجنسيه"/>
            </div> --}}

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

            {{-- orphan --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="orphan" class="mb-2"> {{__('يتيم الأبوين')}}</label>
                <div class="d-flex" style="gap: 180px">
                    <div>
                        <input type="radio" name="parents_orphan" id="yes" value="نعم" @checked($orphan->profile->parents_orphan === 'نعم') disabled>
                        <label for="yes">{{__('نعم')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="parents_orphan" id="no" value="لا" @checked($orphan->profile->parents_orphan === 'لا') disabled>
                        <label for="no">{{__('لا')}}</label>
                    </div>
                </div>

            </div>

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" class="border" :value="$orphan->birth_date" type="date" label=" {{__('تاريخ ميلاد اليتيم')}}" autocomplete="" disabled/>
            </div>

            {{-- birth_place--}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_place" :value="$orphan->birth_place" class="border" type="text" label=" {{__('مكان الميلاد')}}" autocomplete="" placeholder="ادخل مكان الميلاد" disabled/>
            </div>

            {{-- father_death --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" :value="$orphan->profile->father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب')}}" autocomplete="" disabled/>
            </div>

            {{-- father_religion--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_religion" class="border" type="text" label="  {{__('ديانه الأب ')}}" autocomplete="" placeholder="ادخل ديانه الأب"/>
            </div> --}}

            {{-- mother_religion--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_religion" class="border" type="text" label="  {{__('ديانه الأم ')}}" autocomplete="" placeholder="ادخل ديانه الأم"/>
            </div> --}}

            {{-- mother_work --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_work" class="border" type="text" label="  {{__('عمل الأم ')}}" autocomplete="" placeholder="ادخل عمل الأم"/>
            </div> --}}

            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" :value="$orphan->profile->mother_name" class="border" type="text" label=" {{__('اسم الأم')}}" autocomplete="" placeholder="ادخل اسم الأم" disabled/>
            </div>

            {{-- mother_salary--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_salary" class="border" type="text" label=" {{__('الراتب الشهري للأم ')}}" autocomplete="" placeholder="ادخل الراتب الشهري للأم"/>
            </div> --}}

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

            {{--  subsidies --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="other_subsidies" class="border" type="text" label=" {{__('اعانات أخرى')}}" autocomplete="" placeholder=" أدخل عدد المكفولين عنهم " />
            </div> --}}

            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" :value="$orphan->family->family_number" class="border" type="number" label=" {{__('عدد أفراد الأسرة')}}" autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة" disabled/>
            </div>

            {{-- male_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="male_number" :value="$orphan->family->male_number" class="border" type="number" label="{{__('عدد الذكور')}}" autocomplete="" min="1" placeholder="أدخل عدد الذكور " disabled/>
            </div>

            {{-- female_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="female_number" :value="$orphan->family->female_number"  class="border" type="number" label="{{__('عدد الاناث')}}" autocomplete="" min="1" placeholder="أدخل عدد الاناث " disabled/>
            </div>

            {{-- sponsored_number --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="sponsored_number" class="border" type="number" label=" {{__('عدد المكفولين عنهم ')}}" autocomplete="" placeholder=" أدخل عدد المكفولين عنهم "/>
            </div> --}}

            {{-- Health status --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="health_status" :value="$orphan->health_status" class="border" type="text" label=" {{__('حالة اليتيم الصحية')}}" autocomplete="" placeholder="أدخل حاله اليتيم الصحيه " disabled/>
            </div>


            {{-- academic_stage --}}
            <div class="col-12 col-md-6 mb-3 ">
                <x-form.input name="academic_stage" :value="$orphan->profile->academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية')}} " autocomplete="" placeholder="أدخل المرحلة الدراسية  " disabled/>
            </div>

            {{-- class --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="class" class="border" :value="$orphan->profile->class" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف" disabled/>
            </div>


            {{-- responsible --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" :value="$orphan->guardian->guardian_name" class="border" type="text" label=" {{__('المسؤول المباشر عن اليتيم')}}" autocomplete="" placeholder="أدخل  المسئول المباشر عن اليتيم" disabled/>
            </div>


            {{--  orphan_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" :value="$orphan->guardian->guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم')}}" autocomplete="" placeholder="أدخل صلته باليتيم" disabled/>
            </div>

            {{--  address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="full_address" :value="$orphan->profile->full_address" class="border" type="text" label=" {{__('عنوان اليتيم بالكامل')}}" autocomplete="" placeholder="أدخل عنوان اليتيم بالكامل " disabled/>
            </div>

            {{--  phone --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone" :value="$orphan->profile->phone" class="border" type="text" label=" {{__('الهاتف')}} " autocomplete="" placeholder="أدخل رقم الهاتف " disabled/>
            </div>

            {{--  authority_official --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="authority_official" class="border" type="text" label=" {{__('المسئول عن الهيئة ')}}" autocomplete="" placeholder="أدخل المسئول عن الهيئة "/>
            </div>

            {{--  release_date --}}
            {{--<div class="col-12 col-md-6 mb-3">
                <x-form.input name="release_date" class="border" type="date" label=" {{__('تاريخ الاصدار ')}}" autocomplete="" placeholder="أدخل تاريخ الاصدار "/>
            </div> --}}



            {{-- signature_seal --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__(' التوقيع و الختم  ')}}</label> <br>
                <label for="signature_seal" class="custom-file-upload w-50 text-center"> {{__('ارفق صورة التوقيع ')}}</label>
                <x-form.input name="signature_seal" class="border hidden-file-style" type="file" id="signature_seal" style="display: none;"  autocomplete="" />

            </div> --}}

            @foreach ($fields as $field)
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ translate_text($field->field_name) }}</label>
                    @if ($field->field_type === 'file')
                        <br>
                        <label for="field_{{ $field->id }}" class="custom-file-upload w-75 text-center">
                            {{ translate_text('ارفق صورة ' . $field->field_name) }}
                        </label>
                        <input
                            name="fields[{{ $field->id }}][file]"
                            class="border hidden-file-style @error('fields.' . $field->id . '.file') is-invalid @enderror"
                            type="file"
                            id="field_{{ $field->id }}"
                            style="display: none;"

                        />
                        @error('fields.' . $field->id . '.file')
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

    </form>


</x-main-layout>
