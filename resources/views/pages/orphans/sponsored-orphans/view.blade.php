<x-main-layout>


    <h2 class="mb-4"> {{$orphan->name}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> {{__('المعلومات الأساسية')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الكود الداخلي')}}</p>
                <p class="fw-semibold"> {{$orphan->internal_code}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الكود الخارجي')}}</p>
                <p class="fw-semibold"> {{$orphan->sponsorship->external_code}}</p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم اليتيم')}} </p>
                <p class="fw-semibold"> {{$orphan->name}}  </p>
            </div>

            {{-- @dd($orphan) --}}
            @if ($orphan->birth_date)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('تاريخ الميلاد')}} </p>
                    <p class="fw-semibold"> {{$orphan->birth_date}}  </p>

                </div>


            @endif


            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تم تقديمه ل')}}</p>
                <p class="fw-semibold"> {{translate_text($orphan->marketing->supporter->name)}}</p>
            </div>

            @if ($orphan->profile->mother_name)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__(' اسم الأم ')}}</p>
                    <p class="fw-semibold"> {{translate_text($orphan->profile->mother_name)}}</p>
                </div>
            @endif

            @if ($orphan->family && $orphan->family->family_number)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__(' عدد الأفراد ')}}</p>
                    <p class="fw-semibold"> {{$orphan->family->family_number}}</p>
                </div>
            @endif

            @if ($orphan->guardian->guardian_name)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__(' اسم الوصي ')}}</p>
                    <p class="fw-semibold"> {{translate_text($orphan->guardian->guardian_name)}}</p>
                </div>
            @endif

            <hr>


            @if ($orphan->guardian->guardian_national_id)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('الرقم القومي للوصي')}}</p>
                    <p class="fw-semibold"> {{translate_text($orphan->guardian->guardian_national_id)}}</p>
                </div>
            @endif

            @if ($orphan->Profile->governorate)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('المحافظة')}}</p>
                    <p class="fw-semibold"> {{translate_text($orphan->Profile->governorate)}}</p>
                </div>
            @endif


            @if ($orphan->phones[0]->phone_number)
                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('رقم التليفون')}}</p>
                    <p class="fw-semibold"> {{translate_text($orphan->phones[0]->phone_number)}}</p>
                </div>
            @endif

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> {{__('عرض كل التفاصيل')}}</a>
            </div>



        </div>


    </div>


    {{-- image and file --}}

    <div class="bg-white rounded shadow-sm p-3 mb-4">


        <div class="row">

            <p class="title mb-4"> {{__('الصور و الملفات')}}</p>



            @if ($orphan->image->birth_certificate)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('شهادة الميلاد')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('شهادة الميلاد') }}.{{ pathinfo($orphan->image->birth_certificate, PATHINFO_EXTENSION) }}                </a>
                </div>

            @endif


            @if ($orphan->image->mother_card)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title">   {{__('بطاقة الام')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_card)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('بطاقة الأم' ) }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                    </a>
                </div>

            @endif

            @if ($orphan->certified_orphan_extras?->father_card)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title">   {{__('بطاقة الأب')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->father_card)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('بطاقة الأب' ) }}.{{ pathinfo($orphan->certified_orphan_extras->father_card, PATHINFO_EXTENSION) }}
                    </a>
                </div>
            @endif


            @if ($orphan->image->father_death_certificate)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('شهادة وفاة الأب')}} </p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                    </a>
                </div>

            @endif



            <hr>



            @if ($orphan->certified_orphan_extras?->school_enrollment)

                <div class="flex flex-column col-4 mb-3">
                    <p class="title">{{__('شهادة التحاق بالمدرسة')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->school_enrollment)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('شهادة التحاق بالمدرسة'  ) }}.{{ pathinfo($orphan->certified_orphan_extras->school_enrollment, PATHINFO_EXTENSION) }}
                    </a>
                </div>
            @endif



            @if ($orphan->image->data_validation)

                <div class="flex flex-column col-4 mb-3">
                    <p class="title">{{__('إقرار بصحة البيانات')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->data_validation)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('إقرار بصحة البيانات' ) }}.{{ pathinfo($orphan->image->data_validation, PATHINFO_EXTENSION) }}
                    </a>
                </div>
            @endif


            @if ($orphan->image->agricultural_holding)

                <div class="flex flex-column col-4 mb-3">
                    <p class="title">{{__('حيازة زراعية')}}</p>
                    <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->agricultural_holding)])}}" type="button" class="text-decoration-none view-file w-100">
                        {{ __('حيازة زراعية' ) }}.{{ pathinfo($orphan->image->agricultural_holding, PATHINFO_EXTENSION) }}
                    </a>
                </div>
            @endif

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> {{__('عرض كل التفاصيل')}}</a>
            </div>



        </div>

    </div>


    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="title-color">{{__('قائمة التحويلات')}}</h4>
            <a href="{{route('orphan.transfer.show' , $orphan->id)}}" type="button" class="btn add-button "> {{__('عرض الكل')}}</a>
        </div>

        <hr>

        <p class="text-center p-3  fw-semibold " style="background-color: #ECECEC; font-size:18px">
            {{__('الرصيد الكلي')}} :
            <span class="title-color fs-5 fw-bold">
                {{$expenseAmount}}
            </span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> {{__('المبلغ')}} </th>
                    <th scope="col" class="text-center"> {{__('صورة الايصال')}}</th>
                    <th scope="col" class="text-end"> {{__('تاريخ التحويل')}}</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($expenses as $expense)

                    <tr>
                        <td scope="row" class="text-success">{{$expense->amount}}</td>
                        <td class="text-center">
                            <a href="{{route('orphan.image' , ['file' => encrypt($expense->payment_image)])}}" type="button" class="text-decoration-none title-color">
                                {{ __('وصل استلام المبلغ') }}.{{ pathinfo($expense->payment_image, PATHINFO_EXTENSION) }}
                            </a>
                        </td>
                        <td class="text-end"> {{$expense->payment_date}}</td>
                    </tr>

                @empty
                <tr>
                    <td colspan="3" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                        {{__('لا يوجد تحويلات لهذا اليتيم')}}
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>



    </div>



</x-main-layout>
