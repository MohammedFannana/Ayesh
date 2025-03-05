<div class="row supporters-form" style="justify-content:between;">


        <!-- name -->
        <div class="col-12 col-md-6">
            <x-form.input name="name"  class="border" type="text" label="{{__('الاسم')}}" placeholder="أدخل الاسم"/>
        </div>

        <!-- country -->
        {{-- :value="$admin->email" --}}
        <div class="col-12 col-md-6">
            <x-form.input name="country"  class="border" type="text" label="{{__('الدولة')}}" placeholder="أدخل الدولة"/>
        </div>

        {{-- phone --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="phone" class="border" type="text" label="{{__(' رقم الجوال ')}}" autocomplete="" placeholder="أدخل رقم الجوال"/>
        </div>

        {{-- Fax --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="fax" class="border" type="text" label="{{__('الفاكس')}}" autocomplete="" placeholder="أدخل الفاكس"/>
        </div>

        {{-- Association name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="association_name" class="border" type="text" label=" {{__(' اسم الجمعية ')}} " autocomplete="" placeholder="أدخل اسم الجمعية"/>
        </div>

        {{-- Department Name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="department_name" class="border" type="text" label=" {{__('اسم القسم')}} " autocomplete="" placeholder="أدخل اسم القسم"/>
        </div>

        {{-- Administrator Name --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="administrator_name" class="border" type="text" label=" {{__('اسم المسؤول')}} " autocomplete="" placeholder="أدخل اسم المسؤول"/>
        </div>

        {{-- address --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="address" class="border" type="text" label=" {{__(('العنوان'))}} " autocomplete="" placeholder="أدخل العنوان"/>
        </div>

        {{-- website --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="website" class="border" type="text" label=" {{__('الموقع الالكتروني ')}}" autocomplete="" placeholder="أدخل الموقع الالكتروني"/>
        </div>

        {{-- email --}}
        <div class="mt-4 col-12 col-md-6">
            <x-form.input name="email" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
        </div>


        <div class="d-flex justify-content-center gap-4 mt-4">
            <button class="btn text-white mb-4" style="background-color: var(--title-color);;padding-right: 30px; padding-left: 30px;" type="submit"> {{__($button)}} </button>
        </div>
    </div>
</div>


