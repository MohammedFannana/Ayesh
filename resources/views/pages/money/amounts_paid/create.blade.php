<x-main-layout>

    <h2 class="mb-4"> {{__('المدفوعات')}} </h2>
    <h4 class="mb-4 title-color"> {{__('إضافة مصروف منتفع ')}}</h4>


    <form action="{{route('expenses.store')}}" method="post" enctype="multipart/form-data">
        @csrf


        {{-- basic-information --}}
        <div class="bg-white p-3 mb-4 rounded shadow-sm">
            <div class="row">

                <p class="title mb-3"> {{__('المعلومات الأساسية ')}}</p>

                <!-- orphan_internal_code  -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __('رقم المنتفع') }}</label>
                    <div class="select-container">
                        <select id="orphan_id" name="orphan_id" class="form-control form-select @error('orphan_id') is-invalid @enderror">
                            <option value="">اختر رقم المنتفع</option>
                            @foreach($orphans as $orphan)
                                <option value="{{ $orphan->id }}">{{ $orphan->internal_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('orphan_id')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <!--  orphan_name -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __('اسم المنتفع') }}</label>
                    <select id="orphan_name" name="orphan_id_1" class="form-control form-select @error('orphan_id_1') is-invalid @enderror">
                        <option value="">اختر اسم المنتفع</option>
                        @foreach($orphans as $orphan)
                            <option value="{{ $orphan->id }}">{{ $orphan->name }}</option>
                        @endforeach
                    </select>
                    @error('orphan_id_1')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!--  amount -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="amount"  class="border" type="text" label=" {{__('المبلغ')}} "  placeholder="أدخل المبلغ "/>
                </div>

            </div>
        </div>

        <div class="bg-white row p-3 mb-4 rounded shadow-sm">

            <p class="title mb-4">  {{__('الصور  و الملفات المطلوبة ')}}</p>


            {{-- add_file --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="payment_image" class="custom-file-upload w-75 text-center"> {{__('اضافة ملف ')}}</label>
                <x-form.input name="payment_image" class="border hidden-file-style" type="file" id="payment_image" style="display: none;"  autocomplete="" />
            </div>

            <div class="col-12 row gap-1 mb-4">
                <div class="col-5">
                    <x-form.input name=""  class="border file_name" type="text" placeholder=" اسم الملف" disabled/>
                </div>

                <div class="col-1">
                    <button class="btn delete_image_path" class="submit border-0 bg-transparent">
                        <img src="{{asset('image/Delete.svg')}}" alt="">
                    </button>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center gap-4 mt-4">
            <button class="btn add-button mb-4"  type="submit"> {{__('حفظ')}} </button>
        </div>


    </form>

    @push('scripts')

        {{-- script for two select --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let orphanIdSelect = document.getElementById("orphan_id");
                let orphanNameSelect = document.getElementById("orphan_name");

                // تحويل القائمة إلى كائن لتسهيل البحث
                let orphans = {};
                @foreach($orphans as $orphan)
                    orphans["{{ $orphan->id }}"] = "{{ $orphan->name }}";
                @endforeach

                // عند تغيير `رقم الداعم`
                orphanIdSelect.addEventListener("change", function () {
                    let selectedId = this.value;
                    orphanNameSelect.value = selectedId; // تحديث القائمة الثانية بنفس القيمة
                });

                // عند تغيير `اسم الداعم`
                orphanNameSelect.addEventListener("change", function () {
                    let selectedId = this.value;
                    orphanIdSelect.value = selectedId; // تحديث القائمة الأولى بنفس القيمة
                });
            });
        </script>

        {{-- script for file to show file path --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let fileInput = document.getElementById("payment_image"); // حقل اختيار الصورة
                let fileNameInput = document.querySelector(".file_name"); // حقل عرض اسم الملف
                let deleteButton = document.querySelector(".delete_image_path"); // زر حذف الملف

                // عند اختيار ملف
                fileInput.addEventListener("change", function () {
                    if (this.files.length > 0) {
                        fileNameInput.value = this.files[0].name; // عرض اسم الملف
                    }
                });

                // عند الضغط على زر الحذف
                deleteButton.addEventListener("click", function (e) {
                    e.preventDefault(); // منع إرسال الفورم
                    fileInput.value = ""; // إعادة تعيين حقل اختيار الصورة
                    fileNameInput.value = ""; // مسح اسم الملف
                });
            });
        </script>

    @endpush

</x-main-layout>
