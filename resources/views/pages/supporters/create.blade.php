<x-main-layout>

    <h2 class="mb-5"> الداعمين </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <h3 class="mb-4" style="color:var(--title-color);"> إضافة داعمين </h3>

        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            @include('pages.supporters._form' , [
                    'button' => ' حفظ '])

        </form>

    </div>

</x-main-layout>
