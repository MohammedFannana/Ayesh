<div class="row" style="justify-content: flex-end;">
    <div class="col-md-5" style="margin-right: 15px;">


        <!-- name -->
        <div class="mt-3">
            <x-form.input name="name" style="direction: rtl" :value="$user->name" class="border" type="text" label="الاسم" />
        </div>

        <!-- email -->
        <div class="mt-3">
            <x-form.input name="email" style="direction: rtl" :value="$user->email" class="border" type="text" label="البريد الالكتروني" />
        </div>

        <!-- Phone -->

        <div class="mt-3">
            <x-form.input style="direction: rtl" name="phone" class="border" type="text" label="رقم الجوال" :value="$user->phone" autocomplete="" />
        </div>


        @if ($user->type !== "admin")

            <div class="mt-3">
                <label for="" class="mb-2"> {{__(' نوع المستخدم ')}} </label>
                <x-form.select style="direction: rtl" name="type" selected="{{$user->type}}"
                    :options="['' => ' اختر ', 'registered' => ' مسجل ', 'references' => ' مراجع ', 'certified' => ' معتمد ', 'financial_manager' => ' مدير مالي ']"
                />

            </div>

        @endif

{{-- type --}}




        @if($button == " حفظ ")

        <!-- Password -->
        <div class="mt-3">
            <x-form.input name="password" style="direction: rtl" class="border" type="password" label="كلمة المرور" autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-form.input name="password_confirmation" style="direction: rtl" class="border" type="password" label=" تأكيد كلمة المرور  " autocomplete="new-password" />
        </div>

        @endif



        <div class="flex items-center gap-4 mt-4">
            <button class="btn text-white mb-4" style="background-color:#009FBF;width:150px" type="submit"> {{$button}} </button>
        </div>
    </div>
</div>