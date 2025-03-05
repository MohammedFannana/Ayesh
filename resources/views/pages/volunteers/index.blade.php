<x-main-layout>

    <h2 class="mb-5"> {{__(('المتطوعين'))}} </h2>

    <x-alert name="success" />
    <x-alert name="danger" />


    <div class="volunteers bg-white rounded shadow-sm p-3">

        <div class="intro  row justify-content-between align-items-center">
            <div class="count col-2">
                {{$count}} {{__('متطوع')}}
            </div>

            <div class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </span>
                    <input type="text" class="form-control" placeholder="البحث عن متطوع"  aria-describedby="addon-wrapping">
                </div>

            </div>

            <div class="add-support col-3 d-flex justify-content-end">
                <a href="{{route('volunteer.create')}}" class="btn add-button ps-4 pe-4"> {{__('إضافة متطوع')}}</a>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col">{{__('الرقم')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('الدولة')}} </th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col"> {{__('البريد الالكتروني ')}}</th>
                    <th scope="col"> {{__('الاجراء')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($volunteers as $volunteer)

                    <tr>
                        <th scope="row"> {{$volunteer->id}} </th>
                        <td> {{$volunteer->name}} </td>
                        <td> {{$volunteer->country}} </td>
                        <td> {{$volunteer->phone}} </td>
                        <td> {{$volunteer->email}} </td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: 20px">
                                <a href="{{route('volunteer.show' , $volunteer->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__(' مشاهدة التفاصيل ')}} </span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__(' مراسلة الجمعية ')}} </span>
                                </a>

                                <form action="{{route('volunteer.destroy' , $volunteer->id)}}" method="post" style="margin-right: -5px">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);"> {{__(' حذف ')}} </span>
                                    </button>
                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">

                        {{__(' لا يوجد متطوعين ')}}

                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>


    </div>

</x-main-layout>
