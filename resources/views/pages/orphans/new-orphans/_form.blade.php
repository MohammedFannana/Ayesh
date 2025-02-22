
<div class="orphans_form">

    {{-- basic-information --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> المعلومات الأساسية </p>
        <div class="row orphans-form" style="justify-content:between;">

            <!-- code -->
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="orphan_code"  class="border" type="text" label=" كود اليتيم الداخلي "  placeholder="أدخل كود اليتيم"/>
            </div>

            <!-- registration_form -->
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2">استمارة تقديم الأيتام</label> <br>
                <a href="" class="btn add-button-style ps-4 pe-4"> أرفق الاستمارة </a>
            </div>

            <!-- name -->
            {{-- :value="$admin->email" --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="name"  class="border" type="text" label="اسم اليتيم" placeholder="أدخل اسم اليتيم"/>
            </div>

            {{-- national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="national_id" class="border" type="text" label=" الرقم القومي لليتيم " autocomplete="" placeholder="أدخل الرقم القومي لليتيم"/>
            </div>

            {{-- birth_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_date" class="border" type="date" label=" تاريخ الميلاد " autocomplete="" />
            </div>

            {{-- birth_place--}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="birth_place" class="border" type="text" label=" جهة الميلاد " autocomplete="" placeholder="ادخل جهة الميلاد"/>
            </div>

            {{-- type --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="type" class="mb-2"> النوع </label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="type" id="male" value="ذكر">
                        <label for="male">ذكر</label>
                    </div>
                    <div>
                        <input type="radio" name="type" id="female" value="أنثى">
                        <label for="female">أنثى</label>
                    </div>
                </div>

            </div>

            {{-- age --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="age" class="border" type="number" label=" السن " placeholder="ادخل السن" min="1" autocomplete="" />
            </div>

            {{-- case_type --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2">نوع الحالة</label>
                <x-form.select name="case_type"/>
            </div>

            {{-- Health status --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="health_status" class="border" type="text" label=" الحالة الصحية لليتيم" autocomplete="" placeholder="أدخل الحالة الصحية لليتبم"/>
            </div>

            {{-- father_death_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="father_death_date" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete="" />
            </div>

            {{-- orphan --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="orphan" class="mb-2"> يتيم الأبوين </label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="type" id="yes" value="yes">
                        <label for="yes">نعم</label>
                    </div>
                    <div>
                        <input type="radio" name="type" id="no" value="no">
                        <label for="no">لا</label>
                    </div>
                </div>

            </div>

            {{-- mother_death_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_death_date" class="border" type="date" label=" تاريخ وفاة الأم " autocomplete="" />
            </div>

            {{-- mother_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder="أدخل اسم الأم"/>
            </div>

            {{-- mother_national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="mother_national_id" class="border" type="text" label=" الرقم القومي للأم" autocomplete="" placeholder="أدخل الرقم القومي للأم"/>
            </div>

            {{-- mother_work --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="mother_work" class="mb-2"> هل تعمل الأم </label>
                <div class="d-flex gap-5">
                    <div>
                        <input type="radio" name="type" id="yes" value="yes">
                        <label for="yes">نعم</label>
                    </div>
                    <div>
                        <input type="radio" name="type" id="no" value="no">
                        <label for="no">لا</label>
                    </div>
                </div>

            </div>

            {{-- mother_condition --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="" class="mb-2"> حالة الأم</label>
                <x-form.select name="mother_condition"/>
            </div>

            {{-- guardian_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_name" class="border" type="text" label=" اسم الوصي " autocomplete="" placeholder="أدخل اسم الوصي"/>
            </div>

            {{-- guardian_national_id --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_national_id" class="border" type="text" label=" الرقم القومي للوصي " autocomplete="" placeholder="أدخل الرقم القومي للوصي"/>
            </div>

            {{-- guardian_relationship --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="guardian_relationship" class="border" type="text" label=" صلة القرابة " autocomplete="" placeholder="أدخل صلة القرابة "/>
            </div>

            {{-- guardianship_reason --}}
            <div class="col-12 col-md-6 mb-3" style="position: relative">
                <span class="text-danger" style="position: absolute; right:106px">(اختياري)</span>
                <x-form.input name="guardianship_reason" class="border" type="text" label=" سبب الوصاية " autocomplete="" placeholder="أدخل سبب الوصاية "/>
            </div>

            {{-- family_number --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="family_number" class="border" type="number" label=" عدد أفراد الأسرة" autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة"/>
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="family_male_number" class="border" type="number" label=" عدد الذكور " autocomplete="" min="1" placeholder="أدخل عدد الذكور "/>
            </div>

            {{-- family_number --}}
            <div class="col-6 col-md-3 mb-3">
                <x-form.input name="family_female_number" class="border" type="number" label=" عدد الاناث " autocomplete="" min="1" placeholder="أدخل عدد الاناث "/>
            </div>


            {{-- income --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income" class="border" type="text" label=" دخل الأسرة" autocomplete="" placeholder="أدخل الدخل"/>
            </div>

            {{-- income_source --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="income_source" class="border" type="text" label=" مصدر الدخل" autocomplete="" placeholder="أدخل مصدر الدخل"/>
            </div>

            {{-- address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="address" class="border" type="text" label=" العنوان" autocomplete="" placeholder="أدخل العنوان"/>
            </div>

            {{-- housing_type --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_type" class="mb-2"> نوع السكن </label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_type" id="owns" value="owns">
                        <label for="owns">ملك</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_type" id="rent" value="rent">
                        <label for="rent">ايجار</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_type" id="shared" value="shared">
                        <label for="shared">مشترك</label>
                    </div>
                </div>

            </div>


            {{-- housing_case --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label for="housing_status" class="mb-2"> حالة السكن </label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="housing_case" id="good" value="good">
                        <label for="good">جيد</label>
                    </div>
                    <div>
                        <input type="radio" name="housing_case" id="middle" value="middle">
                        <label for="middle">متوسط</label>
                    </div>

                    <div>
                        <input type="radio" name="housing_case" id="bad" value="bad">
                        <label for="bad">سيء</label>
                    </div>
                </div>

            </div>

            {{-- academic_stage --}}
            <div class="col-12 col-md-6 mb-3 ">
                <label  class="mb-2"> المرحلة الدراسية </label>
                <div class="d-flex justify-content-between gap-5">
                    <div>
                        <input type="radio" name="academic_stage" id="elementary" value="elementary">
                        <label for="elementary">الابتدائية</label>
                    </div>
                    <div>
                        <input type="radio" name="academic_stage" id="preparatory" value="preparatory">
                        <label for="preparatory">الاعدادية</label>
                    </div>
                </div>

            </div>

            {{-- class --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
            </div>

            {{-- phone_1 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_1" class="border" type="text" label=" رقم التليفون 1" autocomplete="" placeholder="أدخل رقم التليفون 1"/>
            </div>

            {{-- phone_2 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_2" class="border" type="text" label=" رقم التليفون 2" autocomplete="" placeholder="أدخل رقم التليفون 2"/>
            </div>

            {{-- phone_3 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_3" class="border" type="text" label=" رقم التليفون 3" autocomplete="" placeholder="أدخل رقم التليفون 3"/>
            </div>

            {{-- phone_4 --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone_4" class="border" type="text" label=" رقم التليفون 4" autocomplete="" placeholder="أدخل رقم التليفون 4"/>
            </div>

            {{-- Internal field research --}}
            <div class="col-12">

                <x-form.textarea name="internal_field_research" label="البحث الميداني الداخلي" value="اكتب رأي المشرف الاجتماعي"/>

            </div>

            {{-- internal_field_research_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="internal_research_date" class="border" type="date" label=" تاريخ البحث الميداني الداخلي " autocomplete="" />
            </div>

            {{-- description --}}
            <div class="col-12">

                <x-form.textarea name="notes" label="ملاحظات" value="اكتب ملاحظات"/>

            </div>

        </div>
    </div>

    {{-- image and file  --}}
    <div class="bg-white p-3 mb-3 rounded shadow-sm">
        <p style="color:var(--text-color)"> الصور والملفات المطلوبة </p>

        <div class="row" style="justify-content:between;">

            {{-- birth_certificate --}}
            <div class="col-12 col-md-6 mb-3">

                <label class="mb-2"> شهادة الميلاد اصل كمبيوتر</label> <br>
                <label for="fileInput" class="custom-file-upload w-75 text-center"> ارفق صورة شهادة الميلاد  </label>
                <input class="hidden-file-style" name="birth_certificate" type="file" id="fileInput" style="display: none;">

            </div>

            {{-- father_death_certificate --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> شهادة وفاة الأب اصل كمبيوتر</label> <br>
                <label for="fileInput" class="custom-file-upload w-75 text-center"> ارفق صورة شهادة وفاة الأب </label>
                <input class="hidden-file-style" name="father_death_certificate" type="file" id="fileInput" style="display: none;">
            </div>

            {{-- mother_death_certificate --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2"> شهادة وفاة الأم اصل كمبيوتر </label> <br>
                <label for="fileInput" class="custom-file-upload w-75 text-center"> ارفق صورة شهادة وفاة الأم </label>
                <input class="hidden-file-style" name="mother_death_certificate" type="file" id="fileInput" style="display: none;">
            </div>

            {{-- mother_card --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">صورة من بطاقة الأم أو الوصي</label> <br>
                <label for="fileInput" class="custom-file-upload w-75 text-center"> ارفق صورة بطاقة الأم أو الوصي </label>
                <input class="hidden-file-style" name="mother_card" type="file" id="fileInput" style="display: none;">
            </div>

            {{--  orphan_image_4_6--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">صورة اليتيم 4*6 جديدة </label> <br>
                <label for="orphan_image_4_6" class="custom-file-upload w-75 text-center"> ارفق صورة اليتيم </label>
                <input class="hidden-file-style" name="orphan_image_4_6" type="file" id="orphan_image_4_6" style="display: none;">
            </div>

            {{--  orphan_image_9_12--}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">صورة اليتيم كاملة 9*12 </label> <br>
                <label for="orphan_image_9_12" class="custom-file-upload w-75 text-center"> ارفق صورة اليتيم </label>
                <input class="hidden-file-style" name="orphan_image_9_12" type="file" id="orphan_image_9_12" style="display: none;">
            </div>




            {{-- school_benefit --}}
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">   الافادة المدرسية  </label> <br>
                <label for="school_benefit" class="custom-file-upload w-75 text-center">  أرفق صورة الافادة المدرسية  </label>
                <input class="hidden-file-style" name="school_benefit" type="file" id="school_benefit" style="display: none;">
            </div>


            {{-- medical_report --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">  التقرير الطبى  </label> <br>
                <label for="medical_report" class="custom-file-upload w-75 text-center">  أرفق التقرير الطبى  </label>
                <input class="hidden-file-style" name="medical_report" type="file" id="medical_report" style="display: none;">
            </div>

            {{-- social_research --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   البحث الاجتماعى  </label> <br>
                <label for="social_research" class="custom-file-upload w-75 text-center">  أرفق  البحث الاجتماعى  </label>
                <input class="hidden-file-style" name="social_research" type="file" id="social_research" style="display: none;">
            </div>

            {{-- guardianship_decision --}}
            <div class="col-12 col-md-6  mb-3">
                <label class="mb-2">   قرار وصاية  </label> <br>
                <label for="guardianship_decision" class="custom-file-upload w-75 text-center">  أرفق  قرار وصاية  </label>
                <input class="hidden-file-style" name="guardianship_decision" type="file" id="guardianship_decision" style="display: none;">
            </div>

            {{-- phone --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="phone" class="border" type="text" label=" رقم التليفون " autocomplete="" placeholder="أدخل رقم التليفون"/>
            </div>

            {{-- address --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="full_ddress" class="border" type="text" label="  العنوان بالكامل " autocomplete="" placeholder=" أدخل العنوان بالكامل " />
            </div>

            {{--  governorate --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="governorate" class="border" type="text" label="  المحافظة " autocomplete="" placeholder=" أدخل اسم المحافظة " />
            </div>

            {{-- center --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="center" class="border" type="text" label="  المركز " autocomplete="" placeholder=" أدخل اسم المركز " />
            </div>

            {{-- recipient_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="recipient_name" class="border" type="text" label="   اسم المستلم " autocomplete="" placeholder=" أدخل اسم المستلم  " />
            </div>

            {{-- registrar_name --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_name" class="border" type="text" label="  التسجيل " autocomplete="" placeholder=" أدخل اسم المسجل " />
            </div>

            {{-- registrar_date --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="registrar_date" class="border" type="date" label="  تاريخ التسجيل " autocomplete=""  />
            </div>


            {{-- knowledge --}}
            <div class="col-12 mb-3">
                <x-form.input name="knowledge" class="border" type="text" label=" ماهى اليه معرفتكم بجمعية عايش " autocomplete="" placeholder=" كيف تعرفتم على جمعية عايش"/>
            </div>



        </div>

    </div>


    <div class="d-flex justify-content-center gap-4 mt-4">
        <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
    </div>

</div>
