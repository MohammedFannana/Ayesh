
<div class="orphans_form">

    {{-- basic-information --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> المعلومات الأساسية </p>
        <div class="row orphans-form" style="justify-content:between;">

            <!-- code -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="internal_code"  class="border" type="text" label=" {{__('كود اليتيم الداخلي ')}}"  placeholder="أدخل كود اليتيم"/>
            </div>

            <!-- Orphan Application Form-->
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('استمارة تقديم الأيتام')}}</label> <br>
                <label for="application_form" class="custom-file-upload w-75 text-center"> {{__('أرفق الاستمارة ')}}</label>
                <x-form.input name="application_form" class="border hidden-file-style" type="file" id="application_form" style="display: none;"  autocomplete="" />

            </div>

            <!-- name -->
            {{-- :value="$admin->email" --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name"  class="border" type="text" label=" {{__('اسم اليتيم')}} " placeholder="أدخل اسم اليتيم"/>
            </div>

            {{-- national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="national_id" class="border" type="text" label=" {{__('الرقم القومي لليتيم ')}}" autocomplete="" placeholder="أدخل الرقم القومي لليتيم"/>
            </div>

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" class="border" type="date" label=" {{__('تاريخ الميلاد ')}}" autocomplete="" />
            </div>

            {{-- birth_place--}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_place" class="border" type="text" label=" {{__('جهة الميلاد ')}}" autocomplete="" placeholder="ادخل جهة الميلاد"/>
            </div>

            {{-- gender --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="type" class="mb-2"> {{__('النوع')}} </label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="gender" id="male" value="ذكر">
                        <label for="male">{{__('ذكر')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female" value="أنثى">
                        <label for="female">{{__('أنثى')}}</label>
                    </div>
                </div>

            </div>

            {{-- age --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="age" class="border" type="number" label=" {{__('السن')}} " placeholder="ادخل السن" min="1" autocomplete="" />
            </div>

            {{-- case_type --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2"> {{__('نوع الحالة')}} </label>
                <x-form.select name="case_type"
                    :options="['' => ' اختر ', 'يتيم الأبوين' => 'يتيم الأبوين', 'مريض مزمن' => 'مريض مزمن', 'حالات خاصة' => 'حالات خاصة', 'قريب السن' => ' قريب السن ']"   />

            </div>

            {{-- Health status --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="health_status" class="border" type="text" label=" {{__('الحالة الصحية لليتيم')}}" autocomplete="" placeholder="أدخل الحالة الصحية لليتبم"/>
            </div>

            {{-- father_death_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأب ')}}" autocomplete="" />
            </div>

            {{-- parents_orphan --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label class="mb-2"> {{__('يتيم الأبوين ')}}</label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="parents_orphan" id="yes" value="نعم">
                        <label for="yes">{{__('نعم')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="parents_orphan" id="no" value="لا">
                        <label for="no">{{__('لا')}}</label>
                    </div>
                </div>

            </div>

            {{-- mother_death_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_death_date" class="border" type="date" label=" {{__('تاريخ وفاة الأم ')}}" autocomplete="" />
            </div>

            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" class="border" type="text" label=" {{__('اسم الأم ')}}" autocomplete="" placeholder="أدخل اسم الأم"/>
            </div>

            {{-- mother_national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_national_id" class="border" type="text" label=" {{__(' الرقم القومي للأم ')}} " autocomplete="" placeholder="أدخل الرقم القومي للأم"/>
            </div>

            {{-- mother_work --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label  class="mb-2"> {{__('هل تعمل الأم ')}}</label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="mother_work" id="mother_work" value="نعم">
                        <label for="mother_work">{{__('نعم')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="mother_work" id="no_work" value="لا">
                        <label for="no_work">{{__('لا')}}</label>
                    </div>
                </div>

            </div>

            {{-- mother_condition --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2"> {{__('حالة الأم')}} </label>
                <x-form.select name="mother_status"
                    :options="['' => ' اختر ', 'يتيم الأبوين' => 'يتيم الأبوين', 'مريض مزمن' => 'مريض مزمن', 'حالات خاصة' => 'حالات خاصة', 'قريب السن' => ' قريب السن ']" />

            </div>

            {{-- guardian_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" class="border" type="text" label=" {{__('اسم الوصي ')}}" autocomplete="" placeholder="أدخل اسم الوصي"/>
            </div>

            {{-- guardian_national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_national_id" class="border" type="text" label=" {{__('الرقم القومي للوصي ')}}" autocomplete="" placeholder="أدخل الرقم القومي للوصي"/>
            </div>

            {{-- guardian_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" class="border" type="text" label=" {{__('صلة القرابة ')}}" autocomplete="" placeholder="أدخل صلة القرابة "/>
            </div>

            {{-- guardianship_reason --}}
            <div class="col-12 col-md-6 mb-3" style="position: relative">
                <span class="text-danger" style="position: absolute; right:106px">(اختياري)</span>
                <x-form.input name="guardianship_reason" class="border" type="text" label=" {{__('سبب الوصاية ')}}" autocomplete="" placeholder="أدخل سبب الوصاية "/>
            </div>

            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" class="border" type="number" label=" {{__('عدد أفراد الأسرة')}} " autocomplete="" min="0" placeholder="أدخل عدد أفراد الأسرة"/>
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="male_number" class="border" type="number" label=" {{__('عدد الذكور ')}}" autocomplete="" min="0" placeholder="أدخل عدد الذكور "/>
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="female_number" class="border" type="number" label=" {{__('عدد الاناث ')}}" autocomplete="" min="0" placeholder="أدخل عدد الاناث "/>
            </div>


            {{-- income --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income" class="border" type="text" label=" {{__('دخل الأسرة')}} "  autocomplete="" placeholder="أدخل الدخل"/>
            </div>

            {{-- income_source --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income_source" class="border" type="text" label=" {{__('مصدر الدخل')}} " autocomplete="" placeholder="أدخل مصدر الدخل"/>
            </div>

            {{-- address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="address" class="border" type="text" label=" {{__('العنوان')}}" autocomplete="" placeholder="أدخل العنوان"/>
            </div>

            {{-- housing_type --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_type" class="mb-2"> {{__('نوع السكن ')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_type" id="owns" value="ملك">
                        <label for="owns">{{__('ملك')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_type" id="rent" value="ايجار">
                        <label for="rent">{{__('ايجار')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_type" id="shared" value="مشترك">
                        <label for="shared">{{__('مشترك')}}</label>
                    </div>
                </div>

            </div>


            {{-- housing_case --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_status" class="mb-2"> {{__('حالة السكن ')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_case" id="good" value="جيد">
                        <label for="good">{{__('جيد')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_case" id="middle" value="متوسط">
                        <label for="middle">{{__('متوسط')}}</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_case" id="bad" value="سيء">
                        <label for="bad">{{__('سيء')}}</label>
                    </div>
                </div>

            </div>

            {{-- academic_stage --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label  class="mb-2"> {{__('المرحلة الدراسية ')}}</label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="academic_stage" id="elementary" value="الابتدائية">
                        <label for="elementary">{{__('الابتدائية')}}</label>
                    </div>
                    <div>
                        <input type="radio" name="academic_stage" id="preparatory" value="الاعدادية">
                        <label for="preparatory">{{__('الاعدادية')}}</label>
                    </div>
                </div>

            </div>

            {{-- class --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="class" class="border" type="text" label=" {{__('الصف')}}" autocomplete="" placeholder="أدخل الصف"/>
            </div>

            {{-- phone_1 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border" type="text" label=" {{__('1 رقم التليفون')}}" autocomplete="" placeholder="أدخل رقم التليفون 1"/>
            </div>

            {{-- phone_2 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border" type="text" label="{{__('2 رقم التليفون')}}" autocomplete="" placeholder="أدخل رقم التليفون 2"/>
            </div>

            {{-- phone_3 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border" type="text" label="{{__('3 رقم التليفون')}}" autocomplete="" placeholder="أدخل رقم التليفون 3"/>
            </div>

            {{-- phone_4 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_number[]" class="border" type="text" label=" {{__('4 رقم التليفون')}} "  autocomplete="" placeholder="أدخل رقم التليفون 4"/>
            </div>

            {{-- Internal field research --}}
            <div class="col-12 mb-3">

                <x-form.textarea name="internal_research" label="{{__('البحث الميداني الداخلي')}}" placeholder="اكتب رأي المشرف الاجتماعي"/>

            </div>

            {{-- internal_field_research_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="research_date" class="border" type="date" label=" {{__('تاريخ البحث الميداني الداخلي ')}}" autocomplete="" />
            </div>

            {{-- description --}}
            <div class="col-12">

                <x-form.textarea name="notes" label="{{__('ملاحظات')}}" placeholder="اكتب ملاحظات"/>

            </div>

        </div>
    </div>

    {{-- image and file  --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> {{__('الصور والملفات المطلوبة ')}}</p>

        <div class="row" style="justify-content:between;">

            {{-- birth_certificate --}}
            <div class="col-12 col-md-6 mb-3">

                <label class="mb-2"> {{__('شهادة الميلاد اصل كمبيوتر')}}</label> <br>
                <label for="birth_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة الميلاد ')}} </label>
                {{-- <input class="hidden-file-style" name="birth_certificate" type="file" id="birth_certificate" style="display: none;"> --}}
                <x-form.input name="birth_certificate" class="border hidden-file-style" type="file" id="birth_certificate" style="display: none;"  autocomplete="" />


            </div>

            {{-- father_death_certificate --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__('شهادة وفاة الأب اصل كمبيوتر')}}</label> <br>
                <label for="father_death_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة وفاة الأب ')}}</label>
                <x-form.input name="father_death_certificate" class="border hidden-file-style" type="file" id="father_death_certificate" style="display: none;"  autocomplete="" />

            </div>

            {{-- mother_death_certificate --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__('شهادة وفاة الأم اصل كمبيوتر ')}}</label> <br>
                <label for="mother_death_certificate" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة شهادة وفاة الأم ')}}</label>
                <x-form.input name="mother_death_certificate" class="border hidden-file-style" type="file" id="mother_death_certificate" style="display: none;"  autocomplete="" />

            </div>

            {{-- mother_card --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{('صورة من بطاقة الأم أو الوصي')}}</label> <br>
                <label for="mother_card" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة بطاقة الأم أو الوصي ')}}</label>
                <x-form.input name="mother_card" class="border hidden-file-style" type="file" id="mother_card" style="display: none;"  autocomplete="" />

            </div>

            {{--  orphan_image_4_6--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('صورة اليتيم 4*6 جديدة ')}}</label> <br>
                <label for="orphan_image_4_6" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة اليتيم ')}}</label>
                <x-form.input name="orphan_image_4_6" class="border hidden-file-style" type="file" id="orphan_image_4_6" style="display: none;"  autocomplete="" />
            </div>

            {{--  orphan_image_9_12--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> {{__('صورة اليتيم كاملة 9*12 ')}} </label> <br>
                <label for="orphan_image_9_12" class="custom-file-upload w-75 text-center"> {{__('ارفق صورة اليتيم ')}}</label>
                <x-form.input name="orphan_image_9_12" class="border hidden-file-style" type="file" id="orphan_image_9_12" style="display: none;"  autocomplete="" />
            </div>




            {{-- school_benefit --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">   {{__('الافادة المدرسية ')}} </label> <br>
                <label for="school_benefit" class="custom-file-upload w-75 text-center">  {{__('أرفق صورة الافادة المدرسية ')}} </label>
                <x-form.input name="school_benefit" class="border hidden-file-style" type="file" id="school_benefit" style="display: none;"  autocomplete="" />

            </div>


            {{-- medical_report --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">  {{__('التقرير الطبى ')}} </label> <br>
                <label for="medical_report" class="custom-file-upload w-75 text-center">  {{__('أرفق التقرير الطبى ')}} </label>
                <x-form.input name="medical_report" class="border hidden-file-style" type="file" id="medical_report" style="display: none;"  autocomplete="" />

            </div>

            {{-- social_research --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   {{__('البحث الاجتماعى ')}} </label> <br>
                <label for="social_research" class="custom-file-upload w-75 text-center">  {{__('أرفق  البحث الاجتماعى ')}} </label>
                <x-form.input name="social_research" class="border hidden-file-style" type="file" id="social_research" style="display: none;"  autocomplete="" />

            </div>

            {{-- guardianship_decision --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   {{__('قرار وصاية ')}} </label> <br>
                <label for="guardianship_decision" class="custom-file-upload w-75 text-center">  {{__('أرفق  قرار وصاية ')}} </label>
                <x-form.input name="guardianship_decision" class="border hidden-file-style" type="file" id="guardianship_decision" style="display: none;"  autocomplete="" />

            </div>

            {{-- phone --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone" class="border" type="text" label=" {{__('رقم التليفون ')}}" autocomplete="" placeholder="أدخل رقم التليفون"/>
            </div>

            {{-- address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="full_address" class="border" type="text" label="  {{__('العنوان بالكامل ')}}" autocomplete="" placeholder=" أدخل العنوان بالكامل " />
            </div>

            {{--  governorate --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="governorate" class="border" type="text" label="  {{__('المحافظة')}} " autocomplete="" placeholder=" أدخل اسم المحافظة " />
            </div>

            {{-- center --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="center" class="border" type="text" label="  {{__('المركز')}} " autocomplete="" placeholder=" أدخل اسم المركز " />
            </div>

            {{-- recipient_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="recipient_name" class="border" type="text" label=" {{__('اسم المستلم')}} " autocomplete="" placeholder=" أدخل اسم المستلم  " />
            </div>

            {{-- registrar_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_name" class="border" type="text" label="  {{__('التسجيل')}} " autocomplete="" placeholder=" أدخل اسم المسجل " />
            </div>

            {{-- registrar_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_date" class="border" type="date" label="  {{__('تاريخ التسجيل ')}}" autocomplete=""  />
            </div>


            {{-- knowledge --}}
            <div class="col-12 mb-3">
                <x-form.input name="knowledge" class="border" type="text" label=" {{__('ماهى اليه معرفتكم بجمعية عايش ')}}" autocomplete="" placeholder=" كيف تعرفتم على جمعية عايش"/>
            </div>



        </div>

    </div>


    <div class="d-flex justify-content-center gap-4 mt-4">
        <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
    </div>

</div>
