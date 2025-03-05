<x-main-layout>

    <h2 class="mb-5"> {{__('الداعمين')}} </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <h4 class="mb-4 title-color" > {{__('إضافة داعمين ')}}</h4>
        <x-alert name="success" />


        <form action="{{route('supporter.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.supporters._form' , [
                    'button' => 'حفظ' ])

        </form>

    </div>

</x-main-layout>
