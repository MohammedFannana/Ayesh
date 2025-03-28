<x-main-layout>

    <h2 class="mb-4"> {{__('الايتام المقدمين')}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex justify-content-between align-items-center">

            {{-- title and count --}}
            <div>
                <p class="title-color fs-5 fw-semibold mb-1">  {{__('الأسر الأولى بالرعاية')}}</p>
                <p class="count">{{$count}} {{__('أسرة')}}</p>
            </div>

            {{-- search --}}
            <form method="get" action="{{route('family.index')}}" class="search mb-1 w-50">

                <div class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </button>
                    <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن الأسرة')}}"  aria-describedby="addon-wrapping">
                </div>

            </form>

            {{-- filter --}}
            <div style="position: relative;">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">{{__('فلتر')}}</span>
                </div>

                <div class="action" style="width:170px">
                    <form action="{{route('family.index')}}" method="GET" id="filterForm" >
                        @csrf
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="مطلقة" id="one"
                                @if(in_array('مطلقة', request()->get('filter', []))) checked @endif>
                            <label for="one" class="count">{{ __('مطلقة') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="أرملة" id="two"
                                @if(in_array('أرملة', request()->get('filter', []))) checked @endif>
                            <label for="two" class="count">{{ __('أرملة') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="سجين" id="three"
                                @if(in_array('سجين', request()->get('filter', []))) checked @endif>
                            <label for="three" class="count">{{ __('سجين') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="مريض" id="four"
                                @if(in_array('مريض', request()->get('filter', []))) checked @endif>
                            <label for="four" class="count">{{ __('مريض') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="فقير" id="five"
                                @if(in_array('فقير', request()->get('filter', []))) checked @endif>
                            <label for="five" class="count">{{ __('فقير') }}</label>
                        </div>

                    </form>
                </div>


            </div>

            {{-- button --}}
            <div class="add-support">
                <a href="{{route('family.create')}}" class="btn add-button ps-4 pe-4">  {{__('اضافة أسرة')}} </a>
            </div>

        </div>

        <hr>


        <table class="table">
            <thead>

                <tr>
                    <th scope="col"> {{__('رقم الأسرة')}}</th>
                    <th scope="col"> {{__('رقم الهيئة')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col">  {{__('حالة (الأب , الأم)')}} </th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($families as $family)

                    <tr>
                        <td scope="row"> {{$family->families_number}} </ف>
                        <td>{{$family->authority_number}}</td>
                        <td> {{$family->name}} </td>
                        <td> {{$family->parents_status}}  </td>
                        <td> {{$family->first_line_familie_profile->phone}} </td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px">
                                <a href="{{route('family.show' , $family->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مراسلة الجمعية')}}</span>
                                </a>

                                <form action="{{route('family.destroy' , $family->id)}}" method="post" style="margin-right: -5px">
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
                        <td colspan="6" class="text-danger text-center fs-4">
                            {{__('لا يوجد أسر أولى بالرعاية')}}
                        </td>
                    </tr>

                @endforelse





            </tbody>

        </table>


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

