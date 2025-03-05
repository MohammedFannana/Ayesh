{{-- basic-information --}}
<div class="bg-white p-3 mb-3 rounded shadow-sm">

    <div class="row" style="justify-content:between;">

        <!-- supervising_authority -->
        <div class="col-12 mb-3">
            <x-form.input name="supervising_authority"  class="border" type="text" label="   الجهة المشرفة "  placeholder="أدخل اسم الجهة المشرفة"/>
        </div>

        <!-- country -->
        {{-- :value="$admin->email" --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="country"  class="border" type="text" label=" الدولة " placeholder="أدخل الدولة"/>
        </div>


        <!-- supervising_authority_place -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="supervising_authority_place"  class="border" type="text" label=" عنوان الجهة المشرفة "  placeholder="أدخل عنوان الجهة المشرفة"/>
        </div>


        <!-- sponsor_name -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_name"  class="border" type="text" label=" اسم الكافل "  placeholder="أدخل اسم الكافل "/>
        </div>

        {{-- sponsor_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_number" class="border" type="text" label=" رقم الكافل " autocomplete="" placeholder="أدخل رقم الكافل"/>
        </div>

        {{-- orphan_name --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_name" class="border" type="text" label=" اسم اليتيم " autocomplete="" placeholder=" أدخل اسم اليتيم"/>
        </div>

        {{-- orphan_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_number" class="border" type="text" label="  رقم  اليتيم " autocomplete="" placeholder=" أدخل رقم اليتيم "/>
        </div>

        {{-- gender --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="gender" class="border" type="text" label=" الجنس " autocomplete="" placeholder=" أدخل الجنس  "/>
        </div>

        {{-- birth_date --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="birth_date" class="border" type="date" label="  تاريخ الميلاد " autocomplete=""/>
        </div>

        {{-- address--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="address" class="border" type="text" label=" العنوان " autocomplete="" placeholder="أدخل  العنوان"/>
        </div>

        {{-- phone--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="phone" class="border" type="text" label=" رقم التيلفون " autocomplete="" placeholder="أدخل رقم التيلفون "/>
        </div>

        {{-- orphan_status--}}
        <div class="col-12  mb-3">
            <x-form.input name="orphan_status" class="border" type="text" label="  حالة اليتيم" autocomplete="" placeholder="أدخل حالة اليتيم "/>
        </div>

        {{-- health_status --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="health_status" class="border" type="text" label="  الحالة الصحية " autocomplete="" placeholder="أدخل الحالة الصحية"/>
        </div>

        {{-- mother_name--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="mother_name" class="border" type="text" label=" اسم الأم" autocomplete="" placeholder="أدخل اسم الأم"/>
        </div>

        {{-- person_responsible--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible" class="border" type="text" label=" اسم المسؤول عن اليتيم" autocomplete="" placeholder="أدخل اسم المسؤول عن اليتيم"/>
        </div>

        {{-- relationship_orphan --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="relationship_orphan" class="border" type="text" label=" صلة القرابة " autocomplete="" placeholder="أدخل صلة القرابة"/>
        </div>


        {{-- religious_behavior --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="religious_behavior" class="border" type="text" label=" السلوك الديني " autocomplete="" placeholder="أدخل السلوك الديني"/>
        </div>

        {{-- memorize_quran --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="memorize_quran" class="border" type="text" label=" حفظه للقران" autocomplete="" placeholder="أدخل حفظه للقران"/>
        </div>

        {{-- class --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
        </div>


        {{-- academic_level --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_level" class="border" type="text" label=" المستوى الدراسي" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
        </div>


        {{-- letter_thanks --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="letter_thanks" label=" رسالة شكر و تقدير من اليتيم"  value="أدخل رسالة شكر و تقدير من اليتيم"/>
        </div>


        {{-- orphan_birth_certificate  --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  شهادة ميلاد اليتيم </label> <br>
            <label for="orphan_birth_certificate" class="custom-file-upload w-75 text-center"> ارفق شهادة ميلاد اليتيم </label>
            <input class="hidden-file-style" name="orphan_birth_certificate" type="file" id="orphan_birth_certificate" style="display: none;">
        </div>

        {{-- academic_certificate   --}}
        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">  صورة الشهادة الدراسية </label> <br>
            <label for="academic_certificate" class="custom-file-upload w-75 text-center"> ارفق صورة الشهادة الدراسية </label>
            <input class="hidden-file-style" name="academic_certificate" type="file" id="academic_certificate" style="display: none;">
        </div>


    </div>
</div>


<div class="d-flex justify-content-center gap-4 mt-4">
    <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
</div>


