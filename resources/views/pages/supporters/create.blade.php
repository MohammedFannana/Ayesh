<x-main-layout>

    <h2 class="mb-5"> {{__('الداعمين')}} </h2>

    <div class="supporters bg-white rounded shadow-sm p-3">

        <h4 class="mb-4 title-color" > {{__('إضافة داعمين ')}}</h4>
        <x-alert name="success" />


        <form action="{{route('supporter.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row supporters-form" style="justify-content:between;">


                <!-- name -->
                <div class="col-12 col-md-6">
                    <x-form.input name="name"  class="border" type="text" label="{{__('الاسم')}}" placeholder="أدخل الاسم"/>
                </div>

                <!-- country -->
                <div class="col-12 col-md-6">
                    <x-form.input name="country"  class="border" type="text" label="{{__('الدولة')}}" placeholder="أدخل الدولة"/>
                </div>

                {{-- phone --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="phone" class="border" type="text" label="{{__(' رقم الجوال ')}}" autocomplete="" placeholder="أدخل رقم الجوال"/>
                </div>

                {{-- Fax --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="fax" class="border" type="text" label="{{__('الفاكس')}}" autocomplete="" placeholder="أدخل الفاكس"/>
                </div>

                {{-- Association name --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="association_name" class="border" type="text" label=" {{__(' اسم الجمعية ')}} " autocomplete="" placeholder="أدخل اسم الجمعية"/>
                </div>

                {{-- Department Name --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="department_name" class="border" type="text" label=" {{__('اسم القسم')}} " autocomplete="" placeholder="أدخل اسم القسم"/>
                </div>


                {{-- address --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="address" class="border" type="text" label=" {{__(('العنوان'))}} " autocomplete="" placeholder="أدخل العنوان"/>
                </div>

                {{-- website --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="website" class="border" type="text" label=" {{__('الموقع الالكتروني ')}}" autocomplete="" placeholder="أدخل الموقع الالكتروني"/>
                </div>

                {{-- email
                <div class="mt-4 mb-3 col-12 col-md-6">
                    <x-form.input name="emails" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                </div> --}}

                <div id="email-container" class="row">
                    {{-- الحقول الأساسية التي تظهر أولاً --}}
                    <div class="mt-4 col-12 col-md-6">
                        <x-form.input name="administrator_name[]" class="border" type="text" label=" {{__('اسم المسؤول')}} " autocomplete="" placeholder="أدخل اسم المسؤول"/>
                    </div>

                    <div class="mt-4 mb-3 col-12 col-md-6">
                        <x-form.input name="emails[]" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                    </div>
                </div>

                <div>
                    <a type="button" id="add-email-btn" style="margin-right:50%">
                        <img src="{{ asset('image/plus.png') }}" alt="">
                        <span class="title-color"> إضافة بريد الكتروني </span>
                    </a>
                </div>



                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn text-white mb-4" style="background-color: var(--title-color);;padding-right: 30px; padding-left: 30px;" type="submit"> {{__('حفظ')}} </button>
                </div>

            </div>


        </form>

    </div>

    @push('scripts')

        <script>
            document.getElementById('add-email-btn').addEventListener('click', function() {
                let container = document.getElementById('email-container');

                // إنشاء حقل   الجديد
                let administratorNameField = document.createElement('div');
                administratorNameField.classList.add('mt-4', 'mb-3', 'col-12', 'col-md-6');
                administratorNameField.innerHTML = `
                    <x-form.input name="administrator_name[]" class="border" type="text" label=" {{__(' اسم المسؤول' )}}" autocomplete="" placeholder="أدخل اسم المسؤول' "/>
                `;

                // إنشاء حقل البريد الإلكتروني الجديد
                let emailField = document.createElement('div');
                emailField.classList.add('mt-4', 'mb-3', 'col-12', 'col-md-6');
                emailField.innerHTML = `
                    <x-form.input name="emails[]" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                `;

                // إضافة الحقل الجديد إلى الحاوية
                container.append(administratorNameField , emailField);
            });
        </script>


    @endpush

</x-main-layout>
