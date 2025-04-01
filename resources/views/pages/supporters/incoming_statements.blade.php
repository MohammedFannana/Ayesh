<x-main-layout>

    <h2 class="mb-4"> {{translate_text($supporter_name)}}</h2>

    <div class="payment-details bg-white rounded shadow-sm p-3 mb-4">

        <p class="mb-3 fs-5 fw-semibold title-color"> {{__('الكشوفات الواردة')}} </p>

        <hr>

        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> {{__('رقم أمر الصرف')}}</th>
                    <th scope="col"> {{__('التاريخ')}} </th>
                    <th scope="col" class="w-25"> {{__('صورة الاستلام')}}  </th>
                </tr>

            </thead>

            <tbody>


                @forelse ($supporter_balances as $balance)

                    <tr>
                        <th scope="row" class="title-color"> {{$balance->amount}} </th>
                        <td> {{$balance->payment_date}} </td>
                        <td>
                            <a href="{{route('orphan.image' , ['file' => encrypt($balance->payment_image)])}}" type="button" class="text-decoration-none text-dark w-100">
                                {{ __('صورة استلام المبلغ') }}.{{ pathinfo($balance->payment_image, PATHINFO_EXTENSION) }}
                            </a>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <th colspan="3" class="text-danger text-center"> لا يوجد كشوفات واردة </th>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-main-layout>
