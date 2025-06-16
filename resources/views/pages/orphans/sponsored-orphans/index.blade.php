<x-main-layout>

    <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex row  align-items-center">

            {{-- title and count --}}
            <div class="col-3">
                <p class="title-color fs-5 fw-semibold mb-1"> {{__('الحالات المكفولة')}}</p>
                <p class="count"> {{$count}} {{__('حالة')}}  </p>
            </div>

            {{-- search --}}
            <div class="search mb-1 " style="width: 55%">

                <form action="{{route('orphan.sponsored.index')}}" method="get" class="input-group flex-nowrap">
                    @csrf
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن اليتيم')}}"  aria-describedby="addon-wrapping">
                </form>

            </div>

            {{-- filter --}}
            <div style="position: relative;" class="filter col-2 text-end">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">{{__('فلتر')}}</span>
                </div>

                <div class="action" style="width:231px;left:0px">
                    <form action="{{route('orphan.sponsored.index')}}" method="GET" id="filterForm" >
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

                    <th scope="col">{{__('الكود الداخلي')}}</th>
                    <th scope="col"> {{__('الكود الخارجي')}} </th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('مقدم ل')}}</th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($orphans as $orphan)

                    <tr>
                        <td scope="row"> {{$orphan->internal_code}} </td>
                        <td scope="row"> {{$orphan->sponsorship->external_code}} </td>
                        <td> {{$orphan->name}} </td>
                        <td> {{translate_text($orphan->marketing->supporter->name)}} </td>
                        <td> {{$orphan->phones[0]->phone_number}}  </td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px">
                                <a href="{{route('orphan.sponsored.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('مشاهدة التفاصيل')}} </span>
                                </a>

                                <br>
                                <a href="{{route('orphan.transfer.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/transfers.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('قائمة التحولات')}}</span>
                                </a>

                                <br>
                                <a href="{{route('orphan.convert.archived' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/archived.png')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('اضافة للأرشفة')}}</span>
                                </a>

                                <form action="{{route('orphan.sponsored.destroy' , $orphan->id)}}" method="post" style="margin-right: -5px">
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
                            {{__('لا يوجد أيتام على قائمة المكفولين')}}
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

    {{$orphans->withQueryString()->links()}}
</x-main-layout>
