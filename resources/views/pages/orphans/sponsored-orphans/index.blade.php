<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين</h2>

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex row  align-items-center">

            {{-- title and count --}}
            <div class="col-3">
                <p class="title-color fs-5 fw-semibold mb-1"> الحالات المكفولة</p>
                <p class="count"> 30 حالة  </p>
            </div>

            {{-- search --}}
            <div class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </span>
                    <input type="text" class="form-control" placeholder="البحث عن اليتيم"  aria-describedby="addon-wrapping">
                </div>

            </div>

            {{-- filter --}}
            <div style="position: relative;" class="filter col-2">

                <div class="show-action ">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">فلتر</span>
                </div>

                <div class="action">
                    <form action="">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count">يتيم الأبوين</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> مريض مزمن</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> الحالات الخاصة</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> قريب السن</label>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <hr>

        {{-- <div class="table-responsive"> --}}

        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> الكود الداخلي </th>
                    <th scope="col"> الكود الخارجي </th>
                    <th scope="col"> الاسم </th>
                    <th scope="col"> مقدم ل</th>
                    <th scope="col"> الهاتف </th>
                    <th scope="col"> الاجراء </th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td scope="row">1</ف>
                    <td>1</td>
                    <td>محمد احمد</td>
                    <td> جمعية دار البر </td>
                    <td> 0595565652  </td>
                    <td style="position: relative;">

                        <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                        <div class="action" style="left: -50px">
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('image/Show.svg')}}" alt="">
                                <span style="color: var(--text-color);">مشاهدة التفاصيل</span>
                            </a>

                            <br>
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('image/transfers.svg')}}" alt="">
                                <span style="color: var(--text-color);"> قائمة التحولات </span>
                            </a>

                            <br>
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('image/archived.png')}}" alt="">
                                <span style="color: var(--text-color);"> اضافة للأرشفة </span>
                            </a>

                            <form action="" method="post" style="margin-right: -5px">
                                @csrf
                                @method('delete')
                                <button class="submit border-0 bg-transparent">
                                    <img src="{{asset('image/Delete.svg')}}" alt="">
                                    <span style="color: var(--text-color);">حذف</span>
                                </button>
                            </form>
                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

        {{-- </div> --}}

    </div>

</x-main-layout>
