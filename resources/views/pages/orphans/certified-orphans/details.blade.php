<x-main-layout>

    <div class="d-flex justify-content-between  mb-4">

        <div>
            <h2 class="mb-4"> محمد أحمد </h2>
        </div>

        <div class="d-flex flex-column gap-2">
            <img src="{{asset('image/Frame.png')}}" alt="" width="118px" height="118px">
            <a href="" class="add-button  text-decoration-none p-1 text-center" style="width:118px">تحميل الباركود</a>
        </div>

    </div>

    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> المعلومات الأساسية </p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> الكود الداخلي</p>
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

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> رقم الجوال</p>
                <p class="fw-semibold"> 0595654852  </p>
            </div>


            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> استمارة التسجيل  </p>
                <p class="view-file">استمارة محمد.pdf</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المتطوع المسؤول </p>
                <p class="fw-semibold"> أحمد خالد </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> المانح المسؤول</p>
                <p class="fw-semibold">محمد خالد</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  السن  </p>
                <p class="fw-semibold">13</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> حالة اليتيم</p>
                <p class="fw-semibold">مريض</p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> وصف حالة اليتيم </p>
                <p class="fw-semibold">  يتيم الأبوين</p>
            </div>


        </div>


    </div>


    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">


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

</x-main-layout>
