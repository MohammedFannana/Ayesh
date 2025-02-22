<x-main-layout>

    <h4 class="mb-4" style="color:var(--title-color);"> اكمال المعلومات </h4>

    <form  action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- country --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="country" class="border" type="text" label=" الدولة " autocomplete="" placeholder="أدخل الدولة"/>
            </div>

            {{-- city --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="city" class="border" type="text" label=" المدينة " autocomplete="" placeholder="أدخل المدينة"/>
            </div>

            {{-- responsible_volunteer --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="responsible_volunteer" class="border" type="text" label=" المتطوع المسؤول " autocomplete="" placeholder="أدخل اسم المتطوع المسؤول"/>
            </div>

            {{-- responsible_donor --}}
            <div class="col-12 col-md-6 mb-3">
                <x-form.input name="responsible_donor" class="border" type="text" label=" المانح المسؤول " autocomplete="" placeholder="أدخل اسم المانح المسؤول"/>
            </div>

            {{-- description_orphan --}}
            <div class="col-12 mb-3">

                <x-form.textarea name="description_orphan" label="وصف حالة اليتيم" value="وصف حالة اليتيم"/>

            </div>

        </div>

        <div class="d-grid gap-2 col-1 mx-auto">
            <button type="submit" class="add-button"> حفظ </button>
        </div>

    </form>


</x-main-layout>
