<x-main-layout>

    <h2 class="mb-5"> الداعمين </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('pages.supporters._form' , [
                    'button' => ' تعديل '])

        </form>

    </div>

</x-main-layout>
