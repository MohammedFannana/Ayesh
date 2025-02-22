<x-main-layout>

    <h2 class="mb-5"> الداعمين </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <div class="intro d-flex justify-content-between align-items-center">
            <div class="count col-1">
                30 داعم
            </div>

            <div class="search mb-1 col-9">

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </span>
                    <input type="text" class="form-control" placeholder="البحث عن داعم"  aria-describedby="addon-wrapping">
                </div>

            </div>

            <div class="add-support col-2 d-flex justify-content-end">
                <button class="btn add-button ps-4 pe-4"> إضافة داعم </button>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col"> الاسم </th>
                    <th scope="col"> الدولة   </th>
                    <th scope="col"> الفاكس </th>
                    <th scope="col"> البريد الالكتروني </th>
                    <th scope="col"> الموقع الالكتروني </th>
                    <th scope="col"> Actions </th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <th scope="row">1</th>
                    <td>محمد احمد</td>
                    <td>شركة مريم</td>
                    <td>0594599056</td>
                    <td>mohammed@gmail.com</td>
                    <td>www.mariam.com</td>

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
                                <span style="color: var(--text-color);">ارسال رسالة</span>
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
