{{-- basic-information --}}
<div class="bg-white p-3 mb-3 rounded shadow-sm">

    <div class="row" style="justify-content:between;">

        {{-- orphan_number --}}
                {{-- :value="$admin->email" --}}

        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_number" class="border" type="text" label="  رقم اليتيم " autocomplete="" placeholder=" أدخل رقم اليتيم "/>
        </div>

        {{-- report_date --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_name" class="border" type="date" label="  تاريخ التقرير " autocomplete=""/>
        </div>

        {{-- orphan_name --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_name" class="border" type="text" label=" اسم اليتيم " autocomplete="" placeholder=" أدخل اسم اليتيم"/>
        </div>

        {{-- nationality --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="nationality" class="border" type="text" label=" الجنسية " autocomplete="" placeholder=" أدخل الجنسية  "/>
        </div>

        {{-- birth_date --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="birth_date" class="border" type="date" label="  تاريخ الميلاد " autocomplete=""/>
        </div>

        {{-- birth_place --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="birth_place" class="border" type="text" label=" مكان الميلاد  " autocomplete="" placeholder=" أدخل مكان الميلاد   "/>
        </div>

        {{-- gender --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="gender" class="border" type="text" label=" الجنس " autocomplete="" placeholder=" أدخل الجنس  "/>
        </div>

        {{-- person_responsible--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible" class="border" type="text" label=" اسم المسؤول عن اليتيم" autocomplete="" placeholder="أدخل اسم المسؤول عن اليتيم"/>
        </div>

        {{-- mother_name--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم" autocomplete="" placeholder="أدخل اسم الأم"/>
        </div>

        {{-- father_death --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="father_death" class="border" type="date" label=" تاريخ وفاة الأب " autocomplete=""/>
        </div>


        {{-- academic_stage --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية " autocomplete="" placeholder="أدخل المرحلة الدراسية"/>
        </div>

        {{-- health_status --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="health_status" class="border" type="text" label="  الحالة الصحية " autocomplete="" placeholder="أدخل الحالة الصحية"/>
        </div>


        {{-- Health notes --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="health_notes" label=" ملاحظات على الحالة الصحية "  value="أدخل ملاحظات على الحالة الصحية"/>
        </div>

        {{-- orphanage_management_notes --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="orphanage_management_notes" label="  ملاحظات إدارة الأيتام "  value="أدخل  ملاحظات إدارة الأيتام"/>
        </div>


        {{-- address_supervising_authority --}}
        <div class="col-12 mb-3">
            <x-form.input name="address_supervising_authority" class="border" type="text" label=" عنوان الجهة المشرفة" autocomplete="" placeholder="أدخل عنوان الجهة المشرفة"/>
        </div>

        {{-- electronic_supervisory_seal --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2"> ختم اللجنة المشرفة الالكتروني</label> <br>
            <label for="electronic_supervisory_seal" class="custom-file-upload w-75 text-center"> ارفق ختم اللجنة المشرفة الالكتروني </label>
            <input class="hidden-file-style" name="electronic_supervisory_seal" type="file" id="electronic_supervisory_seal" style="display: none;">
        </div>


        {{-- dubai_accreditation --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">   اعتماد جمعية دبي الخيرية</label> <br>
            <label for="dubai_accreditation" class="custom-file-upload w-75 text-center"> ارفق اعتماد جمعية دبي الخيرية  </label>
            <input class="hidden-file-style" name="dubai_accreditation" type="file" id="dubai_accreditation" style="display: none;">
        </div>


        {{-- mother_death_certificate --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2"> صورة اليتيم</label> <br>
            <label for="orphan_image" class="custom-file-upload w-75 text-center"> ارفق  صورة اليتيم  </label>
            <input class="hidden-file-style" name="orphan_image" type="file" id="orphan_image" style="display: none;">
        </div>


        {{-- group_photo --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2"> صورة جماعية</label> <br>
            <label for="group_photo" class="custom-file-upload w-75 text-center"> ارفق صورة جماعية </label>
            <input class="hidden-file-style" name="group_photo" type="file" id="group_photo" style="display: none;">
        </div>


        {{-- orphan_message--}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2"> رسالة اليتيم للكافل</label> <br>
            <label for="orphan_message" class="custom-file-upload w-75 text-center"> ارفق رسالة اليتيم للكافل </label>
            <input class="hidden-file-style" name="orphan_message" type="file" id="orphan_message" style="display: none;">
        </div>


        {{-- orphan_educational  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2"> شهادة اليتيم الدارسية</label> <br>
            <label for="orphan_educational" class="custom-file-upload w-75 text-center"> ارفق شهادة اليتيم الدارسية </label>
            <input class="hidden-file-style" name="orphan_educational" type="file" id="orphan_educational" style="display: none;">
        </div>






    </div>
</div>


<div class="d-flex justify-content-center gap-4 mt-4">
    <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
</div>

