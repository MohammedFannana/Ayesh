<x-main-layout>
    @push('styles')

        <style>
            .card1{
                background-color: #F6F6F6;
                border-bottom:2px solid var( --title-color);
                border-right:4px solid var( --title-color);
            }


            .basic-information{
                position: relative;
            }

            .basic-information::after{
                position: absolute;
                content: "";
                width: 1px;
                height: 100%;
                background-color: #C1C1C1;
                top: 0px;
                {{ App::isLocale('ar') ? 'left: 15%;' : 'right: 15%;' }};
            }

        </style>

    @endpush

    <h2 class="mb-4"> {{__('الشكاوي')}} </h2>

    @forelse ($complaints as $complaint)

        <div class="card1 row d-flex rounded p-2 mb-4">

            <div class="col-3 basic-information">

                <p class="mb-1 fw-semibold"> {{$complaint->name}} </p>
                <p class="mb-1 fw-semibold"> {{$complaint->email}} </p>
                <p class="mb-1 fw-semibold"> {{$complaint->phone}} </p>
                <p class="mb-1 title"> {{$complaint->created_at->format('Y-m-d')}} </p>

            </div>

            <div class="col-9">

                {{$complaint->content}}

            </div>

        </div>

    @empty

        <p class="text-success fs-4 fw-semibold text-center rounded p-3" style="background-color: #3B9E2933"> لا يوجد شكاوي </p>

    @endforelse


</x-main-layout>
