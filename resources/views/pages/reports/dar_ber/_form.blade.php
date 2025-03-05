{{-- basic-information --}}
<div class="bg-white p-3 mb-3 rounded shadow-sm">

    <div class="row" style="justify-content:between;">

        <!-- supervising_authority -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="supervising_authority"  class="border" type="text" label="  اسم الجهة المشرفة "  placeholder="أدخل اسم الجهة المشرفة"/>
        </div>


        <!-- country -->
        {{-- :value="$admin->email" --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="country"  class="border" type="text" label=" الدولة " placeholder="أدخل الدولة"/>
        </div>

        <!-- sponsor_name -->
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_name"  class="border" type="text" label=" اسم الكافل "  placeholder="أدخل اسم الكافل "/>
        </div>

        {{-- sponsor_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="sponsor_number" class="border" type="text" label=" رقم ملف الكافل " autocomplete="" placeholder="أدخل رقم ملف الكافل"/>
        </div>

        {{-- orphan_name --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_name" class="border" type="text" label=" اسم اليتيم " autocomplete="" placeholder=" أدخل اسم اليتيم"/>
        </div>

        {{-- orphan_number --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_number" class="border" type="text" label="  رقم ملف اليتيم " autocomplete="" placeholder=" أدخل رقم ملف اليتيم "/>
        </div>

        {{-- orphan_nationality --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_nationality" class="border" type="text" label="  جنسية اليتيم " autocomplete="" placeholder=" أدخل جنسية اليتيم  "/>
        </div>

        {{-- orphan_age --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_age" class="border" type="text" label="  عمر اليتيم " autocomplete="" placeholder=" أدخل عمر اليتيم  "/>
        </div>

        {{-- nationality --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="nationality" class="border" type="text" label=" الجنسية " autocomplete="" placeholder=" أدخل الجنسية  "/>
        </div>

        {{-- Health status --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="health_status" label="الحالة الصحية لليتيم"  placeholder="أدخل الحالة الصحية لليتبم"/>
        </div>

        {{-- academic_stage --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_stage" class="border" type="text" label=" المرحلة الدراسية " autocomplete="" placeholder="أدخل المرحلة الدراسية"/>
        </div>

        {{-- class --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="class" class="border" type="text" label=" الصف" autocomplete="" placeholder="أدخل الصف"/>
        </div>


        {{-- academic_level --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="academic_level" class="border" type="text" label=" المستوى الدراسي" autocomplete="" placeholder="أدخل المستوى الدراسي"/>
        </div>

        

        {{-- orphan_obligations_islam --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="orphan_obligations_islam" class="border" type="text" label=" التزامات اليتيم بتعاليم الاسلام " autocomplete="" placeholder="أدخل التزامات اليتيم بتعاليم الاسلام"/>
        </div>

        {{-- save_orphan_quran --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="save_orphan_quran" class="border" type="text" label=" حفظ اليتيم من القران الكريم " autocomplete="" placeholder="أدخل حفظ اليتيم من القران الكريم"/>
        </div>

        {{-- person_responsible--}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="person_responsible" class="border" type="text" label=" المسؤول المباشر عن اليتيم" autocomplete="" placeholder="أدخل المسؤول المباشر عن اليتيم"/>
        </div>

        {{-- relationship_orphan --}}
        <div class="col-12 col-md-6 mb-3">
            <x-form.input name="relationship_orphan" class="border" type="text" label=" صلته باليتيم" autocomplete="" placeholder="أدخل صلته باليتيم"/>
        </div>


        {{-- changes_orphan_year --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="changes_orphan_year" label=" أبرز التغيرات التي طرأت على اليتيم هذه السنة " />
        </div>


        {{--  authority_comment_guarantee --}}
        <div class="col-12  mb-3">
            <x-form.textarea name="authority_comment_guarantee" label=" تعليق الهيئة على أثر الكفالة "  placeholder="أدخل تعليق الهيئة على أثر الكفالة"/>
        </div>


        {{-- orphan_message--}}
        <div class="col-12  mb-3">
            <x-form.textarea name="orphan_message" label=" رسالة اليتيم للكافل "  />
        </div>


    </div>
</div>


<div class="d-flex justify-content-center gap-4 mt-4">
    <button class="btn add-button mb-4"  type="submit"> {{$button}} </button>
</div>

