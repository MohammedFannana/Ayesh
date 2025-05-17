<x-main-layout>

    <h2 class="mb-4">{{__('الأيتام المقدمين')}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro align-items-center" style="gap: 55px; display:flex">

            {{-- title and count --}}
            <div>
                <p class="title-color fs-5 fw-semibold mb-1"> {{__('الحالات المقدمة للتسويق')}}</p>
                <p class="check-count" style="display:none"> {{$count}} {{__('عنصر')}} </p>
            </div>

            {{-- search --}}
            <div class="search mb-1" style="width: 48%">

                <form action="{{route('orphan.marketing.index')}}" method="get" class="input-group flex-nowrap">
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

                <div class="action" style="width:232px; left:-130px">
                    <form action="{{route('orphan.marketing.index')}}" method="GET" id="filterForm" >
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

            {{-- button --}}
            {{-- <div class="uplode-button" style="display:none">
                <a href="" class="btn add-button ps-4 pe-4"> تحميل pdf  </a>
                <a href="" class="btn btn-danger ps-4 pe-4"> {{__('الغاء')}} </a>
            </div> --}}

        </div>

        <div class="intro2  justify-content-between align-items-center" style="display: none">

            {{-- title and count --}}
            <div class="w-75">
                <p class="fs-5 checkbox-count mt-2"> {{__('عنصر')}}</p>
            </div>


            {{-- button --}}
            <div class="d-flex gap-2 align-items-start">

                <!-- النموذج الأول (اختيار الجمعية) -->
                {{-- <form action="{{route('orphan.generate.pdf')}}" method="get"  id="submit_button"> --}}
                    {{-- @csrf --}}

                {{-- this button use to send orphan_ids[] input to {{route('orphan.generate.pdf')}} --}}
                <a href="{{route('orphan.generate.pdf')}}" type="button" id="export_pdf" class="btn add-button" style="width: 170px" id="submit_two_form"> {{ __('تحميل pdf') }} </a>
                {{-- </form> --}}

                <button id="reset_button" class="btn btn-danger ps-4 pe-4"> {{__('الغاء')}} </button>
            </div>

        </div>

        <hr>

        {{-- <div class="table-responsive"> --}}

        <table class="table">
            <thead>

                <tr>
                    <th scope="col">  </th>
                    <th scope="col">{{__('كود اليتيم الداخلي')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('مقدم ل')}}</th>
                    <th scope="col"> {{__('الهاتف')}} </th>
                    <th scope="col"> {{__('العنوان')}} </th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($orphans as $orphan)

                    <tr>

                        <td>
                            <input type="checkbox" name="orphan_ids[]" value="{{ $orphan->id }}" class="convert_waiting_checkbox" id="orphan_{{ $orphan->id }}">
                        </td>
                        <td scope="row"> {{$orphan->internal_code}} </ف>
                        <td> {{$orphan->name}} </td>
                        <td> {{$orphan->marketing->supporter->name}} </td>
                        <td> {{$orphan->profile->phone}}  </td>
                        <td> {{$orphan->family->address}} </td>

                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action" style="left: -50px;width:175px">
                                <a href="{{route('orphan.marketing.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#emailModal">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{__('مراسلة الجمعية')}} </span>
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

                                @cannot('has-filled-fields', $orphan)

                                    <a href="{{route('orphan.marketing.create' , [$orphan->marketing->supporter->id , $orphan->id] )}}" class="text-decoration-none">
                                        <img src="{{asset('image/data.svg')}}" alt="">
                                        <span style="color: var(--text-color);"> {{__('اكمل البيانات')}} </span>
                                    </a>

                                @endcannot


                                <form action="{{route('orphan.marketing.destroy' , $orphan->id)}}" method="post" style="margin-right: -5px">
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
                        <td colspan="7" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{__('لا يوجد أيتام مقدمين للتسويق')}}
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

        {{-- to show and hide the intro and intro2 --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // عند تغيير حالة أي checkbox
                $('.convert_waiting_checkbox').change(function () {
                    // حساب عدد الـ checkbox المحددة
                    var selectedCount = $('.convert_waiting_checkbox:checked').length;

                    if (selectedCount > 0) {
                        // إذا تم اختيار أي checkbox
                        $('.intro').hide();
                        $('.intro2').show().addClass('d-flex'); // إضافة d-flex لـ intro2
                        $('.intro2 .checkbox-count').text(selectedCount + ' {{ __("حالة") }}'); // تحديث العدد
                    } else {
                        // إذا لم يتم اختيار أي checkbox
                        $('.intro').show();
                        $('.intro2').hide().removeClass('d-flex'); // إزالة d-flex من intro2
                    }
                });
            });
        </script>

        {{-- to show and hide the associations_list and make reset button work --}}
        <script>
            $(document).ready(function () {

                // عند النقر على reset_button
                $('#reset_button').click(function (e) {
                    e.preventDefault(); // منع السلوك الافتراضي للزر

                    // إخفاء associations_list
                    $('#associations_list').hide();

                    // إعادة تعيين جميع الـ checkbox في orphan_checkbox
                    $('.convert_waiting_checkbox').prop('checked', false);

                    // إعادة عرض intro وإخفاء intro2
                    $('.intro').show();
                    $('.intro2').hide().removeClass('d-flex');
                });

                // عند النقر في أي مكان خارج associations_list
                $(document).mouseup(function (e) {
                    var container = $('#associations_list');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                         container.hide(); // إخفاء associations_list
                    }
                });
            });
        </script>

        {{-- when click in submit_two_form button send associations_list and checkbox input--}}

        <script>
            document.getElementById('export_pdf').addEventListener('click', function(event) {
                event.preventDefault(); // منع السلوك الافتراضي للرابط

                let orphanCheckboxes = document.querySelectorAll('.convert_waiting_checkbox:checked'); // الحصول على الأيتام المختارين
                if (orphanCheckboxes.length === 0) {
                    alert("يرجى اختيار يتيم واحد على الأقل.");
                    return;
                }

                let orphanIds = Array.from(orphanCheckboxes).map(checkbox => checkbox.value).join(','); // جمع المعرفات بفاصلة

                // توجيه المستخدم إلى الـ route مع المعرفات المحددة
                window.location.href = `{{ route('orphan.generate.pdf') }}?orphan_ids=${orphanIds}`;
            });
        </script>


    @endpush

</x-main-layout>
