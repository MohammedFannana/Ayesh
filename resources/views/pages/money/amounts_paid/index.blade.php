<x-main-layout>

    <h2 class="mb-4"> الدفع </h2>

    {{-- Statistics --}}
    <div class="d-flex justify-content-between mb-4">

        {{-- Balance --}}
        <div class="d-flex align-items-center gap-4 rounded p-2" style="background-color:var(--title-color); width:48%">

            <img src="{{asset('image/money.png')}}" alt="" width="38px" height="38px">

            <div>
                <p class="text-white fs-5 mb-1"> الرصيد </p>
                <p class="text-white fw-semibold fs-4 mb-1"> 2000$ </p>
                <p class="text-white fs-5 mb-1"> الشهر الأخير </p>
            </div>

        </div>

        {{-- Expenses --}}
        <div class="d-flex align-items-center gap-4  rounded p-2" style="background-color:#FF001E;width:48% ">

            <img src="{{asset('image/money1.png')}}" alt="" width="38px" height="38px">

            <div>
                <p class="text-white fs-5 mb-1"> المصاريف </p>
                <p class="text-white fw-semibold fs-4 mb-1"> 250$ </p>
                <p class="text-white fs-5 mb-1"> الشهر الأخير </p>
            </div>
        </div>

    </div>

    {{-- content --}}
    <div class="bg-white rounded p-3 shadow">

        {{-- buttons --}}
        <div class="row justify-content-between p-3 mb-3" >
            <a href="" class="btn col-4 title" style="background-color: #F4F4F4"> المقبوضات </a>
            <a href="" class="btn col-4 fw-semibold" style="background-color:#D8ECD4"> المدفوعات </a>
            <a href="" class="btn add-button col-2" type="button"> إضافة منتفع </a>
        </div>

        {{-- search --}}
        <div class="search mb-3 w-100">

            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </span>
                <input type="text" class="form-control" placeholder="البحث عن منتفع"  aria-describedby="addon-wrapping">
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> رقم المنتفع </th>
                    <th scope="col"> اسم المنتفع </th>
                    <th scope="col"> المبلغ </th>
                    <th scope="col" class="text-center">  الملفات المرفقة </th>
                    <th scope="col"> الاجراء </th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td scope="row">1</ف>
                    <td>محمد احمد</td>
                    <td class="text-danger"> -200$ </td>
                    <td class="text-center"> وصل استلام المبلغ.pdf  </td>
                    <td>

                        <form action="" method="post" style="margin-right: -5px">
                            @csrf
                            @method('delete')
                            <button class="submit border-0 bg-transparent">
                                <img src="{{asset('image/Delete.svg')}}" alt="">
                            </button>
                        </form>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>


</x-main-layout>
