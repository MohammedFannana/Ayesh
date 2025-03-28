<div class="row doners-form" style="justify-content:between;">

    <!-- name -->
    <div class="col-12 col-md-6">
        <x-form.input name="name"  class="border" type="text" label=" {{__('الاسم')}} " placeholder="{{__('أدخل الاسم')}}"/>
    </div>

    <!-- country -->
    {{-- :value="$admin->email" --}}
    <div class="col-12 col-md-6">
        <x-form.input name="country"  class="border" type="text" label="{{__('الدولة')}}" placeholder="{{__('أدخل الدولة')}}"/>
    </div>

    {{-- phone --}}
    <div class="mt-4 col-12 col-md-6">
        <x-form.input name="phone" class="border" type="text" label="{{__('رقم الجوال')}} " autocomplete="" placeholder="{{__('أدخل رقم الجوال')}}"/>
    </div>

    {{-- Fax --}}
    <div class="mt-4 col-12 col-md-6">
        <x-form.input name="fax" class="border" type="text" label=" {{__('الفاكس')}} " autocomplete="" placeholder="{{__('أدخل الفاكس')}}"/>
    </div>

    {{-- website --}}
    <div class="mt-4 col-12 col-md-6">
        <x-form.input name="website" class="border" type="text" label=" {{__('الموقع الالكتروني')}}   " autocomplete="" placeholder="{{__('أدخل الموقع الالكتروني')}}"/>
    </div>

    {{-- email --}}
    <div class="mt-4 col-12 col-md-6">
        <x-form.input name="email" class="border" type="email" label=" {{__('البريد الالكتروني')}}   " autocomplete="" placeholder="{{__('أدخل البريد الالكتروني')}}"/>
    </div>

    {{-- address --}}
    <div class="mt-4 col-12 col-md-6">
        <x-form.input name="address" class="border" type="text" label=" {{__('العنوان')}}  " autocomplete="" placeholder="{{__('أدخل العنوان')}}"/>
    </div>


    <div class="d-flex justify-content-center gap-4 mt-4">
        <button class="btn text-white mb-4" style="background-color: var(--title-color);;padding-right: 30px; padding-left: 30px;" type="submit"> {{$button}} </button>
    </div>

</div>


