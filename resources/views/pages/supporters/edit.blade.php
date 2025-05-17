<x-main-layout>


    <h2 class="mb-5"> الداعمين </h2>


    <div class="supporters bg-white rounded shadow-sm p-3">

        <form action="{{route('supporter.update' , $supporter->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row supporters-form" style="justify-content:between;">

                <!-- name -->
                <div class="col-12 col-md-6">
                    <x-form.input name="name" value="{{$supporter->name}}" class="border" type="text" label="{{__('الاسم')}}" placeholder="أدخل الاسم"/>
                </div>

                <!-- country -->
                {{-- :value="$admin->email" --}}
                <div class="col-12 col-md-6">
                    <x-form.input name="country" value="{{$supporter->country}}" class="border" type="text" label="{{__('الدولة')}}" placeholder="أدخل الدولة"/>
                </div>

                {{-- phone --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="phone" value="{{$supporter->phone}}" class="border" type="text" label="{{__(' رقم الجوال ')}}" autocomplete="" placeholder="أدخل رقم الجوال"/>
                </div>

                {{-- Fax --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="fax" value="{{$supporter->fax}}" class="border" type="text" label="{{__('الفاكس')}}" autocomplete="" placeholder="أدخل الفاكس"/>
                </div>

                {{-- Association name --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="association_name" value="{{$supporter->association_name}}" class="border" type="text" label=" {{__(' اسم الجمعية ')}} " autocomplete="" placeholder="أدخل اسم الجمعية"/>
                </div>

                {{-- Department Name --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="department_name" value="{{$supporter->department_name}}" class="border" type="text" label=" {{__('اسم القسم')}} " autocomplete="" placeholder="أدخل اسم القسم"/>
                </div>


                {{-- address --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="address" value="{{$supporter->address}}" class="border" type="text" label=" {{__(('العنوان'))}} " autocomplete="" placeholder="أدخل العنوان"/>
                </div>

                {{-- website --}}
                <div class="mt-4 col-12 col-md-6">
                    <x-form.input name="website" value="{{$supporter->website}}" class="border" type="text" label=" {{__('الموقع الالكتروني ')}}" autocomplete="" placeholder="أدخل الموقع الالكتروني"/>
                </div>



                <div id="email-container" class="row">

                    <div class="col-6">
                        {{-- الحقول الأساسية التي تظهر أولاً --}}
                        @foreach ($supporter->administrator_name as $admin)

                            <div class="mt-4 col-12">
                                <x-form.input name="administrator_name[]" value="{{$admin}}" class="border" type="text" label=" {{__('اسم المسؤول')}} " autocomplete="" placeholder="أدخل اسم المسؤول"/>
                            </div>

                        @endforeach
                    </div>

                    <div class="col-6">

                        @foreach ($supporter->emails as $email)

                            <div class="mt-4 mb-3 col-12">
                                <x-form.input name="emails[]" value="{{$email}}" class="border" type="email" label=" {{__('البريد الالكتروني ')}}" autocomplete="" placeholder="أدخل البريد الالكتروني"/>
                            </div>

                        @endforeach

                    </div>
                </div>


                <div class="d-flex justify-content-center gap-4 mt-4">
                    <button class="btn text-white mb-4" style="background-color: var(--title-color);;padding-right: 30px; padding-left: 30px;" type="submit"> {{__('تعديل')}} </button>
                </div>
            </div>

        </form>

    </div>

</x-main-layout>
