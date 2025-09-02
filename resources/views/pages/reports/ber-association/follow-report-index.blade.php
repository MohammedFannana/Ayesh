<x-main-layout>


    <h2 class="mb-4"> {{__('التقارير')}} </h2>

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="bg-white p-3 rounded shadow-sm">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="count ">
                <h5 class="title-color">{{__('تقارير متابعة دار البر')}}</h5>
            </div>



            <div class="d-flex justify-content-end">
                <a href="{{route('report.follow.albar.create')}}" class="btn add-button ps-4 pe-4"> {{__('إضافة متابعة تقرير')}}</a>
            </div>

        </div>

        <hr>


        {{-- pdf reports --}}
        <div class="d-flex flex-wrap gap-3">

            @forelse ($reports as $report)

                <div class="bg-white d-flex justify-content-between border rounded p-2" style="width: 31%">

                    <div class="d-flex gap-3 align-items-center">
                        <img class="mb-2" src="{{asset('image/pdf.png')}}" alt="">

                        <div>
                            <p class="fs-5 fw-semibold mb-2"> {{$report->data->orphan->name}} </p>
                            <p style="color: #C1C1C1">
                                {{__('تم إنشائه')}}: {{ $report->created_at->format('Y-m-d') }}
                            </p>
                        </div>

                    </div>

                    {{-- action --}}
                    <div class="d-flex flex-end mt-2" style="position: relative; ">

                        <img class="show-action" src="{{asset('image/point.svg')}}" alt="" width="20px" height="18px">

                        <div class="action" style="top:18px; width:170px">
                            <a href="{{route('report.follow.albar.download' , $report->id)}}" class="text-decoration-none">
                                <img src="{{asset('image/Downlaod.png')}}" alt="">
                                <span style="color: var(--text-color);"> {{__('تحميل التقرير')}}</span>
                            </a>

                            <form action="{{route('report.follow.albar.delete' , $report->id)}}" method="post" style="margin-right: -5px">
                                @csrf
                                @method('delete')
                                <button class="submit border-0 p-0 bg-transparent">
                                    <img src="{{asset('image/Delete.svg')}}" alt="">
                                    <span style="color: var(--text-color);">{{__('حذف')}}</span>
                                </button>
                            </form>
                        </div>

                    </div>


                </div>

            @empty

        </div>

        <div class="bg-white p-2 fs-4 w-100 text-danger text-center" >

            {{__('لا يوجد تقارير')}}

        </div>

        @endforelse

    </div>

</x-main-layout>
