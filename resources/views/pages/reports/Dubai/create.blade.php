<x-main-layout>

    <h2 class="mb-4">  انشاء تقرير </h2>
    <h4 class="mb-4" style="color:var(--title-color);"> جمعية دبي الخيرية </h4>


    {{-- <div class="supporters bg-white rounded shadow-sm p-3"> --}}


        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.reports.dubai._form' , [
                    'button' => ' حفظ '])

        </form>

    {{-- </div> --}}

</x-main-layout>
