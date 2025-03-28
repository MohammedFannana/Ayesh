<x-main-layout>

    <h2 class="mb-4"> {{__('لوحة التحكم')}} </h2>

    <div class="row justify-content-between">

        <div class="col-12 col-md-5 bg-white p-3 border rounded">

            <div class="d-flex gap-2">

                <img src="{{asset('image/dashboard-icon/orphan.png')}}" alt="" width="58px" height="58px">

                <div>
                    <p class="mb-1 fs-5 fw-semibold title-color">{{__('عدد الأيتام الكلي')}}</p>
                    <p class="fw-semibold">{{$orphan_count}} {{__('يتيم')}}</p>

                </div>

            </div>
            <hr>

            <div class="d-flex ps-4">
                <p class="w-75 ">{{__('عدد الأيتام الجدد')}}</p>
                {{$orphan_registered_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 "> {{__('عدد الأيتام قيد المراجعة')}}</p>
                {{$orphan_under_review_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 "> {{__('عدد الأيتام قيد الاعتماد')}}</p>
                {{$orphan_approved_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 "> {{__('عدد الأيتام المقدمة للتسويق')}}</p>
                {{$orphan_marketing_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 "> {{__('عدد الأيتام بانتظار الرد')}}</p>
                {{$orphan_waiting_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 "> {{__('عدد الأيتام المكفولة')}}</p>
                {{$orphan_sponsored_count}}
            </div>

            <div class="d-flex ps-4">
                <p class="w-75 ">  {{__('عدد الأيتام المؤرشفة')}} </p>
                {{$orphan_archived_count}}
            </div>

        </div>

        <div class="col-12 col-md-6">

            <div class="row justify-content-between">

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/supporter.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$supporter_count}}</p>
                        <p> {{__('عدد الداعمين')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/doner.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$donor_count}}</p>
                        <p> {{__('عدد المتبرعين')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/families.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$first_line_family_count}}</p>
                        <p> {{__('عدد الأسر الأولى بالرعاية')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/volunteer.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$volunteer_count}}</p>
                        <p> {{__('عدد المتطوعين')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/file.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$file_count}}</p>
                        <p>{{__('عدد الملفات')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/report.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$report_count}}</p>
                        <p> {{__('عدد التقارير')}}</p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/money.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$balance_amount}}</p>
                        <p> {{__('الرصيد')}} </p>
                    </div>

                </div>

                <div class="col-12 col-md-5 bg-white border p-2 rounded d-flex gap-2 mb-3" style="height: 115px">

                    <img src="{{asset('image/dashboard-icon/Frame.png')}}" alt="" width="58px" height="58px">

                    <div>
                        <p class="fw-semibold fs-5 mb-1">{{$expense_amount}}</p>
                        <p> {{__('المصاريف')}}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-main-layout>
