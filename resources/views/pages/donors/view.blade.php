<x-main-layout>

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4"> {{__($donor->name)}} </h2>
        {{-- <div class="mb-4">
            <a href="" class="btn add-button"> تعديل </a>
        </div> --}}
    </div>

    <div class="donors bg-white rounded shadow-sm p-3 mb-4">

        <div class="supporters-view row">

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الموقع الالكتروني')}}  </p>
                <p class="fw-semibold">{{$donor->website}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الدولة')}}</p>
                <p class="fw-semibold">  {{$donor->country}} </p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('رقم الجوال')}}</p>
                <p class="fw-semibold">{{$donor->phone}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('الفاكس')}} </p>
                <p class="fw-semibold">{{$donor->fax}}</p>
            </div>

            <hr>


            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('البريد الالكتروني')}} </p>
                <p class="fw-semibold">{{$donor->email}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__('العنوان')}} </p>
                <p class="fw-semibold"> {{$donor->address}} </p>
            </div>

        </div>


    </div>

    <div class="payment-details bg-white rounded shadow-sm p-3 mb-4">

        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-3 fs-5 fw-semibold title-color"> {{__('الكشوفات الواردة')}} </p>
            <div class="mb-2">
                <a href="{{route('donor.income.statement' ,$donor->id)}}" class="btn add-button"> {{__('عرض الكل ')}}</a>
            </div>
        </div>

        <hr>

        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> {{__('رقم أمر الصرف ')}}</th>
                    <th scope="col"> {{__('التاريخ')}} </th>
                    <th scope="col" class="w-25"> {{__('صورة الاستلام ')}}  </th>
                </tr>

            </thead>

            <tbody>

                {{-- @forelse ($donor_balances as $balance)

                    <tr>
                        <th scope="row" class="title-color"> {{$balance->amount}} </th>
                        <td> {{$balance->payment_date}} </td>
                        <td>
                            <a href="{{route('orphan.image' , ['file' => encrypt($balance->payment_image)])}}" type="button" class="text-decoration-none text-dark w-100">
                                {{ __('  صورة استلام المبلغ ') }}.{{ pathinfo($balance->payment_image, PATHINFO_EXTENSION) }}
                            </a>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <th colspan="3" class="text-danger text-center"> لا يوجد كشوفات واردة </th>
                    </tr>

                @endforelse --}}


            </tbody>

        </table>

    </div>

    <div class="case-list bg-white rounded shadow-sm p-3 mb-4">

        <div class="intro d-flex justify-content-between align-items-center">
            <div class="col-2 fs-5 fw-semibold title-color">
                {{__('قائمة المكفولين')}}
            </div>

            <form action="{{route('donor.show' , $donor->id)}}" method="GET" class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="sponsored_name" class="form-control" placeholder="البحث عن يتيم"  aria-describedby="addon-wrapping">
                </div>

            </form>

            <div class="add-support col-3 d-flex justify-content-end">
                <a href="{{route('donor.list.sponsored' , $donor->id)}}" class="btn add-button ps-4 pe-4"> {{__('عرض الكل ')}}</a>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col">{{__('الكود الداخلي')}}</th>
                    <th scope="col"> {{__('الكود الخارجي ')}}</th>
                    <th scope="col"> {{__('الاسم')}}</th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col">  {{__('اجمالي المدفوع ')}}</th>
                    <th scope="col"> {{__('الاجراء')}} </th>

                </tr>

            </thead>

            <tbody>

                {{-- @forelse ($orphans as $orphan)

                    @foreach ($orphan->expenses->take(1) as $expense)

                        <tr>
                            <th scope="row"> {{$orphan->internal_code}} </th>
                            <td> {{$orphan->sponsorship->external_code}} </td>
                            <td> {{$orphan->name}} </td>
                            <td> {{$orphan->profile->phone}} </td>
                            <td> {{$expense->amount}} </td>

                            <td style="position: relative;">

                                <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                                <div class="action" style="left: -50px">
                                    <a href="{{route('orphan.sponsored.show' ,$orphan->id)}}" class="text-decoration-none">
                                        <img src="{{asset('image/Show.svg')}}" alt="">
                                        <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                    </a>

                                    <br>
                                    <a href="" class="text-decoration-none">
                                        <img src="{{asset('image/Message.svg')}}" alt="">
                                        <span style="color: var(--text-color);"> {{__('مراسلة الجمعية')}} </span>
                                    </a>


                                    <form action="{{route('expenses.destroy' , $expense->id)}}" method="post" style="margin-right: -5px">
                                        @csrf
                                        @method('delete')
                                        <button class="submit border-0 bg-transparent">
                                            <img src="{{asset('image/Delete.svg')}}" alt="">
                                            <span style="color: var(--text-color);">{{__(' حذف ')}}</span>
                                        </button>
                                    </form>
                                </div>

                            </td>

                        </tr>

                    @endforeach


                @empty

                    <tr>
                        <th colspan="6" class="text-center text-danger">
                            لا يوجد مكفولين
                        </th>
                    </tr>

                @endforelse --}}


            </tbody>

        </table>



    </div>

</x-main-layout>
