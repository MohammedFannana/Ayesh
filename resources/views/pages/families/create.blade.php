<x-main-layout>

    <h2 class="mb-4"> {{__('الأسر الأولى بالرعاية')}} </h2>
    <h4 class="mb-4 title-color"> {{__('استمارة كفالة الأسرة')}}</h4>

    <x-alert name="success" />
    <x-alert name="danger" />


    <form action="{{route('family.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="orphans_form">

            {{-- basic-information --}}
            <div class="bg-white p-3 mb-3 rounded shadow-sm">
                <div class="row orphans-form" style="justify-content:between;">

                    <!--  families_number -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="families_number"  class="border" type="text" label=" {{__('رقم الأسرة')}}"  placeholder=" {{__('أدخل رقم الأسرة')}}"/>
                    </div>

                    <!--  authority_number -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_number"  class="border" type="text" label=" {{__('رقم الهيئة')}}"  placeholder="{{__('أدخل رقم الهيئة')}}"/>
                    </div>

                    <!--  authority_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_name"  class="border" type="text" label=" {{__('اسم الهيئة')}}"  placeholder="{{__('أدخل اسم الهيئة')}}"/>
                    </div>

                    <!--  country -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="country"  class="border" type="text" label=" {{__('الدولة')}} "  placeholder="{{__('أدخل اسم الدولة')}}"/>
                    </div>

                    <!--  city -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="city"  class="border" type="text" label=" {{__('المدينة')}} "  placeholder="{{__('أدخل اسم المدينة')}}"/>
                    </div>


                    <div class="col-12 col-md-6 mb-3">

                        <label for="parents_status"> {{__('حالة (الأب , الأم)')}} </label>
                        <select name="parents_status" class="form-control form-select @if($errors->has('parents_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">

                            <option value="مطلقة"> {{__('مطلقة')}} </option>
                            <option value="أرملة" > {{__('أرملة')}} </option>
                            <option value="سجين" > {{__('سجين')}} </option>
                            <option value="مريض" > {{__('مريض')}} </option>
                            <option value="فقير" > {{__('فقير')}} </option>


                        </select>

                        <x.form.validation-feedback name="parents_status" />
                    </div>


                    <p class="title mb-3">{{__('بيانات صاحب العلاقة')}}</p>

                    <!--  name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="name"  class="border" type="text" label=" {{__('الاسم الكامل')}}"  placeholder="{{__('أدخل الاسم الكامل')}}"/>
                    </div>

                    <!--  nationality -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality"  class="border" type="text" label=" {{__('الجنسية')}}  "  placeholder="{{__('أدخل  الجنسية')}}"/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" class="border" type="date" label=" {{__('تاريخ الميلاد')}}" autocomplete="" />
                    </div>

                    <!--  marital_status -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="marital_status"  class="border" type="text" label="  {{__('الحالة الاجتماعية')}}"  placeholder="{{__('أدخل  الحالة الاجتماعية')}}"/>
                    </div>

                    {{-- family_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_number" class="border" type="number" label=" {{__('عدد أفراد العائلة')}}"  autocomplete="" min="0" placeholder="{{__('أدخل عدد أفراد العائلة')}}"/>
                    </div>

                    {{-- male_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_male_number" class="border" type="number" label=" {{__('عدد الابناء')}}" autocomplete="" min="0" placeholder="{{__('أدخل عدد الابناء')}}"/>
                    </div>

                    {{-- female_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_female_number" class="border" type="number" label=" {{__('عدد البنات')}}" autocomplete="" min="0" placeholder="{{__('أدخل عدد البنات')}}"/>
                    </div>

                    {{-- income --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="income" class="border" type="text" label="{{__('الدخل الشهري')}}" autocomplete="" placeholder="{{__('أدخل الدخل الشهري')}}"/>
                    </div>

                    {{-- income_source --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="income_source" class="border" type="text" label=" {{__('المصدر')}} " autocomplete="" placeholder="{{__('أدخل مصدر الدخل')}}"/>
                    </div>

                    {{-- subsidies --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="subsidies" class="border" type="text" label=" {{__('الإعانات الاخرى و قدرها')}}" autocomplete="" placeholder="{{__('أدخل الإعانات الاخرى و قدرها')}}"/>
                    </div>

                    {{-- Family financial status --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label for="financial_status"> {{__('حالة الأسرة المادية')}}</label>
                        <select name="financial_status" id="financial_status" class="form-control form-select @if($errors->has('financial_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">

                            <option value="فقير" > {{__('فقير')}} </option>
                            <option value="غني" > {{__('غني')}} </option>

                        </select>

                        <x.form.validation-feedback name="financial_status" />
                    </div>

                    <p class="mb-3 title"> {{__('مكان اقامة الأسرة')}}</p>

                    {{-- birth --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth" class="border" type="text" label=" {{__('الولادة')}} " autocomplete="" placeholder="{{__('أدخل مكان الولادة')}}"/>
                    </div>

                    {{-- family_city --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_city" class="border" type="text" label=" {{__('المدينة')}} " autocomplete="" placeholder="{{__('أدخل اسم المدينة')}}"/>
                    </div>

                    {{-- family_directorate --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_directorate" class="border" type="text" label=" {{__('المديرية')}} " autocomplete="" placeholder="{{__('أدخل اسم المديرية')}}"/>
                    </div>

                    {{-- family_village --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_village" class="border" type="text" label=" {{__('القرية')}} " autocomplete="" placeholder="{{__('أدخل اسم القرية')}}"/>
                    </div>

                    {{-- family_neighborhood --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_neighborhood" class="border" type="text" label=" {{__('الحي')}} " autocomplete="" placeholder="{{__('أدخل اسم الحي')}}"/>
                    </div>

                    {{-- landmark --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="landmark" class="border" type="text" label=" {{__('أقرب معلم')}}" autocomplete="" placeholder="{{__('أدخل أقرب معلم')}}"/>
                    </div>


                    {{-- Housing status --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label for="housing_status"> {{__('وضع السكن')}}</label>
                        <select name="housing_status" id="housing_status" class="form-control form-select @if($errors->has('housing_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">


                            <option value="ملك" > {{__('ملك')}} </option>
                            <option value="ايجار" > {{__('ايجار')}} </option>
                            <option value="مشترك" > {{__('مشترك')}} </option>

                        </select>

                        <x.form.validation-feedback name="housing_status" />
                    </div>


                    {{-- search_status --}}
                    <div class="col-12 mb-3">

                        <x-form.textarea name="search_status" label=" {{__('بحث الحالة')}}" placeholder="{{('ادخل بحث الحالة')}}"/>

                    </div>

                    {{-- researcher_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="researcher_name" class="border" type="text" label="  {{__('اسم الباحث')}}" autocomplete="" placeholder="{{__('أدخل اسم الباحث')}}"/>
                    </div>

                    {{-- signature --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> {{__('التوقيع')}}  </label> <br>
                        <label for="signature" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة التوقيع')}}  </label>
                        <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

                    </div>

                    {{-- phone --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="phone" class="border" type="text" label="  {{__('رقم الهاتف')}}" autocomplete="" placeholder="{{__('أدخل رقم الهاتف')}}"/>
                    </div>

                    {{-- supporting_documents --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> {{__('المستندات الثبوتية')}} </label> <br>
                        <label for="supporting_documents" class="custom-file-upload w-75 text-center"> {{__('ارفق المستندات الثبوتية')}} </label>
                        <input class="hidden-file-style" name="supporting_documents" type="file" id="supporting_documents" style="display: none;">

                    </div>

                    {{-- authority_official --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_official" class="border" type="text" label=" {{__('اسم مسؤول الهيئة')}}" autocomplete="" placeholder="{{__('أدخل اسم مسؤول الهيئة')}}"/>
                    </div>

                    {{-- authority_official_signature --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> {{__('التوقيع')}}  </label> <br>
                        <label for="authority_official_signature" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة التوقيع')}}  </label>
                        <input class="hidden-file-style" name="authority_official_signature" type="file" id="authority_official_signature" style="display: none;">

                    </div>

                    {{-- birth_certificate --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> {{__('شهادة الميلاد اصل كمبيوتر')}}</label> <br>
                        <label for="birth_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة الميلاد')}} </label>
                        <input class="hidden-file-style" name="birth_certificate" type="file" id="birth_certificate" style="display: none;">

                    </div>

                    {{-- death_certificate --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> {{__('شهادة الوفاة اصل كمبيوتر')}}</label> <br>
                        <label for="death_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة وفاة الأب')}}</label>
                        <input class="hidden-file-style" name="death_certificate" type="file" id="death_certificate" style="display: none;">
                    </div>

                    {{-- date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="date" class="border" type="date" label=" {{__('التاريخ')}} " autocomplete="" />
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" class="border" type="text" label=" {{__('رقم الكافل')}}" autocomplete="" placeholder="{{__('أدخل رقم الكافل')}}"/>
                    </div>

                    <div class="d-flex justify-content-center gap-4 mt-4">
                        <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
                    </div>

                </div>
            </div>

        </div>

    </form>


</x-main-layout>
