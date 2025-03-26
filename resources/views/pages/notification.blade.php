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
                left: 15%;
            }

        </style>

    @endpush

    <h2 class="mb-4"> {{__(' الاشعارات ')}} </h2>


    @forelse ($notifications as $notification)

        <div class="card1 row d-flex rounded p-2 mb-4 {{ $notification->read_at ? '' : 'fw-bold' }}">

            <div class="col-3 basic-information">

                <p class="mb-1 title"> {{ \Carbon\Carbon::parse($notification->data['time'])->diffForHumans() }} </p>
                <a href="{{ route('markAsRead', $notification->id) }}">تحديد كمقروء</a>

            </div>

            <div class="col-9">

                {{ $notification->data['message'] }}

            </div>

        </div>

    @empty

        <p class="text-success fs-4 fw-semibold text-center rounded p-3" style="background-color: #3B9E2933"> لا يوجد اشعارات </p>

    @endforelse


</x-main-layout>
