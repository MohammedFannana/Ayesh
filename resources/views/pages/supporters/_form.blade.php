<div class="row supporters-form" style="justify-content:between;">


        <!-- name -->
        <div class="col-12 col-md-6">
            <x-form.input name="name"  class="border" type="text" label="الاسم" placeholder="أدخل الاسم"/>
        </div>

        <!-- country -->
        {{-- :value="$admin->email" --}}
        <div class="col-12 col-md-6">
            <x-form.input name="country"  class="border" type="text" label="الدولة" placeholder="أدخل الدولة"/>
        </div>

        {{-- phone --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="phone" class="border" type="text" label="رقم الجوال" autocomplete="" placeholder="أدخل رقم الجوال"/>
        </div>

        {{-- Fax --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="fax" class="border" type="text" label="الفاكس" autocomplete="" placeholder="أدخل الفاكس"/>
        </div>

        {{-- Association name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="association" class="border" type="text" label="اسم الجمعية" autocomplete="" placeholder="أدخل اسم الجمعية"/>
        </div>

        {{-- Department Name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="department" class="border" type="text" label="اسم القسم" autocomplete="" placeholder="أدخل اسم القسم"/>
        </div>

        {{-- Administrator Name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="administrator" class="border" type="text" label="اسم المسؤول" autocomplete="" placeholder="أدخل اسم المسؤول"/>
        </div>

        {{-- address --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="address" class="border" type="text" label=" العنوان " autocomplete="" placeholder="أدخل العنوان"/>
        </div>

        {{-- website --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="website" class="border" type="text" label=" الموقع الالكتروني " autocomplete="" placeholder="أدخل الموقع الالكتروني"/>
        </div>

        {{-- email --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="email" class="border" type="email" label=" البريد الالكتروني " autocomplete="" placeholder="أدخل البريد الالكتروني"/>
        </div>


        <div class="d-flex justify-content-center gap-4 mt-4">
            <button class="btn text-white mb-4" style="background-color: var(--title-color);;padding-right: 30px; padding-left: 30px;" type="submit"> {{$button}} </button>
        </div>
    </div>
</div>


