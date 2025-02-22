<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين </h2>
    <h4 class="mb-5 title-color">  الحالات المدخلة - جمعية دار البر </h4>


        <form action="" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row orphans-form" style="justify-content:between;">

                <!-- orphan_id -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_id"  class="border" type="text" label=" رقم اليتيم "  placeholder=" أدخل رقم اليتيم "/>
                </div>

                <!-- organization_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="organization_name"  class="border" type="text" label=" اسم الهيئة "  placeholder=" أدخل اسم الهيئة "/>
                </div>

                <!-- organization_id -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="organization_id"  class="border" type="text" label=" رقم الهيئة "  placeholder=" أدخل رقم الهيئة "/>
                </div>

                <!-- country -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="country"  class="border" type="text" label="الدولة"  placeholder=" أدخل الدولة"/>
                </div>

                <!-- city -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="city"  class="border" type="text" label="المدينة"  placeholder=" أدخل المدينة"/>
                </div>

                <!-- name -->
                {{-- :value="$admin->email" --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="name"  class="border" type="text" label="اسم اليتيم" placeholder="أدخل اسم اليتيم"/>
                </div>

                <!-- father_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_name"  class="border" type="text" label="اسم الاب" placeholder="أدخل اسم الاب"/>
                </div>

                <!-- grandfather_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="grandfather_name"  class="border" type="text" label="اسم الجد" placeholder="أدخل اسم الجد"/>
                </div>


                <!-- last_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="last_name"  class="border" type="text" label="اسم العائلة" placeholder="أدخل اسم العائلة"/>
                </div>

                {{--nationality--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="nationality" class="border" type="text" label=" الجنسيه " autocomplete="" placeholder="أدخل الجنسيه"/>
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

                {{-- orphan --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <label for="orphan" class="mb-2"> يتيم الأبوين </label>
                    <div class="d-flex" style="gap: 180px">
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

                {{-- birth_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_date" class="border" type="date" label=" تاريخ ميلاد اليتيم " autocomplete="" />
                </div>

                {{-- birth_place--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_place" class="border" type="text" label=" مكان الميلاد " autocomplete="" placeholder="ادخل مكان الميلاد"/>
                </div>

                {{-- father_death --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_death" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete="" />
                </div>

                {{-- father_religion--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_religion" class="border" type="text" label="  ديانه الأب " autocomplete="" placeholder="ادخل ديانه الأب"/>
                </div>

                {{-- mother_religion--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_religion" class="border" type="text" label="  ديانه الأم " autocomplete="" placeholder="ادخل ديانه الأم"/>
                </div>

                {{-- mother_work --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_work" class="border" type="text" label="  عمل الأم " autocomplete="" placeholder="ادخل عمل الأم"/>
                </div>

                {{-- mother_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder="ادخل اسم الأم"/>
                </div>

                {{-- mother_salary--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_salary" class="border" type="text" label=" الراتب الشهري للأم " autocomplete="" placeholder="ادخل الراتب الشهري للأم"/>
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

                {{--  subsidies --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="subsidies" class="border" type="text" label=" اعانات أخرى " autocomplete="" placeholder=" أدخل عدد المكفولين عنهم "/>
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
                    <x-form.input name="sponsored_number" class="border" type="number" label=" عدد المكفولين عنهم " autocomplete="" placeholder=" أدخل عدد المكفولين عنهم "/>
                </div>

                {{-- Health status --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="health_status" class="border" type="text" label=" حاله اليتيم الصحيه " autocomplete="" placeholder="أدخل حاله اليتيم الصحيه "/>
                </div>


                {{-- academic_stage --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية  " autocomplete="" placeholder="أدخل المرحلة الدراسية  "/>
                </div>

                {{-- class --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
                </div>


                {{-- responsible --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="responsible" class="border" type="text" label=" المسئول المباشر عن اليتيم " autocomplete="" placeholder="أدخل  المسئول المباشر عن اليتيم"/>
                </div>


                {{--  orphan_relationship --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_relationship" class="border" type="text" label=" صلته باليتيم " autocomplete="" placeholder="أدخل صلته باليتيم"/>
                </div>

                {{--  address --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="address" class="border" type="text" label=" عنوان اليتيم بالكامل " autocomplete="" placeholder="أدخل عنوان اليتيم بالكامل "/>
                </div>

                {{--  phone --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="phone" class="border" type="text" label=" الهاتف " autocomplete="" placeholder="أدخل رقم الهاتف "/>
                </div>

                {{--  authority_official --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="authority_official" class="border" type="text" label=" المسئول عن الهيئة " autocomplete="" placeholder="أدخل المسئول عن الهيئة "/>
                </div>

                {{--  release_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="release_date" class="border" type="text" label=" تاريخ الاصدار " autocomplete="" placeholder="أدخل تاريخ الاصدار "/>
                </div>


                {{-- signature --}}
                <div class="col-12 col-md-6 mb-3">

                    <label class="mb-2"> التوقيع و الختم  </label> <br>
                    <label for="signature" class="custom-file-upload w-50 text-center"> ارفق  صورة التوقيع  </label>
                    <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

                </div>


                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn add-button mb-4"  type="submit"> حفظ </button>
                </div>

        </form>


</x-main-layout>
