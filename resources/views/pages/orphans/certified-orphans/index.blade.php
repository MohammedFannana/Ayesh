<x-main-layout>

    <div>
        <h2 class="mb-4"> {{__('الأيتام المقدمين')}}</h2>
        <x-alert name="success" />
        <x-alert name="danger" />
    </div>


    <div class="orphons bg-white rounded shadow-sm p-3">

        <div class="intro  justify-content-between align-items-center" style="display: flex">

            {{-- title and count --}}
            <div>
                <p class="title-color fs-5 fw-semibold mb-1"> {{__('الحالات المعتمدة')}}</p>
                <p class="count">{{$count}} {{__('حالة')}}</p>
            </div>

            {{-- search --}}
            <div class="search mb-1 w-50">

                <form action="{{route('orphan.certified.index')}}" method="GET" class="search mb-1 w-100">

                    @csrf
                    <div class="input-group flex-nowrap">
                        <button type="submit" class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>
                        </button>
                        <input type="text" name="search" class="form-control" placeholder="{{__('البحث عن اليتيم')}}" aria-describedby="addon-wrapping">
                    </div>

                </form>

            </div>

            {{-- filter --}}
            <div style="position: relative;">

                <div class="show-action">
                    <img  src="{{asset('image/Filter.svg')}}" alt="">
                    <span class="title-color">{{__('فلتر')}}</span>
                </div>



                <div class="action">

                    <form action="{{ route('orphan.certified.index') }}" method="get" id="filterForm">
                        @csrf
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="يتيم الأبوين" id="orphan_parent"
                                @if(in_array('يتيم الأبوين', request()->get('filter', []))) checked @endif>
                            <label for="orphan_parent" class="count">{{ __('يتيم الأبوين') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="مريض مزمن" id="chronic_patient"
                                @if(in_array('مريض مزمن', request()->get('filter', []))) checked @endif>
                            <label for="chronic_patient" class="count">{{ __('مريض مزمن') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="الحالات الخاصة" id="special_case"
                                @if(in_array('الحالات الخاصة', request()->get('filter', []))) checked @endif>
                            <label for="special_case" class="count">{{ __('الحالات الخاصة') }}</label>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <input type="checkbox" class="checkbox_filter" name="filter[]" value="قريب السن" id="close_age"
                                @if(in_array('قريب السن', request()->get('filter', []))) checked @endif>
                            <label for="close_age" class="count">{{ __('قريب السن') }}</label>
                        </div>
                    </form>

                </div>

            </div>

            {{-- button --}}
            {{-- <div class="add-support">
                <button class="btn add-button ps-4 pe-4"> {{__('الحالات الخاصة')}} </button>
            </div> --}}

        </div>


        <div class="intro2  justify-content-between align-items-center" style="display: none">

            {{-- title and count --}}
            <div class="w-75">
                <p class="fs-5 checkbox-count"> {{__('حالة')}}</p>
            </div>


            {{-- button --}}
            <div class="d-flex gap-2 align-items-start">

                <div>

                    <button  type="button" id="export_button" class="btn add-button ps-4 pe-4 mb-2 position-relative"> {{__('تصدير')}} </button>


                    <!-- النموذج الأول (اختيار الجمعية) -->
                    <form action="{{ route('orphan.convert.marketing') }}" method="post" class="bg-white position-absolute shadow rounded p-2 z-2" id="associations_list">
                        @csrf

                        <div>
                            <label class="count" style="font-size: 15px">{{ __('اختر اسم الجمعية') }}</label>

                            @foreach ($supporters as $supporter)
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <input type="radio" name="supporter_id" value="{{ $supporter->id }}" id="supporter_{{ $supporter->id }}">
                                    <label for="supporter_{{ $supporter->id }}" style="font-size: 14px"> {{ __($supporter->name) }} </label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn add-button w-100 pt-1 pb-1" id="submit_two_form"> {{ __('ارسال') }} </button>
                        </div>
                    </form>


                </div>

                <button id="reset_button" class="btn btn-danger ps-4 pe-4"> {{__('الغاء')}} </button>
            </div>

        </div>

        <hr>

        {{-- <div class="table-responsive"> --}}

        <table class="table">
            <thead>

                <tr>
                    <th scope="col"></th>
                    <th scope="col">{{__('كود اليتيم الداخلي')}}</th>
                    <th scope="col"> {{__('الاسم')}} </th>
                    <th scope="col"> {{__('السن')}} </th>
                    <th scope="col"> {{__('حالة اليتيم')}}</th>
                    <th scope="col"> {{__('الاجراءات')}} </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($orphans as $orphan)

                    <tr>

                        <th>
                            <!-- النموذج الثاني (اختيار الأيتام) -->
                            {{-- <form action="{{ route('orphan.convert.marketing') }}" method="post" id="orphan_checkbox"> --}}
                                {{-- @csrf --}}
                                <input type="checkbox" name="orphan_ids[]" value="{{ $orphan->id }}" class="convert_marketing" id="orphan_{{ $orphan->id }}">
                            {{-- </form> --}}

                        </th>

                        <th scope="row" class="d-flex gap-2 align-items-center">
                            {{$orphan->internal_code}}
                        </th>
                        <td> {{$orphan->name}} </td>
                        <td>{{$orphan->age}} {{('عام')}}</td>
                        <td> {{$orphan->case_type}}</td>
                        <td style="position: relative;">

                            <img class="show-action" src="{{asset('image/Group 8.svg')}}" alt="">

                            <div class="action">
                                <a href="{{route('orphan.certified.show' , $orphan->id)}}" class="text-decoration-none">
                                    <img src="{{asset('image/Show.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('مشاهدة التفاصيل')}}</span>
                                </a>

                                <br>
                                <a href="" class="text-decoration-none">
                                    <img src="{{asset('image/Message.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('ارسال رسالة')}}</span>
                                </a>

                                <form action="{{route('orphan.certified.destroy' , $orphan->id )}}" method="post">
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
                            {{__('لا يوجد أيتام معتمدين')}}
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
            $('.convert_marketing').change(function () {
                // حساب عدد الـ checkbox المحددة
                var selectedCount = $('.convert_marketing:checked').length;

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

    {{-- to show and hide the associations_list --}}
    <script>
        $(document).ready(function () {
        // عند النقر على export_button
            $('#export_button').click(function (e) {
                e.preventDefault(); // منع السلوك الافتراضي للزر
                $('#associations_list').toggle(); // إظهار أو إخفاء associations_list
            });

            // عند النقر على reset_button
            $('#reset_button').click(function (e) {
                e.preventDefault(); // منع السلوك الافتراضي للزر

                // إخفاء associations_list
                $('#associations_list').hide();

                // إعادة تعيين جميع الـ checkbox في orphan_checkbox
                $('.convert_marketing').prop('checked', false);

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

    {{-- when click in submit_two_form button send two form  orphan_checkbox and associations_list--}}

    <script>
        document.getElementById('submit_two_form').addEventListener('click', function(event) {
            event.preventDefault(); // منع الإرسال الافتراضي

            let form = document.getElementById('associations_list'); // استهداف النموذج الرئيسي
            let orphanCheckboxes = document.querySelectorAll('.convert_marketing:checked'); // الحصول على الأيتام المختارين

            // إزالة أي بيانات سابقة للأيتام من النموذج
            document.querySelectorAll('input[name="orphan_ids[]"]').forEach(input => input.remove());

            // إضافة بيانات الأيتام المختارين إلى النموذج
            orphanCheckboxes.forEach(checkbox => {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'orphan_ids[]';
                input.value = checkbox.value;
                form.appendChild(input);
            });

            form.submit(); // إرسال النموذج مع البيانات الجديدة
        });
    </script>




    {{-- <script>
        let timeout;
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // إلغاء التوقيت السابق
                clearTimeout(timeout);

                // تعيين وقت التأخير قبل إرسال النموذج
                timeout = setTimeout(function() {
                    document.getElementById('filterForm').submit();
                }, 500); // تأخير 500 ميلي ثانية
            });
        });
    </script> --}}

    @endpush

</x-main-layout>
