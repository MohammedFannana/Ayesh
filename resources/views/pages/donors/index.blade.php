<x-main-layout>

    <h2 class="mb-4"> {{__('المتبرعين')}} </h2>

    <x-alert name="success" />

    <div class="doners bg-white rounded shadow-sm p-3">

        <div class="intro d-flex row justify-content-between align-items-center">

            <div class="count col-2">
                {{$count}} {{__('متبرع')}}
            </div>

            <form method="get" action="{{route('donor.index')}}" class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </button>
                    <input type="text"  name="search"  class="form-control" placeholder="{{__('البحث عن متبرع')}}"  aria-describedby="addon-wrapping">
                </div>

            </form>

            <div class="add-support col-3 d-flex justify-content-end">
                <a href="{{route('donor.create')}}" class="btn add-button ps-4 pe-4"> {{__('إضافة متبرع')}}</a>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> {{__('الرقم')}} </th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('الدولة')}} </th>
                    <th scope="col"> {{__('الفاكس')}} </th>
                    <th scope="col"> {{__('البريد الالكتروني')}}</th>
                    <th scope="col"> {{__('الموقع الالكتروني')}} </th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($donors as $donor)

                    <tr>
                        <th scope="row"> {{$donor->id}} </th>
                        <td> {{__($donor->name)}} </td>
                        <td>{{__($donor->country)}} </td>
                        <td>{{__($donor->fax)}}</td>
                        <td>{{__($donor->email)}}</td>
                        <td>{{__($donor->website)}}</td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px">
                                <a href="{{route('donor.show' , $donor->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('مشاهدة التفاصيل')}} </span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('ارسال مراسلة')}} </span>
                                </a>

                                <form action="{{route('donor.destroy' , $donor->id)}}" method="post" style="margin-right: -5px">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);"> {{__('حذف')}} </span>
                                    </button>
                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{__('لا يوجد متبرعين')}}
                        </td>
                    </tr>

                @endforelse


            </tbody>

        </table>


    </div>

</x-main-layout>
