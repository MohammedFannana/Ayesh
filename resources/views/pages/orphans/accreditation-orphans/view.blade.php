<x-main-layout>

    <div class="d-flex justify-content-between  mb-4">

        <div>
            <h2 class="mb-4">{{__('يتيم جديد')}}</h2>
            <h4 class="title-color"> {{__('المعتمد')}} </h4>
        </div>

        <div class="d-flex flex-column gap-2">
            {!! QrCode::size(150)->generate(route('orphan.registered.details' , $orphan->id)) !!}
            <a href="{{route('orphan.registered.details' , $orphan->id)}}" class="add-button  text-decoration-none p-1 text-center" style="width:150px">{{__('تحميل الباركود')}}</a>
        </div>

    </div>



    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">

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
                <p class="title"> {{__('النوع')}} </p>
                <p class="fw-semibold"> {{$orphan->gender}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('السن')}} </p>
                <p class="fw-semibold"> {{$orphan->age}} {{__('سنوات')}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('نوع الحالة')}}</p>
                <p class="fw-semibold"> {{$orphan->case_type}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('الحالة الصحية لليتيم')}}</p>
                <p class="fw-semibold">  {{$orphan->health_status}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ وفاة الأب')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->father_death_date}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('يتيم الأبوين')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->parents_orphan}}  </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('تاريخ وفاة الأم')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->mother_death_date}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('اسم الأم')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->mother_name}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('هل تعمل الأم')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->mother_work}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة الأم')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->mother_status}}  </p>
            </div>

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
                <p class="title"> {{__('العنوان')}}  </p>
                <p class="fw-semibold">  {{$orphan->family->address}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('المحافظة')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->governorate}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المركز')}} </p>
                <p class="fw-semibold">  {{$orphan->profile->center}} </p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('نوع السكن')}}</p>
                <p class="fw-semibold"> {{$orphan->family->housing_type}}  </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('حالة السكن')}}</p>
                <p class="fw-semibold"> {{$orphan->family->housing_case}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('المرحلة الدراسية')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->academic_stage}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الصف')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->class}}</p>
            </div>

            <hr>


            @foreach ($orphan->phones as $phone)

                <div class="flex flex-column col-3 mb-3">
                    <p class="title"> {{__('رقم التليفون ')}} {{ $loop->index + 1 }}</p>
                    <p class="fw-semibold"> {{$phone->phone_number}} </p>
                </div>


            @endforeach


            <hr>

            <div class="flex flex-column  mb-3">

                <p class="title mb-1">{{__('البحث الميداني الداخلي')}}</p>
                <p class="title">{{$orphan->guardian->research_date}}</p>
                <p class="fw-semibold">  {{$orphan->guardian->internal_research}} </p>

            </div>


            <hr>

            <div class="flex flex-column  mb-3">

                <p class="title mb-1">{{__('ملاحظات')}} </p>
                <p class="fw-semibold">  {{$orphan->guardian->notes}} </p>

            </div>

            <hr>

            <div class="flex flex-column  mb-3">

                <p class="title mb-1">{{__('اليه معرفتكم بجمعية عايش')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->knowledge}} </p>

            </div>

            {{-- <hr> --}}

            {{-- <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.show' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> عرض أقل للتفاصيل </a>
            </div> --}}

        </div>


    </div>


    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">


        <div class="row">

            <p class="title mb-4">{{__(' الصور و الملفات')}}</p>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة الميلاد')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->birth_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة الميلاد') }}.{{ pathinfo($orphan->image->birth_certificate, PATHINFO_EXTENSION) }}                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأب')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->father_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأب') }}.{{ pathinfo($orphan->image->father_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('شهادة وفاة الأم اصل كمبيوتر')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_death_certificate)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('شهادة وفاة الأم') }}.{{ pathinfo($orphan->image->mother_death_certificate, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">   {{__('صورة من بطاقة الأم أو الوصي')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->mother_card)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('بطاقة الأم' ) }}.{{ pathinfo($orphan->image->mother_card, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('صورة اليتيم 4*6 جديدة')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->orphan_image_4_6)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('صورة اليتيم (4×6)') }}.{{ pathinfo($orphan->image->orphan_image_4_6, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('صورة اليتيم كاملة 9*12')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->orphan_image_9_12)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('صورة اليتيم (9×12)') }}.{{ pathinfo($orphan->image->orphan_image_9_12, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الافادة المدرسية')}}   </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->school_benefit)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('إفادة مدرسية') }}.{{ pathinfo($orphan->image->school_benefit, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">{{__('التقرير الطبي')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->medical_report)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('التقرير الطبي') }}.{{ pathinfo($orphan->image->medical_report, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('البحث الاجتماعى')}}</p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->social_research)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('البحث الاجتماعى') }}.{{ pathinfo($orphan->image->social_research, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('قرار وصاية')}} </p>
                <a href="{{route('orphan.image' , ['file' => encrypt($orphan->image->guardianship_decision)])}}" type="button" class="text-decoration-none view-file w-100">
                    {{ __('قرار وصاية') }}.{{ pathinfo($orphan->image->guardianship_decision, PATHINFO_EXTENSION) }}
                </a>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{('رقم التليفون')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->phone}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('العنوان بالكامل')}} </p>
                <p class="fw-semibold">  {{$orphan->profile->full_address}}</p>
            </div>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('اسم المستلم')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->recipient_name}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('اسم المسجل')}}</p>
                <p class="fw-semibold">  {{$orphan->profile->registrar_name}}</p>
            </div>

            <hr>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('اسم المراجع')}}</p>
                <p class="fw-semibold"> {{$review->name}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title">  {{__('تاريخ التسجيل')}}</p>
                <p class="fw-semibold"> {{$orphan->profile->registrar_date}}</p>
            </div>

            {{-- <hr> --}}

            {{-- <div class="d-flex justify-content-end">
                <a href="{{route('orphan.registered.show' , $orphan->id)}}" class="add-button pt-2 pb-2 text-decoration-none "> عرض أقل للتفاصيل </a>
            </div> --}}


        </div>

    </div>

    <div class="orphans-view bg-white rounded shadow-sm p-3 mb-4">

        <div>

            <div class="flex flex-column  mb-4">

                <p class="title mb-3"> {{__('تقرير المراجع')}}</p>
                <p class="fw-semibold"> {{$review->report}} </p>

            </div>

            <hr>

            @if ($review->status === 'rejected')

                <div class="flex flex-column  mb-4">

                    <p class="title mb-3"> {{__('أسباب الرفض')}}</p>
                    <p class="fw-semibold"> {{$review->rejected_reason}} </p>

                </div>

            @endif


            <hr>

            <form action="{{route('orphan.accreditation.store', $orphan->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-column  mb-4">
                    <p class="fw-semibold mb-1"> {{__('حالة الملف')}}</p>

                    <div class="d-flex gap-5" >

                        <div class="d-flex gap-1">
                            <input type="radio" name="status" id="rejected" value="rejected">
                            <label for="rejected"  class="title">{{__('الملف مرفوض')}}</label>
                        </div>

                        <div class="d-flex gap-1">
                            <input type="radio" name="status" id="approved" value="approved">
                            <label for="approved" class="title">{{__('قبول أولى للملف')}}</label>
                        </div>

                    </div>
                </div>

                <div class="mb-4">
                    <x-form.textarea name="report" label="{{__('تقرير المعتمد')}}"  placeholder=" {{__('اكتب تقرير المعتمد')}}"/>
                </div>

                <div class="mb-4 rejected_reason"  style="display: none">
                    <x-form.textarea label="{{__('سبب الرفض')}}" name="rejected_reason"  placeholder=" {{__('اكتب سبب الرفض')}}"/>
                </div>

                <div class="mb-4">
                    <x-form.input name="name" class="border" type="text" label=" {{__('اسم المعتمد')}}" autocomplete="" placeholder="أدخل اسم المعتمد "/>
                </div>

                <div class="d-grid gap-2 col-1 mx-auto">
                    <button  type="submit" class="btn add-button"> {{__('ارسال')}} </button>
                </div>

            </form>



        </div>

    </div>

    <script>
        // sript for rejected_reason
        document.addEventListener("DOMContentLoaded", function () {
            const rejectedRadio = document.getElementById("rejected");
            const approvedRadio = document.getElementById("approved");
            const rejectedReasonDiv = document.querySelector(".rejected_reason");


            function toggleRejectedReason() {
                if (rejectedRadio.checked) {
                    rejectedReasonDiv.style.display = "block";
                } else {
                    rejectedReasonDiv.style.display = "none";
                }
            }

            toggleRejectedReason();

            rejectedRadio.addEventListener("change", toggleRejectedReason);
            approvedRadio.addEventListener("change", toggleRejectedReason);
        });

    </script>

</x-main-layout>
