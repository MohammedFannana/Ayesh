<x-main-layout>

    <h2 class="mb-4"> {{__('المتطوعين')}} </h2>
    <h4 class="mb-4 title-color"> {{__('إضافة متطوع ')}}</h4>


    <div class="volunteers">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded shadow-sm p-3 mb-4">
                <p style="color:var(--text-color)" class="mb-3"> {{__('المعلومات الأساسية')}} </p>

                <div class="row volunteers-form" style="justify-content:between;">

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
                        <x-form.input name="phone" class="border" type="text" label=" {{__(' رقم الجوال ')}} " autocomplete="" placeholder="أدخل رقم الجوال"/>
                    </div>

                    {{-- email --}}
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="email" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                    </div>

                    {{-- address --}}
                    <div class="mt-4 col-12">
                        <x-form.input name="address" class="border" type="text" label=" {{__('العنوان')}} " autocomplete="" placeholder="أدخل العنوان"/>
                    </div>

                    {{-- area --}}
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="area" class="border" type="text" label="  {{__('المناطق التي ستقوم بتغطيتها ')}}" autocomplete="" placeholder="أدخل المنطقة"/>
                    </div>


                    {{-- language --}}
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="language" class="border" type="text" label=" {{__('اللغة')}} " autocomplete="" placeholder="أدخل اللغة"/>
                    </div>

                </div>

            </div>

            <div class="bg-white rounded shadow-sm p-3">
                <p style="color:var(--text-color)" class="mb-3"> {{__('الصور والملفات المطلوبة ')}}</p>

                <label for="image" class="mb-3"> {{__('صورة تحقق شخصية ')}} </label> <br>
                <label for="fileInput" class="custom-file-upload text-center" style="width:30%"> {{__('ارفق صورة تحقق  شخصية ')}}</label>
                <input class="hidden-file-style" name="selfie_image" type="file" id="fileInput" style="display: none;">
            </div>

            <div class="d-flex justify-content-center gap-4 mt-4">
                <button class="btn text-white mb-4" style="background-color: var(--title-color);padding-right: 30px; padding-left: 30px;" type="submit"> {{__('حفظ')}} </button>
            </div>

        </form>

    </div>

</x-main-layout>
