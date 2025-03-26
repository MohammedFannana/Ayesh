<x-main-layout>


    <h2 class="mb-4"> {{__('الشكاوي')}} </h2>

    <div class="bg-white rounded shadow-sm p-3">

        <h3 class="mb-4" style="color:var(--title-color);"> {{__('إضافة شكوى ')}}</h3>

        <x-alert name="success" />
        <x-alert name="danger" />

        <form action="{{route('complaint.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row" style="justify-content:between;">

                <!-- name -->
                <div class="col-12 col-md-6 mb-3">
                    <x-form.input name="name"  class="border" type="text" label=" {{__('الاسم')}} " placeholder="أدخل الاسم"/>
                </div>

                <!-- name -->
                <div class="col-12 col-md-6  mb-3">
                    <x-form.input name="email"  class="border" type="text" label=" {{__('البريد الالكتروني')}} " placeholder="أدخل البريد الالكتروني"/>
                </div>


                <!-- name -->
                <div class="col-12 col-md-6  mb-3">
                    <x-form.input name="phone"  class="border" type="text" label=" {{__('الهاتف')}} " placeholder="أدخل الهاتف"/>
                </div>


                <div class="col-12 mb-3">

                    <x-form.textarea name="content" label="{{__(' الشكوى ')}}" placeholder="اكتب الشكوى"/>

                </div>

                <button class="add-button w-25 pt-2 pb-2 m-auto" type="submit"> ارسال </button>

        </form>

    </div>

</x-main-layout>
