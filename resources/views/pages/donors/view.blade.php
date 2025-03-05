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
                <p class="title"> {{__('الموقع الالكتروني ')}}  </p>
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
                <p class="title"> {{__('البريد الالكتروني ')}} </p>
                <p class="fw-semibold">{{$donor->email}}</p>
            </div>

            <div class="flex flex-column col-3 mb-3">
                <p class="title"> {{__(' العنوان ')}} </p>
                <p class="fw-semibold"> {{$donor->address}} </p>
            </div>

        </div>


    </div>

    <div class="payment-details bg-white rounded shadow-sm p-3 mb-4">

        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-3 fs-5 fw-semibold title-color"> تفاصيل الدفع </p>
            <div class="mb-2">
                <a href="" class="btn add-button"> عرض الكل </a>
            </div>
        </div>

        <hr>

        <table class="table">
            <thead>

                <tr>
                    <th scope="col">رقم أمر الصرف</th>
                    <th scope="col"> التاريخ </th>
                    <th scope="col" class="w-25"> صورة الاستلام   </th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <th scope="row" class="title-color">+200$</th>
                    <td> 2 مارس -2025</td>
                    <td> صورة استلام المبلغ.pdf</td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="case-list bg-white rounded shadow-sm p-3 mb-4">

        <div class="intro d-flex justify-content-between align-items-center">
            <div class="col-2 fs-5 fw-semibold title-color">
                قائمة الحالات
            </div>

            <div class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </span>
                    <input type="text" class="form-control" placeholder="البحث عن يتيم"  aria-describedby="addon-wrapping">
                </div>

            </div>

            <div class="add-support col-3 d-flex justify-content-end">
                <button class="btn add-button ps-4 pe-4"> عرض الكل </button>
            </div>

        </div>

        <hr>

        <div class="table-responsive">

            <table class="table">
                <thead>

                    <tr>
                        <th scope="col">الكود الداخلي</th>
                        <th scope="col"> الكود الخارجي </th>
                        <th scope="col"> الاسم</th>
                        <th scope="col"> الهاتف </th>
                        <th scope="col">  اجمالي المدفوع </th>
                        <th scope="col"> الاجراء </th>

                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <th scope="row">#1</th>
                        <td>#2</td>
                        <td>محمد أحمد</td>
                        <td>0594599056</td>
                        <td>+200$</td>
                        <td>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">مشاهدة التفاصيل</span>
                                </a>

                                <form action="" method="post" style="margin-right: -5px">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);">حذف</span>
                                    </button>
                                </form>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


    </div>

</x-main-layout>
