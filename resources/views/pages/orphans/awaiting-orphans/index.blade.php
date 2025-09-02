<x-main-layout>

    @push('styles')

    <style>

        .modal-backdrop.fade {
            opacity: 0 !important;
        }

        .modal-backdrop {
            --bs-backdrop-zindex: 0;
        }
    </style>

    @endpush

    <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>
    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex  align-items-center" style="gap: 74px">

            {{-- title and count --}}
            <div>
                <p class="title-color fs-5 fw-semibold mb-1"> {{__('الحالات بانتظار الرد')}}</p>
                <p class="check-count" style="display:none"> {{$count}} {{__('حالة')}}  </p>
            </div>

            {{-- search --}}
            <div class="search mb-1 " style="width: 50%">

                <form action="{{route('orphan.waiting.index')}}" method="get" class="input-group flex-nowrap">
                    @csrf
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن اليتيم')}}"  aria-describedby="addon-wrapping">
                </form>

            </div>

            {{-- filter --}}
            <div style="position: relative;" class="filter">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">{{__('فلتر')}}</span>
                </div>

                <div class="action" style="width:231px;left:-105px">
                    <form action="{{route('orphan.waiting.index')}}" method="GET" id="filterForm" >
                        @csrf
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="جمعية دار البر" id="alBer"
                                @if(in_array('جمعية دار البر', request()->get('filter', []))) checked @endif>
                            <label for="alBer" class="count">{{ __('جمعية دار البر') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="جمعية الشارقة" id="sharjah"
                                @if(in_array('جمعية الشارقة', request()->get('filter', []))) checked @endif>
                            <label for="sharjah" class="count">{{ __('جمعية الشارقة') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="جمعية السيدة مريم" id="special_case"
                                @if(in_array('جمعية السيدة مريم', request()->get('filter', []))) checked @endif>
                            <label for="special_case" class="count">{{ __('جمعية السيدة مريم') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="جمعية دبي الخيرية" id="adabi"
                                @if(in_array('جمعية دبي الخيرية', request()->get('filter', []))) checked @endif>
                            <label for="adabi" class="count">{{ __('جمعية دبي الخيرية') }}</label>
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

                    <th scope="col">{{__('الرقم')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('مقدم ل')}}</th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <!--<th scope="col"> {{__('العنوان')}} </th>-->
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse($orphans as $orphan)

                @php
                    $modalId = 'exampleModal' . $orphan->id . '_' . uniqid();
                @endphp

                    <tr>

                        <td scope="row"> {{$orphan->internal_code}} </td>
                        <td> {{$orphan->name}} </td>
                        <td> {{translate_text($orphan->marketing->supporter->name)}} </td>
                        <td> {{$orphan->phones[0]->phone_number}}  </td>
                        <!--<td> {{$orphan->family->address}} </td>-->

                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px; width:186px">
                                <a href="{{route('orphan.waiting.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('مراسلة الجمعية')}} </span>
                                </a>


                                <!-- Button trigger modal -->
                                <a type="button"  data-bs-toggle="modal" data-bs-target="#{{$modalId}}">
                                    <img src="{{asset('image/archived.png')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('تمت كفالته')}} </span>
                                </a>


                                <!-- Modal -->
                                <div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="{{$modalId}}Label" aria-hidden="true" style="z-index: 2">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{route('orphan.waiting.store' , $orphan->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="supporter_id" value="{{$orphan->marketing->supporter_id}}">
                                                    <x-form.input name="external_code" class="border" type="text" label=" {{__('الكود الخارجي')}}" autocomplete="" placeholder="{{__('أدخل الكود الخارجي')}}"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('اغلاق')}}</button>
                                                    <button type="submit" class="btn btn-primary"> {{__('ارسال')}} </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <form action="{{route('orphan.waiting.destroy' , $orphan->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="submit p-0 border-0 bg-transparent">
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
                            {{__('لا يوجد أيتام على قائمة الانتظار')}}
                        </td>
                    </tr>

                @endforelse



            </tbody>

        </table>

        {{-- </div> --}}

    </div>


    @push('scripts')
        {{-- to send filter form auto if not have submit button --}}
        <script>
            // إضافة حدث 'change' لجميع checkboxes في النموذج
            const checkboxes = document.querySelectorAll('.checkbox_filter');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // إرسال النموذج تلقائيًا عند تغيير حالة أي checkbox
                    // يمكنك تغيير الأسلوب هنا ليتم الإرسال فقط عند التغيير النهائي
                    document.getElementById('filterForm').submit();
                });
            });
        </script>

    @endpush

</x-main-layout>
