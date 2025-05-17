<x-main-layout>

    <h2 class="mb-5"> {{__('الداعمين')}} </h2>

    <x-alert name="success" />
    <x-alert name="danger" />


    <div class="supporters bg-white rounded shadow-sm p-3">

        <div class="intro d-flex justify-content-between align-items-center">
            <div class="count col-2">
                {{$count}} {{__('داعم')}}
            </div>

            <form action="{{route('supporter.index')}}" method="GET" class="search mb-1 col-7">

                <div class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن داعم')}}"  aria-describedby="addon-wrapping">
                </div>

            </form>

            <div class="add-support col-3 d-flex justify-content-end">
                <a href="{{route('supporter.create')}}" class="btn add-button ps-4 pe-4"> {{__('إضافة داعم')}}</a>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col">{{__('الرقم')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('الدولة')}}   </th>
                    <th scope="col"> {{__('الفاكس')}} </th>
                    {{-- <th scope="col"> {{('البريد الالكتروني ')}}</th> --}}
                    <th scope="col"> {{__('الموقع الالكتروني')}}</th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($supporters as $supporter)

                    <tr>
                        <th scope="row">{{$supporter->id}}</th>
                        <td> {{translate_text($supporter->name)}} </td>
                        <td> {{$supporter->country}} </td>
                        <td> {{$supporter->phone}} </td>
                        {{-- <td> {{$supporter->email}} </td> --}}
                        <td> {{$supporter->website}} </td>

                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px">
                                <a href="{{route('supporter.show' , $supporter->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>

                                <a  class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#emailModal">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('ارسال رسالة')}}</span>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('send.email') }}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="emailModalLabel">إرسال رسالة بريدية</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                                        <input type="email" class="form-control" id="email" name="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label">الرسالة</label>
                                                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                                    <button type="submit" class="btn add-button">إرسال</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <form action="{{route('supporter.destroy' , $supporter->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="submit border-0 p-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);">{{__('حذف')}}</span>
                                    </button>
                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{__('لا يوجد داعمين')}}
                        </td>
                    </tr>

                @endforelse


            </tbody>

        </table>


    </div>

</x-main-layout>
