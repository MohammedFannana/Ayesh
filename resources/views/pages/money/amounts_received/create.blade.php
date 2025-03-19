<x-main-layout>

    <h2 class="mb-4"> {{__('المقبوضات')}} </h2>
    <h4 class="mb-4 title-color"> {{__('إضافة مبلغ ')}}</h4>


    <form action="{{route('balance.store')}}" method="post" enctype="multipart/form-data">
        @csrf


        {{-- basic-information --}}
        <div class="bg-white p-3 mb-4 rounded shadow-sm">
            <div class="row">

                <p class="title mb-3"> {{__('المعلومات الأساسية ')}}</p>


                <!-- donor_number  -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __('رقم الداعم') }}</label>
                    <select id="donor_id" name="donor_id" class="form-control form-select @error('donor_id') is-invalid @enderror">
                        <option value="">اختر رقم الداعم</option>
                        @foreach($donors as $donor)
                            <option value="{{ $donor->id }}">{{ $donor->id }}</option>
                        @endforeach
                    </select>
                    @error('donor_id')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <!--  donor_name -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="mb-2">{{ __('اسم الداعم') }}</label>
                    <select id="donor_name" name="donor_id_1" class="form-control form-select @error('donor_id_1') is-invalid @enderror">
                        <option value="">اختر اسم الداعم</option>
                        @foreach($donors as $donor)
                            <option value="{{ $donor->id }}">{{ $donor->name }}</option>
                        @endforeach
                    </select>
                    @error('donor_id_1')
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
                let donorIdSelect = document.getElementById("donor_id");
                let donorNameSelect = document.getElementById("donor_name");

                // تحويل القائمة إلى كائن لتسهيل البحث
                let donors = {};
                @foreach($donors as $donor)
                    donors["{{ $donor->id }}"] = "{{ $donor->name }}";
                @endforeach

                // عند تغيير `رقم الداعم`
                donorIdSelect.addEventListener("change", function () {
                    let selectedId = this.value;
                    donorNameSelect.value = selectedId; // تحديث القائمة الثانية بنفس القيمة
                });

                // عند تغيير `اسم الداعم`
                donorNameSelect.addEventListener("change", function () {
                    let selectedId = this.value;
                    donorIdSelect.value = selectedId; // تحديث القائمة الأولى بنفس القيمة
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
