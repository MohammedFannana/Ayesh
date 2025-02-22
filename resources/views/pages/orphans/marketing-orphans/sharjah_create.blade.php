<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين </h2>
    <h4 class="mb-5 title-color">  الحالات المدخلة - جمعية الشارقة </h4>


        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row orphans-form" style="justify-content:between;">

                <!-- name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_id"  class="border" type="text" label=" الاسم الكامل لليتيم "  placeholder=" أدخل الاسم الكامل لليتيم "/>
                </div>

                {{-- orphan --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <label for="orphan" class="mb-2"> يتيم الأبوين </label>
                    <div class="d-flex" style="gap:180px ">
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

                {{-- birth_place--}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_place" class="border" type="text" label=" مكان الميلاد " autocomplete="" placeholder="ادخل مكان الميلاد"/>
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

                {{-- birth_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_date" class="border" type="date" label=" تاريخ ميلاد اليتيم " autocomplete="" />
                </div>

                <!-- age -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="age"  class="border" type="text" label=" السن "  placeholder=" أدخل السن "/>
                </div>

                {{-- Reason for sponsorship after puberty --}}
                <div class="col-12 mb-3">
                    <x-form.textarea name="sponsorship_after_puberty" label=" سبب استمرار الكفالة بعد البلوغ " value="ادخل سبب استمرار الكفالة بعد البلوغ "/>
                </div>

                {{-- father_death --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_death" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete="" />
                </div>

                {{-- mother_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder="ادخل اسم الأم"/>
                </div>

                {{-- mother_death --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_death" class="border" type="date" label=" تاريخ وفاة الأم في حال وفاتها " autocomplete="" />
                </div>

                {{-- family_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="family_number" class="border" type="number" label=" عدد أفراد الأسرة" autocomplete="" min="1" placeholder="أدخل عدد أفراد الأسرة"/>
                </div>


                <!-- guardian_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="guardian_name"  class="border" type="text" label=" اسم ولى الامر "  placeholder=" أدخل اسم ولى الامر "/>
                </div>

                <!-- relationship -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="relationship"  class="border" type="text" label="صلة القرابه"  placeholder=" أدخل صلة القرابه"/>
                </div>


                {{--  phone --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="phone" class="border" type="text" label=" الهاتف " autocomplete="" placeholder="أدخل رقم الهاتف "/>
                </div>

                {{--  whatsapp_phone --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="whatsapp_phone" class="border" type="text" label=" الهاتف واتساب " autocomplete="" placeholder="أدخل رقم الهاتف واتساب   "/>
                </div>

                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn add-button mb-4"  type="submit"> حفظ </button>
                </div>

        </form>


</x-main-layout>
