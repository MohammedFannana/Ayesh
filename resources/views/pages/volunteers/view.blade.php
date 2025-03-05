<x-main-layout>

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-5"> {{$volunteer->name}} </h2>
        {{-- <div class="mb-4">
            <a href="" class="btn add-button"> تعديل </a>
        </div> --}}
    </div>

    <div class="volunteer bg-white rounded shadow-sm p-3 mb-3">

        <div class="volunteers-view row">


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الدولة')}}</p>
                <p class="fw-semibold"> {{$volunteer->country}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('رقم الجوال ')}}</p>
                <p class="fw-semibold"> {{$volunteer->phone}} </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('البريد الالكتروني')}} </p>
                <p class="fw-semibold">{{$volunteer->email}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('العنوان')}} </p>
                <p class="fw-semibold"> {{$volunteer->address}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المناطق التي ستقوم بتفطيتها ')}}</p>
                <p class="fw-semibold"> #4565754 </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اللغة')}} </p>
                <p class="fw-semibold"> فقير </p>
            </div>

        </div>


    </div>

    <div class="images-files bg-white rounded shadow-sm p-3 w-25">
        <p class="mb-3"> {{__('الصور والملفات المطلوبة ')}}</p>
        <p class="mb-3 view-file"> صورة تحقيق الشخصية .pdf</p>

    </div>


</x-main-layout>
