<x-main-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            /* تحكم بارتفاع القائمة المنسدلة */
            .custom-dropdown {
                max-height: 500px; /* ارتفاع الـ dropdown */
                overflow-y: auto;
            }
        </style>

    @endpush

    <h2 class="mb-4"> {{('الأيتام المقدمين')}}</h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro d-flex row  align-items-center">

            {{-- title and count --}}
            <div class="col-3">
                <p class="title-color fs-5 fw-semibold mb-1"> {{('الحالات المكفولة')}}</p>
                <p class="count"> {{$count}} {{('حالة')}}  </p>
            </div>

            {{-- search --}}
            <div class="search mb-1 " style="width: 55%">

                <form action="{{route('orphan.sponsored.index')}}" method="get" class="input-group flex-nowrap">
                    @csrf
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                    </button>
                    <input type="text" name="search" class="form-control" placeholder="{{('البحث عن اليتيم')}}"  aria-describedby="addon-wrapping">
                </form>

            </div>

            {{-- filter --}}
            <div style="position: relative;" class="filter col-2 text-end">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">{{('فلتر')}}</span>
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

        <div class="filter row mt-3">

            {{-- governorate --}}
            <div class="col-12 col-md-4 mb-3">
                <select id="governorate" class="select2-governorate">
                    <option value=""></option>
                    @foreach($governorates as $gov)
                        <option value="{{ $gov->name }}">{{ $gov->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-12 col-md-4 mb-3">
                <select id="age_from" class="select2-age-from">
                    <option value=""></option>
                    @foreach(range(0,25) as $i)
                        @if($i == 0)
                            <option value="0">{{ __('يوم واحد') }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }} {{ __('سنة') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <select id="age_to" class="select2-age-to">
                    <option value=""></option>
                        @foreach(range(0,25) as $i)
                            @if($i == 0)
                                <option value="0">{{ __('يوم واحد') }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i }} {{ __('سنة') }}</option>
                            @endif
                        @endforeach
                </select>
            </div>

        </div>

        <hr>

        {{-- <div class="table-responsive"> --}}

        <table class="table">
            <thead>

                <tr>

                    <th scope="col">{{('الكود الداخلي')}}</th>
                    <th scope="col"> {{('الكود الخارجي')}} </th>
                    <th scope="col"> {{('الاسم')}} </th>
                    <th scope="col"> {{('مقدم ل')}}</th>
                    <th scope="col"> {{('الهاتف')}} </th>
                    <th scope="col"> {{('الاجراءات')}} </th>

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
                                    <span style="color: var(--text-color);"> {{('مشاهدة التفاصيل')}} </span>
                                </a>

                                <br>
                                <a href="{{route('orphan.transfer.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/transfers.svg')}}" alt="">
                                    <span style="color: var(--text-color);"> {{('قائمة التحولات')}}</span>
                                </a>

                                <br>
                                <a href="{{route('orphan.convert.archived' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/archived.png')}}" alt="">
                                    <span style="color: var(--text-color);"> {{('اضافة للأرشفة')}}</span>
                                </a>

                                <form action="{{route('orphan.sponsored.destroy' , $orphan->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="submit p-0 border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);">{{('حذف')}}</span>
                                    </button>
                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">
                            {{('لا يوجد أيتام على قائمة المكفولين')}}
                        </td>
                    </tr>

                @endforelse



            </tbody>

        </table>

        {{-- </div> --}}

    </div>

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select2-age-from').select2({
                    placeholder: "اختر العمر من",
                    allowClear: true,
                    width: '100%',
                    dropdownCssClass: "custom-dropdown"
                });

                $('.select2-age-to').select2({
                    placeholder: "اختر العمر إلى",
                    allowClear: true,
                    width: '100%',
                    dropdownCssClass: "custom-dropdown"
                });

                $('.select2-governorate').select2({
                    placeholder: "اختر المحافظة",
                    allowClear: true,
                    width: '100%',
                    dropdownCssClass: "custom-dropdown"
                });
            });
        </script>


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


<script>
function filterData() {
    $.ajax({
        url: "{{ route('orphan.filter') }}", // تأكد من اسم الراوت في web.php
        type: 'GET',
        data: {
            governorate: $('#governorate').val(),
            age_from: $('#age_from').val(),
            age_to: $('#age_to').val()
        },
        success: function(data) {
            var tbody = $('table tbody');
            tbody.empty();

            if(data.length > 0) {
                data.forEach(function(orphan, index) {
                    var row = `<tr>
                        <td>${orphan.internal_code ?? '-'}</td>
                        <td>${orphan.external_code ?? '-'}</td>
                        <td>${orphan.name}</td>
                        <td>${orphan.supporter ?? '-'}</td>
                        <td>${orphan.phone ?? '-'}</td>
                        <td style="position: relative;">
                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">
                            <div class="action" style="left: -50px">
                                <a href="/orphan/sponsored/${orphan.id}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">مشاهدة التفاصيل</span>
                                </a><br>
                                <a href="/orphan/transfer/${orphan.id}" class="text-decoration-none">
                                    <img src="{{asset('image/transfers.svg')}}" alt="">
                                    <span style="color: var(--text-color);">قائمة التحولات</span>
                                </a><br>
                                <a href="/orphan/convert/archived/${orphan.id}" class="text-decoration-none">
                                    <img src="{{asset('image/archived.png')}}" alt="">
                                    <span style="color: var(--text-color);">اضافة للأرشفة</span>
                                </a>
                                <form action="/orphan/sponsored/${orphan.id}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="submit p-0 border-0 bg-transparent">
                                        <img src="{{asset('image/Delete.svg')}}" alt="">
                                        <span style="color: var(--text-color);">حذف</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>`;
                    tbody.append(row);
                });
            } else {
                tbody.append('<tr><td colspan="6" class="text-center fs-5 rounded text-white" style="background-color: var(--title-color)">لا يوجد أيتام على قائمة المكفولين</td></tr>');
            }
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
}

$(document).ready(function() {
    $('.select2-governorate, .select2-age-from, .select2-age-to').select2({
        placeholder: "اختر",
        allowClear: true,
        width: '100%',
        dropdownCssClass: "custom-dropdown"
    });

    // أي تغيير في أي select → تحديث الجدول
    $('#governorate, #age_from, #age_to').on('change', filterData);

    // تحميل أولي للبيانات عند فتح الصفحة
    filterData();
});


</script>

    @endpush

    {{$orphans->withQueryString()->links()}}
</x-main-layout>
