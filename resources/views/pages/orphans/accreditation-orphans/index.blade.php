<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex justify-content-between align-items-center">
            <div>
                <p class="title-color fs-5 fw-semibold mb-1"> {{__('الحالات قيد الاعتماد')}}</p>
            </div>

            <form action="" method="GET" class="search mb-1 w-75">

                @csrf
                <div class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="search" class="form-control" placeholder="البحث عن اليتيم"  aria-describedby="addon-wrapping">
                </div>

            </form>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>

                    <th scope="col">{{__('كود اليتيم')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col"> {{__('نوع الحالة ')}}</th>
                    <th scope="col"> {{__('الاجراء')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($orphans as $orphan)

                    <tr>
                        <th scope="row">{{$orphan->internal_code}}</th>
                        <td> {{$orphan->name}} </td>
                        <td>{{$orphan->profile->phone}}</td>
                        <td> {{$orphan->case_type}}</td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" >
                                <a href="{{route('orphan.accreditation.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('ارسال رسالة')}}</span>
                                </a>

                                <form action="{{route('orphan.accreditation.destroy' , $orphan->id )}}" method="post" style="margin-right: -5px">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);">{{__('حذف')}}</span>
                                    </button>
                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{__('لا يوجد أيتام قيد الاعتماد')}}
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>


    </div>

</x-main-layout>
