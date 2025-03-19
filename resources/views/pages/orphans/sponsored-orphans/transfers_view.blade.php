<x-main-layout>


    <h2 class="mb-4"> {{$orphan->name}}</h2>



    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <h4 class="title-color">{{__('قائمة التحويلات')}}</h4>

        <hr>

        <p class="text-center p-3  fw-semibold " style="background-color: #ECECEC; font-size:18px"> {{__('الرصيد الكلي ')}}<span class="title-color fs-5 fw-bold">{{ $expenseAmount }}</span> </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> {{__('المبلغ')}} </th>
                    <th scope="col" class="text-center"> {{__('صورة الايصال ')}}</th>
                    <th scope="col" class="text-end"> {{__('تاريخ التحويل ')}}</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($orphan->expenses as $expense)

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
