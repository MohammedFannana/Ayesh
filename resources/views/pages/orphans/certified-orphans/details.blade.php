<x-main-layout>

    <div class="d-flex justify-content-between  mb-4">

        <div>
            <h2 class="mb-4"> {{ $orphan->name }}</h2>
            <x-alert name="success" />
            <x-alert name="danger" />
        </div>

        <div class="d-flex flex-column gap-2">
            {!! QrCode::size(150)->generate(route('orphan.registered.details' , $orphan->id)) !!}
            <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button  text-decoration-none p-1 text-center" style="width:150px">{{__('تحميل الباركود')}}</a>
        </div>

    </div>

    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> {{__('المعلومات الأساسية')}}</p>


           <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('كود اليتيم الداخلي')}}</p>
                <p class="fw-semibold"> {{$orphan->internal_code}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('استمارة تقديم الايتام')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->application_form)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ basename($orphan->application_form) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم اليتيم')}}</p>
                <p class="fw-semibold">  {{$orphan->name}}</p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('الرقم القومي لليتيم')}}</p>
                <p class="fw-semibold">{{$orphan->national_id}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ الميلاد')}}</p>
                <p class="fw-semibold">{{$orphan->birth_date}}</p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('جهة الميلاد')}}</p>
                <p class="fw-semibold">{{$orphan->birth_place}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الجنس')}} </p>
                <p class="fw-semibold"> {{$orphan->gender}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('السن')}} </p>
                <p class="fw-semibold"> {{$orphan->age}} {{__('سنوات')}} </p>
            </div>

            <hr>

            @if($orphan->case_type)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('نوع الحالة')}}</p>
                    <p class="fw-semibold"> {{$orphan->case_type}} </p>
                </div>
            @endif

            @if($orphan->health_status)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title">  {{__('الحالة الصحية لليتيم')}}</p>
                    <p class="fw-semibold">  {{$orphan->health_status}}  </p>
                </div>
            @endif

            @if($orphan->disease_description)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title">  {{__('وصف المرض')}}</p>
                    <p class="fw-semibold">  {{$orphan->disease_description}}  </p>
                </div>
            @endif

            @if($orphan->disability_type)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title">  {{__('نوع الإعاقة')}}</p>
                    <p class="fw-semibold">  {{$orphan->disability_type}}  </p>
                </div>
            @endif

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ وفاة الأب')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->father_death_date}} </p>
            </div>



            <hr>

            @if($orphan->profile->mother_death_date)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('تاريخ وفاة الأم')}}</p>
                    <p class="fw-semibold"> {{$orphan->profile->mother_death_date}} </p>
                </div>
            @endif

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('اسم الأم')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->mother_name}}  </p>
            </div>

            @if($orphan->profile && $orphan->profile->mother_work)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('هل تعمل الأم')}}</p>
                    <p class="fw-semibold"> {{$orphan->profile->mother_work}} </p>
                </div>
            @endif

            @if($orphan->profile && $orphan->profile->mother_status)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('حالة الأم')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->mother_status}}  </p>
                </div>
            @endif

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم الوصي')}}</p>
                <p class="fw-semibold">  {{$orphan->guardian->guardian_name}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__('الرقم القومي للوصي')}}</p>
                <p class="fw-semibold">{{$orphan->guardian->guardian_national_id}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('صلة القرابة')}}</p>
                <p class="fw-semibold">  {{$orphan->guardian->guardian_relationship}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('سبب الوصاية')}}</p>
                <p class="fw-semibold">  {{$orphan->guardian->guardianship_reason}}</p>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد أفراد الأسرة')}}</p>
                <p class="fw-semibold">  {{$orphan->family->family_number}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد الذكور')}}</p>
                <p class="fw-semibold">  {{$orphan->family->male_number}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد الاناث')}}</p>
                <p class="fw-semibold">  {{$orphan->family->female_number}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('دخل الأسرة')}}</p>
                <p class="fw-semibold">  {{$orphan->family->income}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('مصدر الدخل')}}</p>
                <p class="fw-semibold">  {{$orphan->family->income_source}}</p>
            </div>
            
            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('المحافظة')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->governorate}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المدينة')}} </p>
                <p class="fw-semibold">  {{$orphan->profile->center}} </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('العنوان')}}  </p>
                <p class="fw-semibold">  {{$orphan->profile->full_address}} </p>
            </div>

            

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('نوع السكن')}}</p>
                <p class="fw-semibold"> {{$orphan->family->housing_type}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة السكن')}}</p>
                <p class="fw-semibold"> {{$orphan->family->housing_case}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('التعليم')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->academic_stage}} </p>
            </div>

            @if($orphan->profile && $orphan->profile->academic_stage_details)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('المرحلة الدراسية')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->academic_stage_details}} </p>
                </div>
            @endif

            @if($orphan->profile && $orphan->profile->academic_secondary_details)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('المرحلة الثانوية')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->academic_secondary_details}} </p>
                </div>
            @endif

            @if($orphan->profile && $orphan->profile->reason_not_registering)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('سبب عدم القيد')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->reason_not_registering}} </p>
                </div>
            @endif

            <hr>

            @if($orphan->profile && $orphan->profile->other_reason_not_registering)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('سبب عدم القيد')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->other_reason_not_registering}} </p>
                </div>
            @endif

            @if($orphan->profile && $orphan->profile->class)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('الصف')}}</p>
                    <p class="fw-semibold">  {{$orphan->profile->class}}</p>
                </div>
            @endif

            <hr>


            @foreach ($orphan->phones as $phone)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('رقم التليفون')}} {{ $loop->index + 1 }}</p>
                    <p class="fw-semibold"> {{$phone->phone_number}} </p>
                </div>


            @endforeach


            <hr>


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
                    {{ __('بطاقة الأم') }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                </a>
            </div>



            @if ($orphan->image->mother_death_certificate)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('شهادة وفاة الأم')}} </p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('شهادة وفاة الأم') }}.{{ pathinfo($orphan->image->mother_death_certificate, PATHINFO_EXTENSION) }}
                    </a>
                </div>

            @endif



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأب')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>
            <hr>

             <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__('شهادة الإفادة المدرسية')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->school_benefit)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' شهادة الإفادة المدرسية') }}.{{ pathinfo($orphan->image->school_benefit, PATHINFO_EXTENSION) }}
                </a>
            </div>

        


        </div>

    </div>

</x-main-layout>
