<x-main-layout>


    <h2 class="mb-4"> {{$orphan->name}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- basic information --}}
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="row">

            <p class="title mb-4"> {{__('المعلومات الأساسية ')}}</p>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الكود الداخلي')}}</p>
                <p class="fw-semibold"> {{$orphan->internal_code}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الكود الخارجي')}}</p>
                <p class="fw-semibold"> {{$orphan->sponsorship->external_code}}</p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الدولة')}} </p>
                <p class="fw-semibold"> {{$orphan->certified_orphan_extras->country}}  </p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المدينة')}}  </p>
                <p class="fw-semibold"> {{$orphan->certified_orphan_extras->city}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('استمارة التسجيل ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->application_form)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ basename($orphan->application_form) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تم تقديمه ل ')}}</p>
                <p class="fw-semibold"> {{$orphan->marketing->donor->name}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المتطوع المسؤول ')}}</p>
                <p class="fw-semibold"> {{$orphan->certified_orphan_extras->volunteer->name}}</p>
            </div>



            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المانح المسؤول')}}</p>
                <p class="fw-semibold"> {{$orphan->certified_orphan_extras->donor->name}}</p>
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
                <p class="title"> {{__('وصف حالة اليتيم ')}}</p>
                <p class="fw-semibold"> {{$orphan->certified_orphan_extras->description_orphan_condition}}  </p>
            </div>


        </div>


    </div>


    {{-- image and file --}}

    <div class="bg-white rounded shadow-sm p-3 mb-4">


        <div class="row">

            <p class="title mb-4"> {{__('الصور و الملفات ')}}</p>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة الميلاد ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة الميلاد') }}.{{ pathinfo($orphan->image->birth_certificate, PATHINFO_EXTENSION) }}                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  بطاقة الام  ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' بطاقة الأم' ) }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                </a>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('  بطاقة الأب  ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->father_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' بطاقة الأب' ) }}.{{ pathinfo($orphan->certified_orphan_extras->father_card, PATHINFO_EXTENSION) }}
                </a>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأم ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأم') }}.{{ pathinfo($orphan->image->mother_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>



            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأب ')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__(' شهادة التحاق بالمدرسة')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->school_enrollment)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' شهادة التحاق بالمدرسة  '  ) }}.{{ pathinfo($orphan->certified_orphan_extras->school_enrollment, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-4 mb-3">
                <p class="title">{{__(' كارت تأمين صحي مدرسي ')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->certified_orphan_extras->health_insurance)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __(' كارت تأمين صحي مدرسي ' ) }}.{{ pathinfo($orphan->certified_orphan_extras->health_insurance, PATHINFO_EXTENSION) }}
                </a>
            </div>


        </div>

    </div>


    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="title-color">{{__('قائمة التحويلات')}}</h4>
            <a href="{{route('orphan.transfer.show' , $orphan->id)}}" type="button" class="btn add-button "> {{__('عرض الكل ')}}</a>
        </div>

        <hr>

        <p class="text-center p-3  fw-semibold " style="background-color: #ECECEC; font-size:18px"> الرصيد الكلي
            <span class="title-color fs-5 fw-bold">
                {{$expenseAmount}}
            </span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> {{__('المبلغ')}} </th>
                    <th scope="col" class="text-center"> {{__('صورة الايصال ')}}</th>
                    <th scope="col" class="text-end"> {{__('تاريخ التحويل ')}}</th>

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
