<x-main-layout>

    <h2 class="mb-5"> تعديل التقرير </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('pages.reports.dar_ber._form' , [
                    'button' => ' تعديل '])

        </form>

    </div>

</x-main-layout>
