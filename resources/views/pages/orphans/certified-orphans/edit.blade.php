<x-main-layout>

    <h4 class="mb-4" style="color:var(--title-color);"> {{__('اكمال المعلومات')}}</h4>

    <form  action="{{route('orphan.certified.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <x-form.input name="orphan_id" class="border" type="hidden"  value={{$orphan_id}}/>


            {{-- country --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="country" class="border" type="text" label=" {{__('الدولة')}} " autocomplete="" placeholder="{{__('أدخل الدولة')}}"/>
            </div>

            {{-- city --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="city" class="border" type="text" label=" {{__('المدينة')}} " autocomplete="" placeholder="{{__('أدخل اسم المدينة')}}"/>
            </div>

            {{-- responsible_volunteer --}}
            <div class="col-12 col-md-6 mb-3">
                {{-- <x-form.input name="responsible_volunteer" class="border" type="text" label=" المتطوع المسؤول " autocomplete="" placeholder="أدخل اسم المتطوع المسؤول"/> --}}
                <label class="mb-2"> {{__('المتطوع المسؤول')}} </label>
                <x-form.select name="volunteer_id" :options="$volunteers"/>
            </div>

            {{-- responsible_supporter --}}
            <div class="col-12 col-md-6 mb-3">
                {{-- <x-form.input name="responsible_supporter" class="border" type="text" label=" المانح المسؤول " autocomplete="" placeholder="أدخل اسم المانح المسؤول"/> --}}
                <label class="mb-2"> {{__('المانح المسؤول')}} </label>
                <x-form.select name="supporter_id"  :options="$supporters"/>

            </div>

            {{-- description_orphan --}}
            <div class="col-12 mb-3">

                <x-form.textarea name="description_orphan_condition" label="{{__('وصف حالة اليتيم')}}" placeholder="{{__('وصف حالة اليتيم')}}"/>

            </div>

            <!-- father_card-->
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('أرفق بطاقة الأب')}}</label> <br>
                <label for="father_card" class="custom-file-upload w-75 text-center"> {{__('أرفق بطاقة الأب')}}</label>
                <x-form.input name="father_card" class="border hidden-file-style" type="file" id="father_card" style="display: none;"  autocomplete="" />

            </div>

            <!-- Orphan Application Form-->
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('شهادة التحاق بالمدرسة')}}</label> <br>
                <label for="school_enrollment" class="custom-file-upload w-75 text-center"> {{__('أرفق شهادة التحاق بالمدرسة')}}</label>
                <x-form.input name="school_enrollment" class="border hidden-file-style" type="file" id="school_enrollment" style="display: none;"  autocomplete="" />

            </div>

            <!-- Orphan Application Form-->
            <div class="col-12 col-md-6 mb-3">
                <label class="mb-2">{{__('كارت تأمين صحي مدرسي')}}</label> <br>
                <label for="health_insurance" class="custom-file-upload w-75 text-center"> {{__('أرفق كارت تأمين صحي مدرسي')}}</label>
                <x-form.input name="health_insurance" class="border hidden-file-style" type="file" id="health_insurance" style="display: none;"  autocomplete="" />

            </div>


        </div>

        <div class="d-grid gap-2 col-1 mx-auto">
            <button type="submit" class="add-button p-2 ps-3 pe-3" > {{__('حفظ')}} </button>
        </div>

    </form>


</x-main-layout>
