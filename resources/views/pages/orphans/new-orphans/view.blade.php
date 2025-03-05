<x-main-layout>

    <h2 class="mb-5"> {{__('يتيم جديد')}} </h2>

    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> {{__('المعلومات الأساسية ')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('كود اليتيم الداخلي ')}}</p>
                <p class="fw-semibold"> {{$orphan->internal_code}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('استمارة تقديم الايتام ')}} </p>
                <p class="view-file"> {{$orphan->application_form}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم اليتيم ')}}</p>
                <p class="fw-semibold">  {{$orphan->name}}</p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('الرقم القومى لليتيم ')}}</p>
                <p class="fw-semibold">{{$orphan->national_id}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ الميلاد ')}}</p>
                <p class="fw-semibold">{{$orphan->birth_date}}</p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('جهة الميلاد')}}</p>
                <p class="fw-semibold">{{$orphan->birth_place}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('النوع')}} </p>
                <p class="fw-semibold"> {{$orphan->gender}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('السن')}} </p>
                <p class="fw-semibold"> {{$orphan->age}} سنوات </p>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> عرض كل التفاصيل </a>
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
                <p class="title"> شهادة وفاة الأب  </p>
                <p class="view-file"> شهادة وفاة الأب .pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> شهادة وفاة الأم اصل كمبيوتر  </p>
                <p class="view-file"> شهادة وفاة الأم .pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   صور من بطاقة الام او الوصى  </p>
                <p class="view-file"> شهادة بطاقة الام او الوصى .pdf </p>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  شهادة صور اليتيم 4*6 جديدة  </p>
                <p class="view-file">   صور اليتيم 4*6 جديدة.pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> صورة اليتيم كاملة 9* 12  .pdf </p>
                <p class="view-file">   صورة اليتيم كاملة 9* 12.pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> الافادة المدرسية    </p>
                <p class="view-file">    الافادة المدرسية.pdf </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> التقرير الطبى </p>
                <p class="view-file">التقرير الطبى .pdf </p>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> عرض كل التفاصيل </a>
            </div>


        </div>

    </div>


</x-main-layout>
