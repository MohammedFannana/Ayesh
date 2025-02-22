<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين </h2>
    <h4 class="mb-5 title-color">  الحالات المدخلة - جمعية ادبي الخيرية </h4>


        <form action="" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row orphans-form" style="justify-content:between;">

                <!-- name -->
                {{-- :value="$admin->email" --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="name"  class="border" type="text" label="اسم اليتيم" placeholder="أدخل اسم اليتيم"/>
                </div>

                {{--nationality--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="nationality" class="border" type="text" label=" الجنسيه " autocomplete="" placeholder="أدخل الجنسيه"/>
                </div>

                {{-- birth_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_date" class="border" type="date" label=" تاريخ ميلاد اليتيم " autocomplete="" />
                </div>

                {{-- gender --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <label class="mb-2"> الجنس </label>
                    <div class="d-flex" style="gap: 180px">
                        <div>
                            <input type="radio" name="gender" id="male" value="ذكر">
                            <label for="male">ذكر</label>
                        </div>
                        <div>
                            <input type="radio" name="gender" id="female" value="أنثى">
                            <label for="female">أنثى</label>
                        </div>
                    </div>
                </div>

                {{-- mother_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder="ادخل اسم الأم"/>
                </div>

                {{-- mother_marital_status --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <label for="orphan" class="mb-2"> الحالة الاجتماعية للأم </label>
                    <div class="d-flex" style="gap: 180px">
                        <div>
                            <input type="radio" name="mother_marital_status" id="married" value="married">
                            <label for="married">متزوجة</label>
                        </div>
                        <div>
                            <input type="radio" name="mother_marital_status" id="widow" value="widow">
                            <label for="widow">أرملة</label>
                        </div>
                    </div>

                </div>

                {{-- father_death --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_death" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete="" />
                </div>

                {{-- death_reason --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="death_reason" class="border" type="text" label=" سبب الوفاة " autocomplete="" placeholder="ادخل سبب الوفاء الأب"/>
                </div>

                {{-- responsible --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="responsible" class="border" type="text" label="  ولي أمر أو المسئول المباشر عن اليتيم " autocomplete="" placeholder="أدخل  المسئول المباشر عن اليتيم"/>
                </div>


                {{--  orphan_relationship --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_relationship" class="border" type="text" label=" صلته باليتيم " autocomplete="" placeholder="أدخل صلته باليتيم"/>
                </div>

                {{-- family_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="family_number" class="border" type="number" label=" عدد أفراد الأسرة" autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة"/>
                </div>

                {{-- male_number --}}
                <div class="col-6 col-md-3 mb-3">
                    <x-form.input name="family_male_number" class="border" type="number" label=" عدد الذكور " autocomplete="" min="1" placeholder="أدخل عدد الذكور "/>
                </div>

                {{-- female_number --}}
                <div class="col-6 col-md-3 mb-3">
                    <x-form.input name="family_female_number" class="border" type="number" label=" عدد الاناث " autocomplete="" min="1" placeholder="أدخل عدد الاناث "/>
                </div>

                {{-- sponsored_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="sponsored_number" class="border" type="number" label=" عدد المكفولين منهم " autocomplete="" placeholder=" أدخل عدد المكفولين منهم "/>
                </div>

                {{-- income --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="income" class="border" type="text" label=" دخل الأسرة" autocomplete="" placeholder="أدخل الدخل"/>
                </div>

                {{-- income_type --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="income_type" class="border" type="text" label=" نوع الدخل" autocomplete="" placeholder="أدخل نوع الدخل"/>
                </div>

                {{--  address --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="address" class="border" type="text" label=" العنوان " autocomplete="" placeholder="أدخل العنوان  "/>
                </div>

                {{--  phone --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="phone" class="border" type="text" label=" الهاتف " autocomplete="" placeholder="أدخل رقم الهاتف "/>
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

                {{-- Health status --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="health_status" class="border" type="text" label=" الحالة الصحية لليتيم" autocomplete="" placeholder="أدخل الحالة الصحية لليتبم"/>
                </div>

                {{-- academic_stage --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية  " autocomplete="" placeholder="أدخل المرحلة الدراسية  "/>
                </div>

                {{-- class --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
                </div>

                {{-- marital_status --}}
                <div class="col-12 mb-3">
                    <x-form.textarea name="marital_status" label=" الحالة الاجتماعية لأسرة اليتيم (رأي المشرف الاجتماعي) " value="ادخل الحالة الاجتماعية"/>
                </div>



                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn add-button mb-4"  type="submit"> حفظ </button>
                </div>

            </div>

        </form>


</x-main-layout>
