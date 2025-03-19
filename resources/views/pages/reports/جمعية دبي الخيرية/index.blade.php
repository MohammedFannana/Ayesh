<x-main-layout>


    <h2 class="mb-4"> {{__('التقارير')}} </h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="bg-white p-3 rounded shadow-sm">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="count ">
                <h5 class="title-color"> {{__('تقارير دبي الخيرية ')}}</h5>
                {{$count}} {{__('تقرير')}}
            </div>

            <div class="search mb-1 w-50">

                <form action="{{route('report.index' , $donor_id)}}" method="GET" class="input-group flex-nowrap">
                    <button type="submit" class="input-group-text" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512"><path fill="#ACACAC" d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                    </button>
                    <input type="text" name="search" class="form-control" placeholder="البحث عن تقرير"  aria-describedby="addon-wrapping">
                </form>

            </div>

            <div class="d-flex justify-content-end">
                <a href="{{route('report.create' , $donor_id)}}" class="btn add-button ps-4 pe-4"> {{__('إضافة تقرير ')}}</a>
            </div>

        </div>

        <hr>


        {{-- pdf reports --}}
        @forelse ($reports as $report)

            <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 35%">

                <div class="d-flex gap-3 align-items-center">
                    <img class="mb-2" src="{{asset('image/pdf.png')}}" alt="">

                    <div>
                        <p class="fs-5 fw-semibold mb-2"> {{$report->orphan->name}} </p>
                        <p style="color: #C1C1C1">
                            اخر تحديث : {{ $report->formatted_updated_at  }}
                        </p>
                    </div>

                </div>

                {{-- action --}}
                <div class="d-flex flex-end mt-2" style="position: relative; ">

                    <img class="show-action" src="{{asset('image/point.svg')}}" alt="" width="20px" height="18px">

                    <div class="action" style="top:18px">
                        <a href="{{route('download.report' , $report->id)}}" class="text-decoration-none">
                            <img src="{{asset('image/Downlaod.png')}}" alt="">
                            <span style="color: var(--text-color);"> {{__('تحميل التقرير ')}}</span>
                        </a>

                        <br>
                        <a href="{{route('report.edit' , $report->id)}}" class="text-decoration-none">
                            <img src="{{asset('image/Edit Square.svg')}}" alt="">
                            <span style="color: var(--text-color);">  {{__('تعديل')}} </span>
                        </a>

                        <form action="{{route('report.destroy' , $report->id)}}" method="post" style="margin-right: -5px">
                            @csrf
                            @method('delete')
                            <button class="submit border-0 bg-transparent">
                                <img src="{{asset('image/Delete.svg')}}" alt="">
                                <span style="color: var(--text-color);">{{__('حذف')}}</span>
                            </button>
                        </form>
                    </div>

                </div>


            </div>

        @empty

            <div class="bg-white p-2 w-100 text-danger text-center" >

                لا يوجد تقارير

            </div>

        @endforelse

    </div>

</x-main-layout>
