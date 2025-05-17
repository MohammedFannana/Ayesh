<x-main-layout>

    <h2 class="mb-5"> {{$orphan->name}} </h2>

    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <p class="title mb-2"> {{__('المعلومات الأساسية')}}</p>
                    @cannot('has-certified-extra', $orphan)
                        <p class="text-danger"> {{__('يوجد معلومات غير مكتملة, قم باكمال المعلومات')}}</p>
                    @endcannot
                </div>

                @cannot('has-certified-extra', $orphan)
                    <div>
                        <form action="{{route('orphan.certified.create')}}" method="get">
                            <input type="hidden" name="orphan_id" value={{$orphan->id}}>
                            <button type="submit" class="add-button text-decoration-none pt-2 pb-2"> {{__('اكمال المعلومات')}}</button>
                        </form>
                    </div>
                @endcannot

            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الكود الداخلي')}}</p>
                <p class="fw-semibold">{{$orphan->internal_code}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__('رقم الجوال')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->phone}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('استمارة تقديم الايتام')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->application_form)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ basename($orphan->application_form) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('السن')}}  </p>
                <p class="fw-semibold">{{$orphan->age}} {{__('عام')}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة اليتيم')}}</p>
                <p class="fw-semibold">{{$orphan->case_type}}</p>
            </div>

        </div>


    </div>


    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">


        <div class="row">

            <p class="title mb-4"> {{__('الصور و الملفات')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة الميلاد')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة الميلاد') }}.{{ pathinfo($orphan->image->birth_certificate, PATHINFO_EXTENSION) }}                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('بطاقة الام')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('بطاقة الأم' ) }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                </a>
            </div>

            {{-- <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('بطاقة الأب ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->father_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' بطاقة الأب') }}.{{ pathinfo($orphan->certified_orphan_extras->father_card, PATHINFO_EXTENSION) }}
                </a>
            </div> --}}

            @if ($orphan->image->mother_death_certificate)

                <div class="flex flex-column col-4 mb-3">
                    <p class="title"> {{__('شهادة وفاة الأم')}} </p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('شهادة وفاة الأم') }}.{{ pathinfo($orphan->image->mother_death_certificate, PATHINFO_EXTENSION) }}
                    </a>
                </div>

            @endif

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأب')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>


            {{-- <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__(' شهادة التحاق بالمدرسة')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->school_enrollment)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('  شهادة التحاق' ) }}.{{ pathinfo($orphan->certified_orphan_extras->school_enrollment, PATHINFO_EXTENSION) }}
                </a>
            </div> --}}

            {{-- <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__(' كارت تأمين صحي مدرسي ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->health_insurance)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('  شهادة التحاق' ) }}.{{ pathinfo($orphan->certified_orphan_extras->health_insurance, PATHINFO_EXTENSION) }}
                </a>
            </div> --}}

        </div>

    </div>


</x-main-layout>
