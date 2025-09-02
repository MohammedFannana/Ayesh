<x-main-layout>

    <h2 class="mb-4"> {{__('الدفع')}} </h2>

    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- Statistics --}}
    <div class="d-flex justify-content-between mb-4">

        {{-- Balance --}}
        <div class="d-flex align-items-center gap-4 rounded p-2" style="background-color:var(--title-color); width:48%">

            <img src="{{asset('image/money.png')}}" alt="" width="38px" height="38px">

            <div>
                <p class="text-white fs-5 mb-1"> {{__('الرصيد')}} </p>
                <p class="text-white fw-semibold fs-4 mb-1"> {{$balanceAmount}} </p>
                {{-- <p class="text-white fs-5 mb-1"> {{__('الشهر الأخير')}}</p> --}}
            </div>

        </div>

        {{-- Expenses --}}
        <div class="d-flex align-items-center gap-4  rounded p-2" style="background-color:#FF001E;width:48% ">

            <img src="{{asset('image/money1.png')}}" alt="" width="38px" height="38px">

            <div>
                <p class="text-white fs-5 mb-1"> {{__('المصاريف')}} </p>
                <p class="text-white fw-semibold fs-4 mb-1"> {{$expenseAmount}} </p>
                {{-- <p class="text-white fs-5 mb-1"> {{__('الشهر الأخير ')}}</p> --}}
            </div>
        </div>

    </div>

    {{-- content --}}
    <div class="bg-white rounded p-3 shadow">

        {{-- buttons --}}
        <div class="row justify-content-between p-3 mb-3" >

            <a href="{{route('balance.index')}}" class="btn col-4 title" style="background-color: #F4F4F4"> {{__('المقبوضات')}} </a>
            <a href="{{route('expenses.index')}}" class="btn col-4 fw-semibold" style="background-color:#D8ECD4"> {{__('المدفوعات')}} </a>
            <a href="{{route('expenses.create')}}" class="btn add-button col-2" type="button"> {{__('إضافة مبلغ')}}</a>
        </div>

        {{-- search --}}
        <form action="{{route('expenses.index')}}" method="get" class="search mb-3 w-100">

            <div class="input-group flex-nowrap">
                <button type="submit" class="input-group-text" id="addon-wrapping">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </button>
                <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن منتفع')}}"  aria-describedby="addon-wrapping">
            </div>

        </form>

        <hr>


        <div class="table-responsive">

            <table class="table">
                <thead>

                    <tr>
                        <th scope="col"> {{__(' الكود الداخلي ')}}</th>
                        <th scope="col"> {{__('اسم اليتيم')}}</th>
                        <th scope="col"> {{__('الكود الخارجي')}} </th>
                        <th scope="col"> {{__('رقم الفيزا')}} </th>
                        <th scope="col"> {{__('اسم البنك')}} </th>
                        <th scope="col"> {{__('اسم الوصي')}} </th>
                        <th scope="col"> {{__('الرقم القومي')}} </th>
                        <th scope="col"> {{__('عدد الأيتام')}} </th>
                        <th scope="col"> {{__('عدد الأشهر')}} </th>
                        <th scope="col"> {{__('المحصل')}} </th>
                        <th scope="col"> {{__('النسبة الادارية')}} </th>
                        <th scope="col"> {{__('صافي الاجمالي')}} </th>
                        <th scope="col"> {{__('الكفالة الشهرية')}} </th>
                        <th scope="col"> {{__('بداية الكفالة')}} </th>
                        <th scope="col"> {{__('نهاية الكفالة')}} </th>
                        <th scope="col"> {{__('الاجراءات')}} </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($expenses as $expense)

                        <tr>
                            <td>{{$expense->internal_code}}</td>
                            <td>{{$expense->orphan}}</td>
                            <td>{{$expense->external_code}}</td>
                            <td>{{$expense->visa_number}}</td>
                            <td>{{$expense->bank_name}}</td>
                            <td>{{$expense->guardian_name}}</td>
                            <td>{{$expense->guardian_national_id}}</td>
                            <td>{{$expense->orphan_number}}</td>
                            <td>{{$expense->month_number}}</td>
                            <td>{{$expense->total}}</td>
                            <td>{{$expense->administrative_ratio}}</td>
                            <td>{{$expense->net_amount}}</td>
                            <td>{{$expense->orphan_paid_monthly}}</td>
                            <td>{{$expense->start_date}}</td>
                            <td>{{$expense->end_date}}</td>
                            <td>

                                <form action="{{route('expenses.destroy' , $expense->id)}}" method="post" style="margin-right: -5px">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                    </button>
                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="16" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                                {{__('لا يوجد مبالغ مدفوعة')}}
                            </td>
                        </tr>

                    @endforelse



                </tbody>

            </table>

        </div>

    </div>


</x-main-layout>
