<x-main-layout>

    <h2 class="mb-4"> الأسر الأولى بالرعاية  </h2>
    <h4 class="mb-4 title-color"> استمارة كفالة الأسرة </h4>


    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="orphans_form">

            {{-- basic-information --}}
            <div class="bg-white p-3 mb-3 rounded shadow-sm">
                <div class="row orphans-form" style="justify-content:between;">

                    <!--  families_number -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="families_number"  class="border" type="text" label=" رقم الأسرة "  placeholder="أدخل رقم الأسرة "/>
                    </div>

                    <!--  authority_number -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_number"  class="border" type="text" label=" رقم الهيئة "  placeholder="أدخل رقم الهيئة "/>
                    </div>

                    <!--  authority_name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_name"  class="border" type="text" label=" اسم الهيئة "  placeholder="أدخل اسم الهيئة "/>
                    </div>

                    <!--  country -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="country"  class="border" type="text" label=" الدولة "  placeholder="أدخل اسم الدولة "/>
                    </div>

                    <!--  city -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="city"  class="border" type="text" label=" المدينة "  placeholder="أدخل اسم المدينة "/>
                    </div>


                    <div class="col-12 col-md-6 mb-3">

                        <label for="parents_status"> حالة (الأب, الأم) </label>
                        <select name="parents_status" class="form-control form-select @if($errors->has('parents_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">

                            <option value="divorced" > مطلقة </option>
                            <option value="widow" > أرملة </option>
                            <option value="prisoner" > سجين </option>
                            <option value="sick" > مريض </option>
                            <option value="poor" > فقير </option>


                        </select>

                        <x.form.validation-feedback name="parents_status" />
                    </div>


                    <p class="title mb-3">بيانات صاحب العلاقة</p>

                    <!--  name -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="name"  class="border" type="text" label=" الاسم الكامل "  placeholder="أدخل  الاسم الكامل "/>
                    </div>

                    <!--  nationality -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="nationality"  class="border" type="text" label=" الجنسية  "  placeholder="أدخل  الجنسية "/>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth_date" class="border" type="date" label=" تاريخ الميلاد " autocomplete="" />
                    </div>

                    <!--  marital_status -->
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="marital_status"  class="border" type="text" label="  الحالة الاجتماعية "  placeholder="أدخل  الحالة الاجتماعية "/>
                    </div>

                    {{-- family_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_number" class="border" type="number" label=" عدد أفراد العائلة" autocomplete="" min="0" placeholder="أدخل عدد أفراد العائلة"/>
                    </div>

                    {{-- male_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_male_number" class="border" type="number" label=" عدد الابناء " autocomplete="" min="0" placeholder="أدخل عدد الابناء "/>
                    </div>

                    {{-- female_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_female_number" class="border" type="number" label=" عدد البنات " autocomplete="" min="0" placeholder="أدخل عدد البنات "/>
                    </div>

                    {{-- income --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="income" class="border" type="text" label=" الدخل الشهري " autocomplete="" placeholder="أدخل الدخل الشهري"/>
                    </div>

                    {{-- income_source --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="income_source" class="border" type="text" label=" المصدر " autocomplete="" placeholder="أدخل مصدر الدخل"/>
                    </div>

                    {{-- subsidies --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="subsidies" class="border" type="text" label=" الإعانات الاخرى و قدرها " autocomplete="" placeholder="أدخل الإعانات الاخرى و قدرها"/>
                    </div>

                    {{-- Family financial status --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label for="financial_status"> حالة الأسرة المادية </label>
                        <select name="financial_status" id="financial_status" class="form-control form-select @if($errors->has('financial_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">


                            <option value="poor" > فقير </option>
                            <option value="rich" > غني </option>



                        </select>

                        <x.form.validation-feedback name="financial_status" />
                    </div>

                    <p class="mb-3 title"> مكان اقامة الأسرة </p>

                    {{-- birth --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="birth" class="border" type="text" label=" الولادة " autocomplete="" placeholder="أدخل مكان الولادة"/>
                    </div>

                    {{-- family_city --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_city" class="border" type="text" label=" المدينة " autocomplete="" placeholder="أدخل اسم المدينة"/>
                    </div>

                    {{-- family_directorate --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_directorate" class="border" type="text" label=" المديرية " autocomplete="" placeholder="أدخل اسم المديرية"/>
                    </div>

                    {{-- family_village --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_village" class="border" type="text" label=" القرية " autocomplete="" placeholder="أدخل اسم القرية"/>
                    </div>

                    {{-- family_neighborhood --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="family_neighborhood" class="border" type="text" label=" الحي " autocomplete="" placeholder="أدخل اسم الحي"/>
                    </div>

                    {{-- landmark --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="landmark" class="border" type="text" label=" أقرب معلم " autocomplete="" placeholder="أدخل أقرب معلم"/>
                    </div>


                    {{-- Housing status --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label for="housing_status"> وضع السكن </label>
                        <select name="housing_status" id="housing_status" class="form-control form-select @if($errors->has('housing_status')) is-invalid @endif "  style="width:100%; border-radius: 0.375rem; border-color: rgb(209 213 219);">


                            <option value="owns" > ملك </option>
                            <option value="rent" > ايجار </option>
                            <option value="shared" > مشترك </option>

                        </select>

                        <x.form.validation-feedback name="housing_status" />
                    </div>


                    {{-- search_status --}}
                    <div class="col-12 mb-3">

                        <x-form.textarea name="search_status" label=" بحث الحالة " value="ادخل بحث الحالة"/>

                    </div>

                    {{-- researcher_name --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="researcher_name" class="border" type="text" label="  اسم الباحث " autocomplete="" placeholder="أدخل اسم الباحث "/>
                    </div>

                    {{-- signature --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> التوقيع  </label> <br>
                        <label for="signature" class="custom-file-upload w-50 text-center"> ارفق صورة التوقيع   </label>
                        <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

                    </div>

                    {{-- phone --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="phone" class="border" type="text" label="  رقم الهاتف " autocomplete="" placeholder="أدخل رقم الهاتف "/>
                    </div>

                    {{-- supporting_documents --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> المستندات الثبوتية  </label> <br>
                        <label for="supporting_documents" class="custom-file-upload w-50 text-center"> ارفق المستندات الثبوتية  </label>
                        <input class="hidden-file-style" name="supporting_documents" type="file" id="supporting_documents" style="display: none;">

                    </div>

                    {{-- authority_official --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="authority_official" class="border" type="text" label=" اسم مسؤول الهيئة " autocomplete="" placeholder="أدخل اسم مسؤول الهيئة "/>
                    </div>

                    {{-- authority_official_signature --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> التوقيع  </label> <br>
                        <label for="authority_official_signature" class="custom-file-upload w-50 text-center"> ارفق صورة التوقيع   </label>
                        <input class="hidden-file-style" name="authority_official_signature" type="file" id="authority_official_signature" style="display: none;">

                    </div>

                    {{-- birth_certificate --}}
                    <div class="col-12 col-md-6 mb-3">

                        <label class="mb-2"> شهادة الميلاد اصل كمبيوتر</label> <br>
                        <label for="fileInput" class="custom-file-upload w-75 text-center"> ارفق صورة شهادة الميلاد  </label>
                        <input class="hidden-file-style" name="birth_certificate" type="file" id="fileInput" style="display: none;">

                    </div>

                    {{-- death_certificate --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label class="mb-2"> شهادة الوفاة اصل كمبيوتر</label> <br>
                        <label for="death_certificate" class="custom-file-upload w-75 text-center"> ارفق صورة شهادة وفاة الأب </label>
                        <input class="hidden-file-style" name="death_certificate" type="file" id="death_certificate" style="display: none;">
                    </div>

                    {{-- date --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="date" class="border" type="text" label=" التاريخ " autocomplete="" />
                    </div>

                    {{-- sponsor_number --}}
                    <div class="col-12 col-md-6 mb-3">
                        <x-form.input name="sponsor_number" class="border" type="text" label=" رقم الكافل " autocomplete="" placeholder="أدخل رقم الكافل "/>
                    </div>

                    <div class="d-flex justify-content-center gap-4 mt-4">
                        <button class="btn add-button mb-4"  type="submit"> حفظ </button>
                    </div>

                </div>
            </div>

        </div>

    </form>


</x-main-layout>
