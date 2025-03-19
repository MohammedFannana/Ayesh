<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين ')}}</h2>
    <h4 class="mb-5 title-color">  {{__('الحالات المدخلة - جمعية المجموعة ')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />

    <form action="{{route('orphan.marketing.alBer.store')}}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row orphans-form" style="justify-content:between;">

            <x-form.input name="orphan_id" :value="$orphan->id"  type="hidden"/>


            <!-- sub_association_name -->
            {{-- <div class="col-12  mb-3">
                <x-form.input name="sub_ssociation_name"  class="border" type="text" label=" اسم الجمعية الفرعية "  placeholder=" أدخل اسم الجمعية الفرعية "/>
            </div> --}}

            <!-- orphan_number -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="internal_code" :value="$orphan->internal_code" class="border" type="text" label=" {{__('رقم اليتيم ')}}"  placeholder=" أدخل رقم اليتيم " disabled/>
            </div>

            <!-- orphan_name -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name" :value="$orphan->name" class="border" type="text" label=" {{__('اسم اليتيم ')}}"  placeholder=" أدخل اسم اليتيم " disabled/>
            </div>

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" :value="$orphan->birth_date" class="border" type="date" label=" {{__('تاريخ ميلاد اليتيم ')}}" autocomplete="" disabled/>
            </div>

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

            {{-- father_death --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" :value="$orphan->profile->father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب ')}}" autocomplete="" disabled/>
            </div>


            {{-- brothers_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" :value="$orphan->family->family_number" class="border" type="number" label=" {{__('عدد الأخوة')}}" autocomplete="" min="0" placeholder="أدخل عدد الأخوة" disabled/>
            </div>

            {{-- academic_stage --}}
            <div class="col-12 col-md-6 mb-3 ">
                <x-form.input name="academic_stage" :value="$orphan->profile->academic_stage" class="border" type="text" label=" {{__('المرحلة الدراسية ')}} " autocomplete="" placeholder="أدخل المرحلة الدراسية  " disabled/>
            </div>

            {{-- class --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="class" :value="$orphan->profile->class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف" disabled/>
            </div>


            {{-- Health status --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="health_status" :value="$orphan->health_status" class="border" type="text" label=" {{__('حاله اليتيم الصحيه ')}}" autocomplete="" placeholder="أدخل حاله اليتيم الصحيه " disabled/>
            </div>


            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" :value="$orphan->profile->mother_name" class="border" type="text" label=" {{__('اسم الأم ')}}" autocomplete="" placeholder="ادخل اسم الأم" disabled/>
            </div>

            {{-- mother_work --}}
            <div class="col-12 col-md-6 mb-3">

                <label for="mother_work"> {{__('هل تعمل الام ')}}</label>
                <select name="mother_work" id="mother_work" class= "form-control form-select @if ( $errors->has('mother_work')) is-invalid @endif" style="width:100%; border-radius: 0.375rem;    border-color: rgb(209 213 219);" disabled>

                    <option value="نعم" @selected($orphan->profile->mother_work === 'نعم')> {{__('نعم')}} </option>
                    <option value="لا" @selected($orphan->profile->mother_work === 'لا')> لا </option>

                </select>

                <x.form.validation-feedback name="mother_work" />
            </div>

            {{-- responsible --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" :value="$orphan->guardian->guardian_name" class="border" type="text" label=" {{__('المسئول المباشر عن اليتيم ')}}" autocomplete="" placeholder="أدخل  المسئول المباشر عن اليتيم" disabled/>
            </div>


            {{--  orphan_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" :value="$orphan->guardian->guardian_relationship" class="border" type="text" label=" {{__('صلته باليتيم ')}}" autocomplete="" placeholder="أدخل صلته باليتيم" disabled/>
            </div>

            {{--  address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="address" :value="$orphan->family->address" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="أدخل العنوان " disabled/>
            </div>

            {{-- notes --}}
            {{-- <div class="col-12 mb-3">
                <x-form.textarea name="notes" label="ملاحظات" value="اكتب ملاحظات"/>
            </div> --}}

            {{--  date --}}
            {{-- <div class="col-12 col-md-6 mb-3">
                <x-form.input name="date" class="border" type="text" label=" التاريخ " autocomplete="" placeholder="أدخل تاريخ  "/>
            </div> --}}


            {{-- signature --}}
            {{-- <div class="col-12 col-md-6 mb-3">

                <label class="mb-2"> توقيع المسؤول </label> <br>
                <label for="signature" class="custom-file-upload w-50 text-center"> ارفق  صورة التوقيع  </label>
                <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

            </div> --}}

            @foreach ($fields as $field)
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __($field->field_name) }}</label>
                    @if ($field->field_type === 'file')
                        <br>
                        <label for="field_{{ $field->id }}" class="custom-file-upload w-50 text-center">
                            {{ __('ارفق صورة ' . $field->field_name) }}
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

                    @elseif($field->field_type === 'textarea')

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
