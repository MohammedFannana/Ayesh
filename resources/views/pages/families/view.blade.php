<x-main-layout>


    <h2 class="mb-4"> {{$family->name}} </h2>


    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> {{__('المعلومات الأساسية ')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('رقم الأسرة ')}} </p>
                <p class="fw-semibold"> {{$family->families_number}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('رقم الهيئة ')}}</p>
                <p class="fw-semibold"> {{$family->authority_number}} </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم الهيئة ')}} </p>
                <p class="fw-semibold"> {{$family->authority_name}} </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الدولة')}}  </p>
                <p class="fw-semibold"> {{$family->country}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المدينة')}}  </p>
                <p class="fw-semibold"> {{$family->city}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة (الأب, الأم)')}}  </p>
                <p class="fw-semibold"> {{$family->parents_status}} </p>
            </div>

        </div>


    </div>


    {{--  Relevant person data --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4">  {{__('بيانات صاحب العلاقة ')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الجنسية')}} </p>
                <p class="fw-semibold"> {{$family->nationality}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ الميلاد ')}}</p>
                <p class="fw-semibold"> {{$family->birth_date}} </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الحالة الاجتماعية ')}} </p>
                <p class="fw-semibold">   {{$family->marital_status}}  </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد أفراد العائلة ')}} </p>
                <p class="fw-semibold"> {{$family->family_number}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد الابناء ')}}  </p>
                <p class="fw-semibold"> {{$family->family_male_number}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('عدد البنات ')}}  </p>
                <p class="fw-semibold"> {{$family->family_female_number}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الدخل الشهري ')}}  </p>
                <p class="fw-semibold"> {{$family->income}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('مصدر الدخل ')}}</p>
                <p class="fw-semibold"> {{$family->income_source}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الإعانات الاخرى و قدرها')}}</p>
                <p class="fw-semibold"> {{$family->subsidies}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة الأسرة المادية ')}}  </p>
                <p class="fw-semibold"> {{$family->financial_status}} </p>
            </div>

        </div>


    </div>

    {{--  families --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4">  {{__('مكان اقامة الأسرة ')}} </p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الولادة')}} </p>
                <p class="fw-semibold"> {{$family->birth}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المدينة')}} </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->family_city}} </p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('المديرية')}}  </p>
                <p class="fw-semibold">   {{$family->first_line_familie_profile->family_directorate}}  </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('القرية')}}  </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->family_village}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الحي')}}  </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->family_neighborhood}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('أقرب معلم ')}} </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->landmark}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('وضع السكن ')}}</p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->housing_status}} </p>
            </div>

        </div>
    </div>


    {{--  search_status --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4">  {{__('بحث الحالة ')}}</p>

            <div class="flex flex-column col-12 mb-3">
                <p class="title"> {{__('بحث حالة الأسرة ')}}</p>
                <p class="fw-semibold">
                    {{$family->first_line_familie_profile->search_status}}
                </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم الباحث ')}}</p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->researcher_name}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  التوقيع ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($family->first_line_familie_profile->signature)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' صورة التوقيع ' ) }}.{{ pathinfo($family->first_line_familie_profile->signature, PATHINFO_EXTENSION) }}
                </a>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('رقم الهاتف ')}}  </p>
                <p class="fw-semibold">   {{$family->first_line_familie_profile->phone}}  </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  المستندات الثبوتية  ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($family->first_line_familie_profile->supporting_documents)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' صورة المستندات ' ) }}.{{ pathinfo($family->first_line_familie_profile->supporting_documents, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم مسؤول الهيئة ')}}  </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->authority_official}} </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  التوقيع ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($family->first_line_familie_profile->authority_official_signature)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' صورة التوقيع ' ) }}.{{ pathinfo($family->first_line_familie_profile->authority_official_signature, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  شهادة الميلاد اصل كمبيوتر  ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($family->first_line_familie_profile->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' صورة شهادة الميلاد  ' ) }}.{{ pathinfo($family->first_line_familie_profile->birth_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  شهادة الوفاة اصل كمبيوتر  ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($family->first_line_familie_profile->death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' صورة شهادة الوفاة  ' ) }}.{{ pathinfo($family->first_line_familie_profile->death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>


            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('التاريخ')}}  </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->date}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('رقم الكافل ')}}  </p>
                <p class="fw-semibold"> {{$family->first_line_familie_profile->sponsor_number}} </p>
            </div>


        </div>
    </div>


</x-main-layout>
