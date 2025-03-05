<x-main-layout>

    <h2 class="mb-4"> الأيتام المقدمين</h2>

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex justify-content-between align-items-center">

            {{-- title and count --}}
            <div>
                <p class="title-color fs-5 fw-semibold mb-1">  الأسر الأولى بالرعاية </p>
                <p class="count">30 أسرة</p>
            </div>

            {{-- search --}}
            <div class="search mb-1 w-50">

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </span>
                    <input type="text" class="form-control" placeholder="البحث عن الأسرة"  aria-describedby="addon-wrapping">
                </div>

            </div>

            {{-- filter --}}
            <div style="position: relative;">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">فلتر</span>
                </div>

                <div class="action">
                    <form action="">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> مطلقة </label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> أرملة </label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> سجين </label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> مريض </label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" name="filter" id="">
                            <label for="" class="count"> فقير </label>
                        </div>

                    </form>
                </div>

            </div>

            {{-- button --}}
            <div class="add-support">
                <button class="btn add-button ps-4 pe-4">  اضافة أسرة  </button>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> رقم الأسرة </th>
                    <th scope="col"> رقم الهيئة </th>
                    <th scope="col"> الاسم </th>
                    <th scope="col">  حالة (الأب , الأم) </th>
                    <th scope="col"> الهاتف </th>
                    <th scope="col"> الاجراء </th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td scope="row">1</ف>
                    <td>1</td>
                    <td>محمد احمد</td>
                    <td> فقير  </td>
                    <td> 0594599056 </td>
                   <td style="position: relative;">

                        <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                        <div class="action" style="left: -50px">
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('image/Show.svg')}}" alt="">
                                <span style="color: var(--text-color);">مشاهدة التفاصيل</span>
                            </a>

                            <br>
                            <a href="" class="text-decoration-none">
                                <img src="{{asset('image/Message.svg')}}" alt="">
                                <span style="color: var(--text-color);">مراسلة الجمعية</span>
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


    </div>

</x-main-layout>

