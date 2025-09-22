<x-main-layout>


    <h2 class="mb-4">  {{__('يتيم جديد')}}</h2>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-4" style="color:var(--title-color);"> {{__('استمارة التسجيل')}}</h4>
        <a href="{{route('orphan.registered.create')}}" class="btn add-button ps-4 pe-4"> {{__('إضافة يتيم')}}</a>

    </div>

    <x-alert name="success" />
    <x-alert name="danger" />


    <form action="{{ route('orphans.excel.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <div class="mb-3">
            <label for="excelFile" class="form-label">{{__('تحميل ملف Excel')}}</label>
            <input class="form-control" type="file" id="excelFile" name="excelFile" required>
        </div> --}}

        <div class="col-12 col-md-6 mb-3">
            <label class="mb-2">{{__('تحميل ملف Excel')}}</label> <br>

            <label for="excelFile" class="custom-file-upload w-100 text-center"> {{__('تحميل ملف Excel')}}
                <img src="" width="60" alt="">
                <div class="file-preview mt-2"></div>

            </label>
            <x-form.input name="excelFile" class="border hidden-file-style" type="file" id="excelFile" style="display: none;" />
        </div>

        <div class="col-12 col-md-6 mb-3">
            <label for="supporter_id" class="form-label">{{__('الجمعية')}}</label>
            <select class="form-control" name="supporter_id" id="supporter_id" required>
                <option value="">{{__('اختر الداعم')}}</option>
                @foreach($supporters as $supporter)
                    <option value="{{ $supporter->id }}">{{ $supporter->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="col-12 col-md-6 mb-3" id="status">
            <label for="" class="mb-2"> {{__('حالة اليتيم')}} </label>
            <x-form.select name="status"
                :options="['' => __('اختر'), 'registered' => __('مسجل'), 'under_review' => __('قيد المراجعة'), 'approved' => __('معتمد')
                , 'marketing_provider' => __('مقدم للتسويق') , 'waiting' => __('بانتظار الرد') , 'sponsored' => __('مكفول')]" />

        </div>

        <button type="submit" class="btn add-button" style="width:120px">{{__('استيراد')}}</button>
    </form>


</x-main-layout>
