<x-main-layout>


    <h2 class="mb-4"> محمد أحمد </h2>


    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> المعلومات الأساسية </p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> الكود الداخلي</p>
                <p class="fw-semibold"> #55558</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> الكود الخارجي</p>
                <p class="fw-semibold"> #55558</p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> الدولة </p>
                <p class="fw-semibold"> فلسطين  </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المدينة  </p>
                <p class="fw-semibold"> غزة </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> استمارة التسجيل  </p>
                <p class="view-file">استمارة محمد.pdf</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> تم تقديمه ل </p>
                <p class="fw-semibold"> جمعية دار البر </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المتطوع المسؤول </p>
                <p class="fw-semibold"> أحمد خالد </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المانح المسؤول</p>
                <p class="fw-semibold">محمد خالد</p>
            </div>


            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المبلغ المقبوض</p>
                <p class="fw-semibold"> 300$ </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المبلغ المصروف</p>
                <p class="fw-semibold"> 300$ </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> وصف حالة اليتيم </p>
                <p class="fw-semibold">  يتيم الأبوين</p>
            </div>


        </div>


    </div>


    {{-- image and file --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">


        <div class="row">

            <p class="title mb-4"> الصور و الملفات </p>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> شهادة الميلاد </p>
                <p class="view-file">شهادة الميلاد.pdf</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">بطاقة الام </p>
                <p class="view-file">  بطاقة الام.pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">بطاقة الاب </p>
                <p class="view-file">  بطاقة الاب.pdf </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> شهادة وفاة الأم </p>
                <p class="view-file"> شهادة وفاة الأم .pdf </p>
            </div>



            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> شهادة وفاة الأب  </p>
                <p class="view-file"> شهادة وفاة الأب .pdf </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> شهادة التحاق بالمدرسة    </p>
                <p class="view-file">  شهادة التحاق بالمدرسة.pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> كارت تأمين صحي مدرسي  </p>
                <p class="view-file">كارت تأمين صحي مدرسي.pdf </p>
            </div>


        </div>

    </div>


    {{-- image and file --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="title-color">قائمة التحويلات</h4>
            <a href="" type="button" class="btn add-button "> عرض الكل </a>
        </div>

        <hr>

        <p class="text-center p-3  fw-semibold " style="background-color: #ECECEC; font-size:18px"> الرصيد الكلي <span class="title-color fs-5 fw-bold">+500$</span> </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> المبلغ </th>
                    <th scope="col" class="text-center"> صورة الايصال </th>
                    <th scope="col" class="text-end"> تاريخ التحويل </th>

                </tr>
            </thead>

            <tbody>

                <tr>
                    <td scope="row" class="title-color">+200$</td>
                    <td class="text-center"> صورة.png</td>
                    <td class="text-end"> 3 مارس 2024 </td>
                </tr>

                <tr>
                    <td scope="row" class="text-danger">-50$</td>
                    <td class="text-center"> صورة.png</td>
                    <td class="text-end"> 3 مارس 2024 </td>
                </tr>

                <tr>
                    <td scope="row" class="title-color">+200$</td>
                    <td class="text-center"> صورة.png</td>
                    <td class="text-end"> 3 مارس 2024 </td>
                </tr>

            </tbody>
        </table>



    </div>



</x-main-layout>
