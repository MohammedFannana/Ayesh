<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين </h2>
    <h4 class="mb-5 title-color">  الحالات المدخلة - جمعية المجموعة </h4>


        <form action="" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row orphans-form" style="justify-content:between;">

                <!-- sub_association_name -->
                <div class="col-12  mb-3">
                    <x-form.input name="sub_ssociation_name"  class="border" type="text" label=" اسم الجمعية الفرعية "  placeholder=" أدخل اسم الجمعية الفرعية "/>
                </div>

                <!-- orphan_number -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_number"  class="border" type="text" label=" رقم اليتيم "  placeholder=" أدخل رقم اليتيم "/>
                </div>

                <!-- orphan_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="orphan_name"  class="border" type="text" label=" اسم اليتيم "  placeholder=" أدخل اسم اليتيم "/>
                </div>

                {{-- birth_date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="birth_date" class="border" type="date" label=" تاريخ ميلاد اليتيم " autocomplete="" />
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

                {{-- father_death --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="father_death" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete="" />
                </div>


                {{-- brothers_number --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="family_number" class="border" type="number" label=" عدد الأخوة" autocomplete="" min="1" placeholder="أدخل عدد الأخوة"/>
                </div>

                {{-- academic_stage --}}
                <div class="col-12 col-md-6 mb-3 ">
                    <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية  " autocomplete="" placeholder="أدخل المرحلة الدراسية  "/>
                </div>

                {{-- class --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
                </div>


                {{-- Health status --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="health_status" class="border" type="text" label=" حاله اليتيم الصحيه " autocomplete="" placeholder="أدخل حاله اليتيم الصحيه "/>
                </div>


                {{-- mother_name --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم " autocomplete="" placeholder="ادخل اسم الأم"/>
                </div>

                {{-- mother_work --}}
                <div class="col-12 col-md-6 mb-3">

                    <label for="mother_work"> هل تعمل الام </label>
                    <select name="mother_work" id="mother_work" class= "form-control form-select @if ( $errors->has('mother_work')) is-invalid @endif" style="width:100%; border-radius: 0.375rem;    border-color: rgb(209 213 219);">

                        <option value="yes"> نعم </option>
                        <option value="no"> لا </option>

                    </select>

                    <x.form.validation-feedback name="mother_work" />
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
                    <x-form.input name="address" class="border" type="text" label=" العنوان " autocomplete="" placeholder="أدخل العنوان "/>
                </div>

                {{-- notes --}}
                <div class="col-12 mb-3">
                    <x-form.textarea name="notes" label="ملاحظات" value="اكتب ملاحظات"/>
                </div>

                {{--  date --}}
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="date" class="border" type="text" label=" التاريخ " autocomplete="" placeholder="أدخل تاريخ  "/>
                </div>


                {{-- signature --}}
                <div class="col-12 col-md-6 mb-3">

                    <label class="mb-2"> توقيع المسؤول </label> <br>
                    <label for="signature" class="custom-file-upload w-50 text-center"> ارفق  صورة التوقيع  </label>
                    <input class="hidden-file-style" name="signature" type="file" id="signature" style="display: none;">

                </div>


                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn add-button mb-4"  type="submit"> حفظ </button>
                </div>

        </form>


</x-main-layout>
