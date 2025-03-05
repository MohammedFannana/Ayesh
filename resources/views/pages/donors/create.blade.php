<x-main-layout>

    <h2 class="mb-5"> المتبرعين </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <h3 class="mb-4" style="color:var(--title-color);"> إضافة متبرع </h3>

        <x-alert name="success" />

        <form action="{{route('donor.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.donors._form' , [
                    'button' => ' حفظ '])

        </form>

    </div>

</x-main-layout>
