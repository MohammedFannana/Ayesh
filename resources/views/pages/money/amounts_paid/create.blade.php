<x-main-layout>

    <h2 class="mb-4"> المدفوعات </h2>
    <h4 class="mb-4 title-color"> إضافة منتفع </h4>


    <form action="" method="post" enctype="multipart/form-data">
        @csrf


        {{-- basic-information --}}
        <div class="bg-white p-3 mb-4 rounded shadow-sm">
            <div class="row">

                <p class="title mb-3"> المعلومات الأساسية </p>

                <!-- donor_number  -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="donor_number"  class="border" type="text" label=" رقم المنتفع "  placeholder="أدخل رقم المتبرع "/>
                </div>


                <!--  donor_name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="donor_name"  class="border" type="text" label=" اسم المنتفع "  placeholder="أدخل اسم المتبرع "/>
                </div>

                <!--  amount -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="amount"  class="border" type="text" label=" المبلغ "  placeholder="أدخل المبلغ "/>
                </div>

            </div>
        </div>

        <div class="bg-white row p-3 mb-4 rounded shadow-sm">

            <p class="title mb-4">  الصور  و الملفات المطلوبة </p>


            {{-- add_file --}}
            <div class="col-12  mb-4">
                <label for="add_file" class="custom-file-upload w-50 text-center"> اضافة ملف </label>
                <input class="hidden-file-style" name="add_file" type="file" id="fileInput" style="display: none;">
            </div>

            <div class="col-12 row gap-1 mb-4">
                <div class="col-8">
                    <x-form.input name="file_name"  class="border" type="text" placeholder=" اسم الملف "/>
                </div>

                <div class="col-1">
                    <a href="" class="submit border-0 bg-transparent">
                        <img src="{{asset('image/Delete.svg')}}" alt="">
                    </a>
                </div>
            </div>


            {{-- attach_file --}}
            <div class="col-12  mb-3">
                <label for="attach_file" class="custom-file-upload w-50 text-center"> ارفق ملف </label>
                <input class="hidden-file-style" name="attach_file" type="file" id="attach_file" style="display: none;">
            </div>

        </div>

        <div class="d-flex justify-content-center gap-4 mt-4">
            <button class="btn add-button mb-4"  type="submit"> حفظ </button>
        </div>


    </form>


</x-main-layout>
