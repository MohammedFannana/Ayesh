<x-main-layout>

    <h2 class="mb-4">  يتيم جديد </h2>
    <h4 class="mb-4" style="color:var(--title-color);"> استمارة التسجيل </h4>

    <x-alert name="success" />
    <x-alert name="danger" />


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="{{route('orphan.registered.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.orphans.new-orphans._form' , [
                    'button' => ' حفظ '])

        </form>

    {{-- </div> --}}

</x-main-layout>
