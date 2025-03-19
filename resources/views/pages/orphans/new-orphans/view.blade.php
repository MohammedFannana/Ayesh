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
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->application_form)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ basename($orphan->application_form) }}
                </a>
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
                <p class="title"> {{__('شهادة الميلاد ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة الميلاد') }}.{{ pathinfo($orphan->image->birth_certificate, PATHINFO_EXTENSION) }}                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأب ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأم اصل كمبيوتر ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأم') }}.{{ pathinfo($orphan->image->mother_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('صور من بطاقة الام او الوصى ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' بطاقة الأم' ) }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('شهادة صور اليتيم 4*6 جديدة ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->orphan_image_4_6)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __( 'صورة اليتيم (4×6)' ) }}.{{ pathinfo($orphan->image->orphan_image_4_6, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('صورة اليتيم كاملة 9* 12 ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->orphan_image_9_12)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('صورة اليتيم (9*12)') }}.{{ pathinfo($orphan->image->orphan_image_9_12, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الافادة المدرسية ')}}   </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->school_benefit)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' إفادة مدرسية') }}.{{ pathinfo($orphan->image->school_benefit, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__(' التقرير الطبى ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->medical_report)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' تقرير طبي' ) }}.{{ pathinfo($orphan->image->medical_report, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> عرض كل التفاصيل </a>
            </div>


        </div>

    </div>


</x-main-layout>
