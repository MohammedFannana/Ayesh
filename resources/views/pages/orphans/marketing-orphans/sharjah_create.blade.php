<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين ')}}</h2>
    <h4 class="mb-5 title-color">  {{__('الحالات المدخلة - جمعية الشارقة ')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />


    <form action="{{route('orphan.marketing.sharjah.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <x-form.input name="orphan_id" :value="$orphan->id"  type="hidden"/>


        <div class="row orphans-form" style="justify-content:between;">

            <!-- name -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="orphan_id" :value="$orphan->name" class="border" type="text" label=" {{__('الاسم الكامل لليتيم ')}}"  placeholder=" أدخل الاسم الكامل لليتيم " disabled/>
            </div>

            {{-- orphan --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="orphan" class="mb-2"> {{__('يتيم الأبوين ')}}</label>
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

            {{-- birth_place--}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_place" :value="$orphan->birth_place" class="border" type="text" label=" {{__('مكان الميلاد ')}}" autocomplete="" placeholder="ادخل مكان الميلاد" disabled/>
            </div>

            {{--nationality--}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="nationality" class="border" type="text" label=" الجنسيه " autocomplete="" placeholder="أدخل الجنسيه"/>
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


            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" :value="$orphan->birth_date" class="border" type="date" label=" {{__('تاريخ ميلاد اليتيم ')}}" autocomplete=""  disabled/>
            </div>

            <!-- age -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="age" :value="$orphan->age" class="border" type="text" label=" {{__('السن')}} "  placeholder=" أدخل السن " disabled/>
            </div>

            {{-- Reason for sponsorship after puberty --}}
            {{-- <div class="col-12 mb-3">
                <x-form.textarea name="sponsorship_after_puberty" label=" سبب استمرار الكفالة بعد البلوغ " value="ادخل سبب استمرار الكفالة بعد البلوغ "/>
            </div> --}}

            {{-- father_death --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" :value="$orphan->profile->father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب ')}}" autocomplete="" disabled/>
            </div>


            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" :value="$orphan->profile->mother_name" class="border" type="text" label=" {{__('اسم الأم ')}}" autocomplete="" placeholder="ادخل اسم الأم" disabled/>
            </div>

            {{-- mother_death --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_death_date" :value="$orphan->profile->mother_death_date"  class="border" type="date" label=" {{__('تاريخ وفاة الأم في حال وفاتها ')}}" autocomplete="" disabled/>
            </div>

            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" :value="$orphan->family->family_number" class="border" type="number" label=" {{__('عدد أفراد الأسرة')}}" autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة" disabled/>
            </div>


            <!-- guardian_name -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" :value="$orphan->guardian->guardian_name" class="border" type="text" label=" {{__('اسم ولى الامر ')}}"  placeholder=" أدخل اسم ولى الامر " disabled/>
            </div>

            <!-- relationship -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" :value="$orphan->guardian->guardian_relationship" class="border" type="text" label="{{__('صلة القرابه')}}"  placeholder=" أدخل صلة القرابه" disabled/>
            </div>


            {{--  phone --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone" :value="$orphan->profile->phone" class="border" type="text" label=" {{__('الهاتف')}} " autocomplete="" placeholder="أدخل رقم الهاتف " disabled/>
            </div>

            @foreach ($fields as $field)
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __($field->field_name) }}</label>
                    @if ($field->field_type === 'textarea')
                        <br>

                        <textarea name="fields[{{ $field->id }}][value]"
                                    placeholder="{{ $field->placeholder ?? '' }}"
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
                            placeholder="{{ $field->placeholder ?? '' }}"
                            value="{{ old('fields.' . $field->id . '.value') }}"
                            class="form-control @error('fields.' . $field->id. '.value' ) is-invalid @enderror"
                        >
                        @error('fields.' . $field->id . '.value')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    @endif
                </div>
            @endforeach

            {{--  whatsapp_phone --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="whatsapp_phone" class="border" type="text" label=" {الهاتف واتساب }" autocomplete="" placeholder="أدخل رقم الهاتف واتساب   "/>
            </div> --}}

            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn add-button mb-4"  type="submit"> حفظ </button>
            </div>

    </form>


</x-main-layout>
