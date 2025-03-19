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
                <p class="fw-semibold">
                    @foreach ($volunteer->area as $area )
                        {{$area}} ,
                    @endforeach
                </p>
            </div>




            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اللغة')}} </p>
                <p class="fw-semibold">
                    @foreach ($volunteer->languages as $language )
                        {{$language}} ,
                    @endforeach
                </p>
            </div>

        </div>


    </div>

    <div class="images-files bg-white rounded shadow-sm p-3 ">
        <p class="mb-3"> {{__('الصور والملفات المطلوبة ')}}</p>

        <div class="mb-3">
            <p class="title"> {{__(' صورة تحقيق الشخصية ')}}</p>
            <a  href="{{route('orphan.image' , ['file' => encrypt($volunteer->selfie_image)])}}" type="button" class="text-decoration-none view-file w-25">
                {{ __('صورة للتوقيع') }}.{{ pathinfo($volunteer->selfie_image, PATHINFO_EXTENSION) }}
            </a>
        </div>


    </div>


</x-main-layout>
