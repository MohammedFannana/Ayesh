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
                <p class="text-white fw-semibold fs-4 mb-1"> {{$balanceAmount}}</p>
                <p class="text-white fs-5 mb-1"> {{__('الشهر الأخير ')}}</p>
            </div>

        </div>

        {{-- Expenses --}}
        <div class="d-flex align-items-center gap-4  rounded p-2" style="background-color:#FF001E;width:48% ">

            <img src="{{asset('image/money1.png')}}" alt="" width="38px" height="38px">

            <div>
                <p class="text-white fs-5 mb-1"> {{__('المصاريف')}} </p>
                <p class="text-white fw-semibold fs-4 mb-1"> {{$expenseAmount}} </p>
                <p class="text-white fs-5 mb-1"> {{__('الشهر الأخير ')}}</p>
            </div>
        </div>

    </div>

    {{-- content --}}
    <div class="bg-white rounded p-3 shadow">

        {{-- buttons --}}
        <div class="row justify-content-between p-3 mb-3" >
            <a href="{{route('balance.index')}}" class="btn col-4 fw-semibold" style="background-color: #D8ECD4"> {{__('المقبوضات')}} </a>
            <a href="{{route('expenses.index')}}" class="btn col-4  title" style="background-color: #F4F4F4"> {{__('المدفوعات')}} </a>
            <a href="{{route('balance.create')}}" class="btn add-button col-2" type="button"> {{__('إضافة مبلغ ')}}</a>
        </div>

        {{-- search --}}
        <form action="{{route('balance.index')}}" method="get" class="search mb-3 w-100">

            <div class="input-group flex-nowrap">
                <button type="submit" class="input-group-text" id="addon-wrapping">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </button>
                <input type="text" name="search" class="form-control" placeholder="البحث عن منتفع"  aria-describedby="addon-wrapping">
            </div>

        </form>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> {{__('رقم الداعم ')}}</th>
                    <th scope="col"> {{__('اسم الداعم ')}}</th>
                    <th scope="col"> {{__('المبلغ')}} </th>
                    <th scope="col" class="text-center">  {{__('الملفات المرفقة ')}}</th>
                    <th scope="col"> {{__('الاجراء')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($balances as $balance)

                    <tr>
                        <td scope="row">{{$balance->donor->id}}</td>
                        <td> {{$balance->donor->name}} </td>
                        <td class="title-color"> {{$balance->amount}} </td>
                        <td class="text-center">
                            <a href="{{route('orphan.image' , ['file' => encrypt($balance->payment_image)])}}" type="button" class="text-decoration-none view-file w-100">
                                {{ __('وصل استلام المبلغ') }}.{{ pathinfo($balance->payment_image, PATHINFO_EXTENSION) }}
                            </a>
                        </td>
                        <td>

                            <form action="{{route('balance.destroy' , $balance->id)}}" method="post" style="margin-right: -5px">
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
                        <td colspan="5" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{__('لا يوجد مبالغ مقبوضة')}}
                        </td>
                    </tr>

                @endforelse



            </tbody>

        </table>

    </div>


</x-main-layout>
